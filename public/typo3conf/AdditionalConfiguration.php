<?php

(static function () {

    if (!isset($_ENV['DATABASE_URL'])) {
        try {
            (new \Symfony\Component\Dotenv\Dotenv())->load(__DIR__ . '/../../.env');
        } catch (\Exception $e) {
            die('please create a valid .env file');
        }
    }

    $urlParts = parse_url($_ENV['DATABASE_URL']);

    if ($urlParts === false || $urlParts['scheme'] !== 'postgres') {
        throw new \InvalidArgumentException('please create valid .env file');
    }

    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = trim($urlParts['path'], '/');
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = empty($urlParts['host']) ? 'localhost' : $urlParts['host'];
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = empty($urlParts['user']) ? '' : $urlParts['user'];
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = empty($urlParts['pass']) ? '' : $urlParts['pass'];

})();