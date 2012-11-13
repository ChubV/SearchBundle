<?php
namespace ChubProduction\SearchBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * SearchResultSet
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
class SearchResultSet
{
	/**
	 * @var SearchProviderInterface
	 */
	private $provider;

	/**
	 * @var ArrayCollection
	 */
	private $results;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->provider->getName();
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->provider->getTitle();
	}

	/**
	 * @param \ChubProduction\SearchBundle\Service\SearchProviderInterface $provider
	 *
	 * @return mixed
	 */
	public function setProvider($provider)
	{
		$this->provider = $provider;

		return $this;
	}

	/**
	 * @return \ChubProduction\SearchBundle\Service\SearchProviderInterface
	 */
	public function getProvider()
	{
		return $this->provider;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $results
	 *
	 * @return mixed
	 */
	public function setResults($results)
	{
		$this->results = $results;

		return $this;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getResults()
	{
		return $this->results;
	}


}
