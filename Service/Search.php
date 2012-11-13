<?php
namespace ChubProduction\SearchBundle\Service;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Search
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
class Search implements SearchInterface
{
	private $providers = array();

	/**
	 * @param string $str
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function search($str)
	{
		$ac = new ArrayCollection();

		/** @var SearchProviderInterface $provider */
		foreach ($this->providers as $provider) {
			$res = $provider->search($str);
			if ($res->count() > 0) {
				$rs = new SearchResultSet();

				$rs->setProvider($provider);
				$rs->setResults($res);
				$ac->add($rs);
			}
		}

		return $ac;
	}

	/**
	 * @param SearchProviderInterface $provider
	 *
	 * @return void
	 */
	public function addProvider(SearchProviderInterface $provider)
	{
		$this->providers[$provider->getName()] = $provider;
	}
}
