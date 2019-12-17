<?php

defined('TYPO3_MODE') or die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Eckert.Todo',
        'List',
        ['Entry' => 'list,add,delete'],
        ['Entry' => 'list,add,delete']
    );
})();
