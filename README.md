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

(TODO: usage)