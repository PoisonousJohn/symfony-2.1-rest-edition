<?php

namespace Push\PointsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Request\ParamFetcher;

class RestController extends Controller
{
    /**
     * Return array of points and status of checkin.
     * <BR>Status can be:<br>
     * <ul>
     *      <li>"success" - successful checkin </li>
     *      <li>"badPoint" - you're in a bad point, can't checkin</li>
     *      <li>"badTime" - you're in a good point, but in a bad time, can't check in</li>
     * </ul>
     * @QueryParam(name="udid", requirements="[0-9a-z]+", default="0", description="required")
     * @QueryParam(name="latitude", requirements="[0-9.]+", default="0", description="required")
     * @QueryParam(name="longitude", requirements="[0-9.]+", default="0", description="required")
     * @ApiDoc(
     *      resource=true
     * )
     * @param ParamFetcherInterface $paramFetcher
     */
    public function postPointsCheckAction(ParamFetcherInterface $paramFetcher)
    {
//        public function postPointsCheckAction(ParamFetcherInterface $paramFetcher)
        $view = new View();
        /**
         * @var ParamFetcher $params
         */

        $data = array();

        $em = $this->getDoctrine()->getManager();

        /**
         * @var \Push\PointsBundle\Entity\PointRepository $repo
         */
        $repo = $em->getRepository('PushPointsBundle:Point');

        $lat = (float)$this->getRequest()->get('latitude', 0);
        $lon = (float)$this->getRequest()->get('longitude', 0);

        $point = $repo->getNearestPoints($lat, $lon);

        $checkin = new \Push\PointsBundle\Entity\Checkin();
        $checkin->setLatitude($lat);
        $checkin->setLongitude($lon);

        $checkin->setUdid($this->getRequest()->get('udid', 'undefined'));

        $currentTime = new \DateTime();

        $status = '';

        if ($point) {


             if ($point->isAllDay() || ($point->getStartTime() <= $currentTime && $point->getEndTime() >= $currentTime)) {
                $status = 'success';
             } else {
                $status = 'badTime';
             }

            $checkin->setPoint($point);

            $data['points'] = array();

            /**
             * @var \Sonata\MediaBundle\Provider\ImageProvider $imageProvider
             */
            $imageProvider = $this->get('sonata.media.provider.image');

            /**
             * @var \Push\PointsBundle\Entity\Point $point
             *
             */
            $data['points'][] = array (
                'name' => $point->getName(),
                'description' => $point->getDescription(),
                'image' => $imageProvider->generatePublicUrl($point->getImage(), 'reference'),
                'imageHd' => $imageProvider->generatePublicUrl($point->getImageHd(), 'reference'),
            );
        } else {
            $status = 'badPoint';
        }

        $data['status'] = $status;

        $em->persist($checkin);
        $em->flush();


        $view->setData($data);

//        var_dump($view->get);die;

        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
