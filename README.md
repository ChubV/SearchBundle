SearchBundle
================

Search Symfony2 bundle. Provides easy global search service for your site.

[![Build Status](https://secure.travis-ci.org/ChubV/SearchBundle.png)](http://travis-ci.org/ChubV/SearchBundle)

[![knp](http://knpbundles.com/ChubV/SearchBundle/badge-short)](http://knpbundles.com/ChubV/SearchBundle)


Installation
------------

### Download bundle

First of all, download bundle using one of common ways:

#### Using deps file

Add the following lines to your `deps` file and run `php bin/vendors install`

```
[SearchBundle]
    git=https://github.com/ChubV/SearchBundle.git
    target=bundles/ChubProduction/SearchBundle
```

#### Using composer

### Register the namespaces

Add the following namespace entry to the `registerNamespaces` call
in your autoloader:

``` php
<?php
// app/autoload.php
$loader->registerNamespaces(array(
    // ...
    'ChubProduction\SearchBundle' => __DIR__.'/../vendor/bundles',
    // ...
));
```

This is unnecessary step if you use Composer's automaticaly generated autoload file

### Register the bundle

To start using the bundle, register it in your Kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new ChubProduction\SearchBundle\SearchBundle(),
    );
    // ...
}
```

### Use your Search

Create your search provider, that must implement SearchProviderInterface

``` php
<?php
// NewsSearchProvider.php

class NewsSearchProvider implements SearchProviderInterface
{
    private $m;

	/**
	 * @param string $str
	 *
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function search($str)
	{
		// Perform search and return ArrayCollection of objects that implements SearchResultInterface
    	// There is also default SearchResult class for this ChubProduction\SearchBundle\Service\SearchResult
	}

	/**
	 * Return provider name
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'news';
	}

	/**
	 * Return provider title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return 'News, events, etc ';
	}
```

Register search provider among other ones

``` yaml
# services.yml

news.search.provider:
        class: ChubProduction\NewsBundle\Search\NewsSearchProvider
        tags:
            - { name: search.provider }

content.search.provider:
        class: ...
        tags:
            - { name: search.provider }
....
```

Use the search getting an ArrayCollection of ResultSets with the results from your search providers

``` php
<?php
...
   /**
	 * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
	 * @Route("/search/{_locale}", name="search")
	 * @Template()
	 */
	public function searchAction($_locale)
	{
	    $r = $this->getRequest();
    	if ($r->query->has('q')) {
			$res = $this->get('search')->search($r->query->get('q')); // Here is our service

		    return compact('res');
	    }

	    return $this->redirect($this->generateUrl('main_page', compact('_locale')));
	}
```