<?php

namespace Push\PointsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CheckinAdmin extends Admin
{

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('udid')
            ->add('latitude')
            ->add('longitude')
            ->add('createdAt')
            ->add('point')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('udid')
            ->add('point')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('edit');
        $collection->remove('create');
    }


}
