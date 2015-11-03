<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Eckert.' . $_EXTKEY,
	'List',
	array(
		'Entry' => 'list, ajax, delete',
		
	),
	// non-cacheable actions
	array(
		'Entry' => 'list, ajax, delete',
		
	)
);
