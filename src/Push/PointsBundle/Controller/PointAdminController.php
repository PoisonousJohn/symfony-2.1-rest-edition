<?php
namespace Push\PointsBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;

class PointAdminController extends Controller
{

    public function copyAction()
    {

        $id = $this->get('request')->get($this->admin->getIdParameter());

        $object = $this->admin->getObject($id);

        $em = $this->getDoctrine()->getEntityManager();
        /**
         * @var \Push\PointsBundle\Entity\Point $object
         */
        $object = clone $object;
        $object->setName($object->getName() . ' (Копия)');
        $em->persist($object);
        $em->flush();

        return $this->redirectTo($object);
    }

}