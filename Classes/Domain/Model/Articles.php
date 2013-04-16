<?php
namespace AD\AdBlog\Domain\Model;

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
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package ad_blog
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Articles extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Content
	 *
	 * @var \string
	 */
	protected $content;

	/**
	 * Categories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Categories>
	 */
	protected $categories;

	/**
	 * Author
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Authors>
	 */
	protected $author;

	/**
	 * __construct
	 *
	 * @return Articles
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->author = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the content
	 *
	 * @return \string $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 *
	 * @param \string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Adds a Categories
	 *
	 * @param \AD\AdBlog\Domain\Model\Categories $category
	 * @return void
	 */
	public function addCategory(\AD\AdBlog\Domain\Model\Categories $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Categories
	 *
	 * @param \AD\AdBlog\Domain\Model\Categories $categoryToRemove The Categories to be removed
	 * @return void
	 */
	public function removeCategory(\AD\AdBlog\Domain\Model\Categories $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Categories> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Categories> $categories
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Adds a Authors
	 *
	 * @param \AD\AdBlog\Domain\Model\Authors $author
	 * @return void
	 */
	public function addAuthor(\AD\AdBlog\Domain\Model\Authors $author) {
		$this->author->attach($author);
	}

	/**
	 * Removes a Authors
	 *
	 * @param \AD\AdBlog\Domain\Model\Authors $authorToRemove The Authors to be removed
	 * @return void
	 */
	public function removeAuthor(\AD\AdBlog\Domain\Model\Authors $authorToRemove) {
		$this->author->detach($authorToRemove);
	}

	/**
	 * Returns the author
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Authors> $author
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Sets the author
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AD\AdBlog\Domain\Model\Authors> $author
	 * @return void
	 */
	public function setAuthor(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $author) {
		$this->author = $author;
	}

}
?>