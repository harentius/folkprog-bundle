<?php

namespace Harentius\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Eko\FeedBundle\Item\Writer\ItemInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Sonata\TranslationBundle\Traits\Gedmo\PersonalTranslatableTrait;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;

/**
 * @ORM\Entity(repositoryClass="Harentius\BlogBundle\Entity\ArticleRepository")
 * @Gedmo\TranslationEntity(class="Harentius\BlogBundle\Entity\Translation")
 */
class Article extends AbstractPost implements ItemInterface, TranslatableInterface
{
    use PersonalTranslatableTrait;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @SymfonyConstraints\Type(type="integer")
     * @SymfonyConstraints\Range(min=0)
     * @SymfonyConstraints\NotNull()
     */
    protected $viewsCount;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @SymfonyConstraints\Type(type="integer")
     * @SymfonyConstraints\Range(min=0)
     * @SymfonyConstraints\NotNull()
     */
    protected $likesCount;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @SymfonyConstraints\Type(type="integer")
     * @SymfonyConstraints\Range(min=0)
     * @SymfonyConstraints\NotNull()
     */
    protected $disLikesCount;

    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=false)
     * @SymfonyConstraints\Type(type="array")
     * @SymfonyConstraints\NotNull()
     */
    protected $attributes;

    /**
     * @var Translation[]
     *
     * @ORM\OneToMany(
     *     targetEntity="Harentius\BlogBundle\Entity\Translation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(
     *     targetEntity="Harentius\BlogBundle\Entity\Category",
     *     inversedBy="articles"
     * )
     * @SymfonyConstraints\NotNull()
     */
    private $category;

    /**
     * @var Tag[]
     *
     * @ORM\ManyToMany(
     *     targetEntity="Harentius\BlogBundle\Entity\Tag",
     *     inversedBy="articles"
     * )
     */
    private $tags;

    /**
     *
     */
    public function __construct()
    {
        $this->published = false;
        $this->viewsCount = 0;
        $this->likesCount = 0;
        $this->disLikesCount = 0;
        $this->tags = new ArrayCollection();
        $this->attributes = [];
    }

    /**
     * @return int
     */
    public function getViewsCount()
    {
        return $this->viewsCount;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setViewsCount($value)
    {
        $this->viewsCount = $value;

        return $this;
    }

    /**
     *
     */
    public function increaseViewsCount()
    {
        $this->viewsCount = $this->getViewsCount() + 1;
    }

    /**
     * @return int
     */
    public function getLikesCount()
    {
        return $this->likesCount;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setLikesCount($value)
    {
        $this->likesCount = $value;

        return $this;
    }

    /**
     *
     */
    public function increaseLikesCount()
    {
        $this->likesCount = $this->getLikesCount() + 1;
    }

    /**
     * @return int
     */
    public function getDisLikesCount()
    {
        return $this->disLikesCount;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setDisLikesCount($value)
    {
        $this->disLikesCount = $value;

        return $this;
    }

    /**
     *
     */
    public function increaseDisLikesCount()
    {
        $this->disLikesCount = $this->getDisLikesCount() + 1;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setAttributes($value)
    {
        $this->attributes = $value;

        return $this;
    }

    // RSS

    /**
     * {@inheritdoc}
     */
    public function getFeedItemTitle()
    {
        return $this->getTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function getFeedItemDescription()
    {
        return $this->getMetaDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function getFeedItemLink()
    {
        return $this->getSlug();
    }

    /**
     * {@inheritdoc}
     */
    public function getFeedItemPubDate()
    {
        return $this->getPublishedAt();
    }

    /**
     * @return Translation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param Translation[] $value
     * @return $this
     */
    public function setTranslations($value)
    {
        $this->translations = $value;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $value
     * @return $this
     */
    public function setCategory($value)
    {
        $this->category = $value;

        return $this;
    }

    /**
     * @return Tag[]|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $value
     * @return $this
     */
    public function setTags($value)
    {
        $this->tags = $value;

        return $this;
    }

    /**
     * @param Tag $value
     * @return $this
     */
    public function addTag($value)
    {
        $this->tags[] = $value;

        return $this;
    }
}
