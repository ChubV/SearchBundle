<?php
namespace ChubProduction\SearchBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * SearchCompillerPass
 *
 * @author Vladimir Chub <v@chub.com.ua>
 * @codeCoverageIgnore
 */
class SearchCompillerPass implements CompilerPassInterface
{
	/**
	 * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
	 */
	public function process(ContainerBuilder $container)
	{
		// use main symfony dispatcher
		if (!$container->hasDefinition('search')) {
			return;
		}

		$definition = $container->getDefinition('search');

		foreach ($container->findTaggedServiceIds('search.provider') as $id => $attributes) {
			$class = $container->getDefinition($id)->getClass();

			$refClass = new \ReflectionClass($class);
			$interface = 'ChubProduction\\SearchBundle\\Service\\SearchProviderInterface';
			if (!$refClass->implementsInterface($interface)) {
				throw new \InvalidArgumentException(sprintf('Service "%s" must implement interface "%s".', $id, $interface));
			}

			$definition->addMethodCall('addProvider', array(new Reference($id)));
		}
	}
}
