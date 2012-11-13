<?php
namespace ChubProduction\SearchBundle\Service;

/**
 * SearchResultInterface
 *
 * @author Vladimir Chub <v@chub.com.ua>
 */
interface SearchResultInterface
{
	public function getTitle();
	public function getDescription();
	public function getUrl();
	public function getId();
}
