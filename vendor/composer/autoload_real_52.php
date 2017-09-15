<?php

// autoload_real_52.php generated by xrstf/composer-php52

class ComposerAutoloaderInit14161b63e89ac4ae44dcc3b0092e987e {
	private static $loader;

	public static function loadClassLoader($class) {
		if ('xrstf_Composer52_ClassLoader' === $class) {
			require dirname(__FILE__).'/ClassLoader52.php';
		}
	}

	/**
	 * @return xrstf_Composer52_ClassLoader
	 */
	public static function getLoader() {
		if (null !== self::$loader) {
			return self::$loader;
		}

		spl_autoload_register(array('ComposerAutoloaderInit14161b63e89ac4ae44dcc3b0092e987e', 'loadClassLoader'), true /*, true */);
		self::$loader = $loader = new xrstf_Composer52_ClassLoader();
		spl_autoload_unregister(array('ComposerAutoloaderInit14161b63e89ac4ae44dcc3b0092e987e', 'loadClassLoader'));

		$vendorDir = dirname(dirname(__FILE__));
		$baseDir   = dirname($vendorDir);
		$dir       = dirname(__FILE__);

		$map = require $dir.'/autoload_namespaces.php';
		foreach ($map as $namespace => $path) {
			$loader->add($namespace, $path);
		}

		$classMap = require $dir.'/autoload_classmap.php';
		if ($classMap) {
			$loader->addClassMap($classMap);
		}

		$loader->register(true);

//		require $vendorDir . '/hamcrest/hamcrest-php/hamcrest/Hamcrest.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/symfony/polyfill-mbstring/bootstrap.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/padraic/humbug_get_contents/src/function.php'; // disabled because of PHP 5.3 syntax
		require $baseDir . '/includes/functions.php';
		require $baseDir . '/includes/deprecated-functions.php';
		require $baseDir . '/includes/forms/functions.php';
		require $baseDir . '/includes/integrations/functions.php';
		require $baseDir . '/includes/default-actions.php';
		require $baseDir . '/includes/default-filters.php';

		return $loader;
	}
}
