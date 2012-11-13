<?php
namespace ChubProduction\SearchBundle\Service;

/**
 * SearchProviderInterface
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
interface SearchProviderInterface
{
	/**
	 * @param string $str
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function search($str);

	/**
	 * Return provider name
	 *
	 * @return string
	 */
	public function getName();

	/**
	 * Return provider name
	 *
	 * @return string
	 */
	public function getTitle();
}
