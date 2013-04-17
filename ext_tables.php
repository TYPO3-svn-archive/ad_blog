<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Blog',
	'Blog'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'AD.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'blog',	// Submodule key
		'',						// Position
		array(
			'Article' => 'list, show',
			
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_blog.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Blog system');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_adblog_domain_model_article', 'EXT:ad_blog/Resources/Private/Language/locallang_csh_tx_adblog_domain_model_article.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_adblog_domain_model_article');
$TCA['tx_adblog_domain_model_article'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ad_blog/Resources/Private/Language/locallang_db.xlf:tx_adblog_domain_model_article',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,content,categories,author,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Article.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_adblog_domain_model_article.gif'
	),
);

$tmp_ad_blog_columns = array(

);

t3lib_extMgm::addTCAcolumns('sys_category',$tmp_ad_blog_columns);

$TCA['sys_category']['columns'][$TCA['sys_category']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:ad_blog/Resources/Private/Language/locallang_db.xlf:sys_category.tx_extbase_type.Tx_AdBlog_Category','Tx_AdBlog_Category');

$TCA['sys_category']['types']['Tx_AdBlog_Category']['showitem'] = $TCA['sys_category']['types']['1']['showitem'];
$TCA['sys_category']['types']['Tx_AdBlog_Category']['showitem'] .= ',--div--;LLL:EXT:ad_blog/Resources/Private/Language/locallang_db.xlf:tx_adblog_domain_model_category,';
$TCA['sys_category']['types']['Tx_AdBlog_Category']['showitem'] .= '';

$tmp_ad_blog_columns = array(

);

$tmp_ad_blog_columns['article'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

t3lib_extMgm::addTCAcolumns('be_users',$tmp_ad_blog_columns);

$TCA['be_users']['columns'][$TCA['be_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:ad_blog/Resources/Private/Language/locallang_db.xlf:be_users.tx_extbase_type.Tx_AdBlog_Author','Tx_AdBlog_Author');

$TCA['be_users']['types']['Tx_AdBlog_Author']['showitem'] = $TCA['be_users']['types']['1']['showitem'];
$TCA['be_users']['types']['Tx_AdBlog_Author']['showitem'] .= ',--div--;LLL:EXT:ad_blog/Resources/Private/Language/locallang_db.xlf:tx_adblog_domain_model_author,';
$TCA['be_users']['types']['Tx_AdBlog_Author']['showitem'] .= '';

?>