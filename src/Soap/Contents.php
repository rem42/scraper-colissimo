<?php

namespace Scraper\ScraperColissimo\Soap;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class Contents
{
    /**
     * @var ArrayCollection<int, Article>
     * @Serializer\Type("ArrayCollection<Scraper\ScraperColissimo\Soap\Article>")
     * @Serializer\XmlList(inline=true, entry="article")
     * @Serializer\SerializedName("article")
     */
    protected ArrayCollection $article;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Category")
     * @Serializer\SerializedName("category")
     */
    protected Category $category;

    public function __construct()
    {
        $this->article  = new ArrayCollection();
        $this->category = new Category();
    }

    public function addArticle(): Article
    {
        $this->article->add(new Article());
        return $this->article->last();
    }

    /**
     * @return ArrayCollection<int, Article>
     */
    public function getArticle(): ArrayCollection
    {
        return $this->article;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
