<?php

/**
 * Test: Nette\Config\Configurator and production mode.
 *
 * @author     David Grudl
 * @package    Nette\Config
 * @subpackage UnitTests
 */

use Nette\Config\Configurator;



require __DIR__ . '/../bootstrap.php';



$configurator = new Configurator;

Assert::false( $configurator->isDebugMode() );

$configurator->setDebugMode(TRUE);
Assert::true( $configurator->isDebugMode() );
Assert::false( @$configurator->isProductionMode() );

$configurator->setDebugMode(FALSE);
Assert::false( $configurator->isDebugMode() );
Assert::true( @$configurator->isProductionMode() );

$configurator->setDebugMode(php_uname('n'));
Assert::true( $configurator->isDebugMode() );

$configurator->setDebugMode(array(php_uname('n')));
Assert::true( $configurator->isDebugMode() );
