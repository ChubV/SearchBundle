<?php
namespace ChubProduction\SearchBundle\Service;

/**
 * SearchResult
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
class SearchResult
{
	private $title;
	private $description;
	private $url;
	private $id;

	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	public function getUrl()
	{
		return $this->url;
	}
}
