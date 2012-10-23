<?php

namespace Push\PointsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PointAdmin extends Admin
{

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('radius')
            ->add('startTime')
            ->add('endTime')
            ->add('allDay', null, array('required' => false))
            ->add('description')
            ->add('image', 'sonata_type_model_list')
            ->add('imageHd', 'sonata_type_model_list')
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('latitude')
            ->add('longitude')
            ->add('radius')
            ->add('startTime')
            ->add('endTime')
            ->add('allDay')
            ->add('description')
            ->add('_action', 'actions', array(
            'actions' => array(
                'copy' => array('template' => 'PushPointsBundle:Sonata:copy.html.twig')
            ),
            'label' => 'Действия',
        ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('radius')
//            ->add('startTime')
//            ->add('endTime')
            ->add('allDay')
            ->add('description')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('copy');
    }


}
