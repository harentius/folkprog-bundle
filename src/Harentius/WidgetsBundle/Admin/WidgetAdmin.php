<?php

namespace Harentius\WidgetsBundle\Admin;

use Harentius\WidgetsBundle\Entity\Widget;
use Harentius\WidgetsBundle\Form\DataTransformer\WidgetAdminDataTransformer;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class WidgetAdmin extends Admin
{
    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('position')
            ->add('isPhpUse')
            ->add('backLink')
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('routeData', 'harentius_widget_route', [
                'label' => false,
                'required' => false,
            ])
            ->add('position', 'harentius_widget_position')
            ->add('isPhpUse', null, [
                'label' => 'Contains php code',
                'required' => false,
            ])
            ->add('content')
            ->add('backLink', 'text', [
                'label' => 'Backlink',
                'required' => false,
            ])
        ;

        $formMapper->getFormBuilder()->addViewTransformer(new WidgetAdminDataTransformer());
    }
}
