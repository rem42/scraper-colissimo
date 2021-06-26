<?php

namespace Scraper\ScraperColissimo\Rest;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Contents
{
    /** @var Collection<int, Article> */
    private Collection $article;

    private Category $category;

    public function __construct()
    {
        $this->article  = new ArrayCollection();
        $this->category = new Category();
    }

    public function addArticle(Article $article): self
    {
        $this->article->add($article);
        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
