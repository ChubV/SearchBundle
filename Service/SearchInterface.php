<?php
namespace ChubProduction\SearchBundle\Service;

/**
 * SearchInterface
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
interface SearchInterface
{
	/**
	 * @param string $str
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function search($str);

	/**
	 * @param SearchProviderInterface $provider
	 *
	 * @return void
	 */
	public function addProvider(SearchProviderInterface $provider);
}
