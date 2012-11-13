<?php
namespace ChubProduction\SearchBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use ChubProduction\SearchBundle\DependencyInjection\SearchCompillerPass;

/**
 * @codeCoverageIgnore
 */
class SearchBundle extends Bundle
{
	public function build(ContainerBuilder $container)
	{
		parent::build($container);
		$container->addCompilerPass(new SearchCompillerPass());
	}
}
