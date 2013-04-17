<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'AD.' . $_EXTKEY,
	'Blog',
	array(
		'Article' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Article' => 'create',
		'Category' => 'create',
		
	)
);

?>