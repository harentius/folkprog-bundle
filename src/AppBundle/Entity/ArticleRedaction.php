<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\Article;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ArticleRedactionRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="integer")
 * @ORM\DiscriminatorMap({
 *      0 = "AppBundle\Entity\ArticleRedaction",
 *      1 = "AppBundle\Entity\PageRedaction",
 * })
 */
class ArticleRedaction extends Article
{
    /**
     * @var Article
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Article")
     */
    private $article;

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $value
     * @return $this
     */
    public function setArticle($value)
    {
        $this->article = $value;

        return $this;
    }
}
