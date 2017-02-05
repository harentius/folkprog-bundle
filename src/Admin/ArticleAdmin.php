<?php

namespace Harentius\BlogBundle\Admin;

use Doctrine\Common\Cache\CacheProvider;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends AbstractPostAdmin
{
    /**
     * @var CacheProvider
     */
    private $controllersCache;

    /**
     * {@inheritDoc}
     */
    public function prePersist($object)
    {
        parent::prePersist($object);
        $this->clearCache();
    }

    /**
     * {@inheritDoc}
     */
    public function preUpdate($object)
    {
        parent::preUpdate($object);
        $this->clearCache();
    }

    /**
     * @param CacheProvider $controllersCache
     */
    public function setControllerCache(CacheProvider $controllersCache)
    {
        $this->controllersCache = $controllersCache;
    }

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
            ->add('slug', null, [
                'required' => false,
            ])
            ->add('category')
            ->add('tags', 'sonata_type_model_autocomplete', [
                'attr' => [
                    'class' => 'tags',
                ],
                'minimum_input_length' => 2,
                'required' => false,
                'property' => 'name',
                'multiple' => 'true',
            ])
            ->add('text', 'textarea', [
                'attr' => ['class' => 'blog-page-edit'],
            ])
            ->add('isPublished', null, [
                'required' => false,
            ])
            ->add('publishedAt', 'sonata_type_date_picker', [
                'required' => false,
                'format' => 'dd MM y',
            ])
            ->add('author')
            ->add('metaDescription', 'textarea', [
                'required' => false,
            ])
            ->add('metaKeywords', 'text', [
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('text')
            ->add('category')
        ;
    }

    /**
     *
     */
    private function clearCache()
    {
        $container = $this->getConfigurationPool()->getContainer();
        $container->get('harentius_blog.router.category_slug_provider')->clearAll();
        $this->controllersCache->deleteAll();
        $container->get('harentius_blog.controller.feed_cache')->deleteAll();
    }
}
