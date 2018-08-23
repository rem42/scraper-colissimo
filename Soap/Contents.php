<?php

namespace Scraper\ScraperColissimo\Soap;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Contents
 * @package Scraper\ScraperColissimo\Soap
 */
class Contents
{
	/**
	 * @var ArrayCollection|Article[]
	 * @Serializer\Type("ArrayCollection<Scraper\ScraperColissimo\Soap\Article>")
	 * @Serializer\XmlList(inline=true, entry="article")
	 * @Serializer\SerializedName("article")
	 */
	protected $article;
	/**
	 * @var Category
	 * @Serializer\Type("Scraper\ScraperColissimo\Soap\Category")
	 * @Serializer\SerializedName("category")
	 */
	protected $category;

	/**
	 * Contents constructor.
	 */
	public function __construct()
	{
		$this->article  = new ArrayCollection();
		$this->category = new Category();
	}

	/**
	 * @return Article
	 */
	public function addArticle()
	{
		$this->article->add(new Article());
		return $this->article->last();
	}

	/**
	 * @return Article[]
	 */
	public function getArticle(): ?array
	{
		return $this->article;
	}

	/**
	 * @param Article[] $article
	 *
	 * @return $this
	 */
	public function setArticle(?array $article)
	{
		$this->article = $article;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getCategory(): ?Category
	{
		return $this->category;
	}

	/**
	 * @param Category $category
	 *
	 * @return $this
	 */
	public function setCategory(?Category $category)
	{
		$this->category = $category;
		return $this;
	}
}
