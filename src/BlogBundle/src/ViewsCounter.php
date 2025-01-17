<?php

namespace Harentius\BlogBundle;

use Harentius\BlogBundle\Entity\Article;
use Symfony\Component\HttpFoundation\RequestStack;

class ViewsCounter
{
    public function __construct(private readonly RequestStack $requestStack)
    {
    }

    public function processArticle(Article $article): void
    {
        $viewedArticles = $this->requestStack->getSession()->get('viewedArticles', []);
        $articleId = $article->getId();

        if (isset($viewedArticles[$articleId])) {
            return;
        }

        $viewedArticles[$articleId] = true;
        $article->increaseViewsCount();
        $this->requestStack->getSession()->set('viewedArticles', $viewedArticles);
    }
}
