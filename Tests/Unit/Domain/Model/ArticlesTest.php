<?php

namespace AD\AdBlog\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Adrian Dymorz <t3@adrian.dymorz.ch>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \AD\AdBlog\Domain\Model\Articles.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Blog system
 *
 * @author Adrian Dymorz <t3@adrian.dymorz.ch>
 */
class ArticlesTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \AD\AdBlog\Domain\Model\Articles
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \AD\AdBlog\Domain\Model\Articles();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getContentReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setContentForStringSetsContent() { 
		$this->fixture->setContent('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getContent()
		);
	}
	
	/**
	 * @test
	 */
	public function getCategoriesReturnsInitialValueForCategories() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function setCategoriesForObjectStorageContainingCategoriesSetsCategories() { 
		$category = new \AD\AdBlog\Domain\Model\Categories();
		$objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategories->attach($category);
		$this->fixture->setCategories($objectStorageHoldingExactlyOneCategories);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategories,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategories() {
		$category = new \AD\AdBlog\Domain\Model\Categories();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategories() {
		$category = new \AD\AdBlog\Domain\Model\Categories();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function getAuthorReturnsInitialValueForAuthors() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAuthor()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorForObjectStorageContainingAuthorsSetsAuthor() { 
		$author = new \AD\AdBlog\Domain\Model\Authors();
		$objectStorageHoldingExactlyOneAuthor = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAuthor->attach($author);
		$this->fixture->setAuthor($objectStorageHoldingExactlyOneAuthor);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAuthor,
			$this->fixture->getAuthor()
		);
	}
	
	/**
	 * @test
	 */
	public function addAuthorToObjectStorageHoldingAuthor() {
		$author = new \AD\AdBlog\Domain\Model\Authors();
		$objectStorageHoldingExactlyOneAuthor = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAuthor->attach($author);
		$this->fixture->addAuthor($author);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneAuthor,
			$this->fixture->getAuthor()
		);
	}

	/**
	 * @test
	 */
	public function removeAuthorFromObjectStorageHoldingAuthor() {
		$author = new \AD\AdBlog\Domain\Model\Authors();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($author);
		$localObjectStorage->detach($author);
		$this->fixture->addAuthor($author);
		$this->fixture->removeAuthor($author);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAuthor()
		);
	}
	
}
?>