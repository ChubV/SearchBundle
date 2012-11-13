<?php
namespace ChubProduction\SearchBundle\Tests\Service;

/**
 * Search service test
 *
 * @author FrMn <v@chub.com.ua>
 */
class SearchServiceTest extends \PHPUnit_Framework_TestCase
{
	private $container;

	/**
	 * Initialize test case
	 */
	public function setUp()
	{
		require_once __DIR__ . '/../Kernel/TestKernel.php';

		$kernel = new \TestKernel('test', false);
		$kernel->boot();

		$this->container = $kernel->getContainer();
	}

	/**
	 * Test if service registered
	 */
	public function testSearchService()
	{
		$search = $this->container->get('search');

		$this->assertInstanceOf('ChubProduction\\SearchBundle\\Service\\SearchInterface', $search);
	}

	/**
	 * Test result on a tagged SearchProviderService
	 * (look services in config_test.yml)
	 */
	public function testTaggedProvider()
	{
		/** @var \ChubProduction\SearchBundle\Service\SearchInterface $search */
		$search = $this->container->get('search');

		/**
		 * Search for lol keyword
		 */
		$res = $search->search('lol');

		/**
		 * We have to find an ArrayCollection of result sets.
		 * The only provider is now registered is TestProvider. It have been registered as a tagged service.
		 * Test provider always returns the only result set.
		 */
		$this->assertInstanceOf('Doctrine\\Common\\Collections\\ArrayCollection', $res);
		$this->assertEquals(1, $res->count());

		/**
		 * Each result set describes provider and the collection of search.
		 * For example NewsSearchProvider's ResultSet will consist of the name "news",
		 * title "News" (or something localized), and the set of news that match the search query.
		 */
		$rSet = $res->first();
		$this->assertInstanceOf('ChubProduction\\SearchBundle\\Service\\SearchResultSet', $rSet);
		$this->assertInstanceOf('ChubProduction\\SearchBundle\\Tests\\Service\\TestProvider', $rSet->getProvider());
		$this->assertEquals('test', $rSet->getName());
		$this->assertEquals('Test results', $rSet->getTitle());

		$results = $rSet->getResults();
		$this->assertInstanceOf('Doctrine\\Common\\Collections\\ArrayCollection', $results);
		$this->assertEquals(1, $res->count());

		/**
		 * SearchResultInterface describes the common parameters of search result (title, short description,
		 * url, id, additionals)
		 */
		$result = $results->first();
		$this->assertInstanceOf('ChubProduction\\SearchBundle\\Service\\SearchResultInterface', $result);
	}
}
