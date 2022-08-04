<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Contents
{
    /** @var array<int, Article> */
    private array $article = [];

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function addArticle(Article $article): self
    {
        $this->article[] = $article;
        return $this;
    }

    /**
     * @return array<int, Article>
     */
    public function getArticle(): array
    {
        return $this->article;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
