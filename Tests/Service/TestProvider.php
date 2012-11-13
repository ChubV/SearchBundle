<?php
namespace ChubProduction\SearchBundle\Tests\Service;

use ChubProduction\SearchBundle\Service\SearchProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Test search provider
 *
 * @author FrMn <v@chub.com.ua>
 */
class TestProvider implements SearchProviderInterface
{
	/**
	 * Return provider name
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'test';
	}

	/**
	 * Return provider name
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return 'Test results';
	}

	/**
	 * @param string $str
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function search($str)
	{
		$res = new TestResult();

		$ac = new ArrayCollection();
		$ac->add($res);

		return $ac;
	}
}
