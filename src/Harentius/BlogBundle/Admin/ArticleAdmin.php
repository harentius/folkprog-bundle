<?php

namespace Harentius\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin
{
    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('slug')
            ->add('category')
            ->add('tags')
            ->add('author')
            ->add('isPublished')
            ->add('publishedAt')
            ->add('metaDescription')
            ->add('metaKeywords')
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
            ->add('title')
            ->add('slug')
            ->add('category')
//            ->add('tags', 'sonata_type_model_autocomplete', array(
//                'property' => 'name',
//                'multiple' => 'true',
//            ))
            ->add('text', 'textarea', [
                'attr' => ['rows' => 12, 'class' => 'blog-post-text'],
            ])
            ->add('isPublished')
            ->add('publishedAt', 'datetime')
            ->add('metaDescription', 'textarea', [
                'required' => false,
            ])
            ->add('metaKeywords', 'text', [
                'required' => false,
            ])
        ;
    }
}