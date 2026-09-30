<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Contents
{
    /** @var list<Article> up to 100 articles */
    public array $article = [];

    public Category $category;

    /** @var list<Original>|null */
    public ?array $original = null;

    // Mandatory for categories "Autre" and "Retour de marchandise"
    public ?string $explanations = null;

    public function __construct(int $category = Category::COMMERCIAL)
    {
        $this->category = new Category($category);
    }

    public function addArticle(Article $article): self
    {
        $this->article[] = $article;

        return $this;
    }
}
