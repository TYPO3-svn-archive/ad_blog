<?php
namespace AD\AdBlog\Controller;

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
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * articleRepository
	 *
	 * @var \AD\AdBlog\Domain\Repository\ArticleRepository
	 * @inject
	 */
	protected $articleRepository;

	/**
	 * categoryRepository
	 *
	 * @var \AD\AdBlog\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$articles = $this->articleRepository->findAll();
		$this->view->assign('articles', $articles);
	}

	/**
	 * action show
	 *
	 * @param \AD\AdBlog\Domain\Model\Article $article
	 * @return void
	 */
	public function showAction(\AD\AdBlog\Domain\Model\Article $article) {
		$this->view->assign('article', $article);
	}

	/**
	 * action new
	 *
	 * @param \AD\AdBlog\Domain\Model\Article $newArticle
	 * @dontvalidate $newArticle
	 * @return void
	 */
	public function newAction(\AD\AdBlog\Domain\Model\Article $newArticle = NULL) {
		$this->view->assign('categoryArray', $this->categoryRepository->findAll());
		$this->view->assign('newArticle', $newArticle);
	}

	/**
	 * action create
	 *
	 * @param \AD\AdBlog\Domain\Model\Article $newArticle
	 * @return void
	 */
	public function createAction(\AD\AdBlog\Domain\Model\Article $newArticle) {
		$this->articleRepository->add($newArticle);
		$this->flashMessageContainer->add('Your new Article was created.');
		$this->redirect('list');
	}

}
?>