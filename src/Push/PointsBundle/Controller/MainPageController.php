<?php

namespace Push\PointsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainPageController extends Controller
{
    public function pointsAction()
    {
        $points = $this->getDoctrine()->getManager()->getRepository('PushPointsBundle:Point')->findAll();
        return $this->render('PushPointsBundle:MainPage:points.html.twig', array('points' => $points));
    }
}
