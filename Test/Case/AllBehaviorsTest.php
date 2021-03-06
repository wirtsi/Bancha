<?php
/**
 * AllBehaviorsTest file
 *
 * Bancha Project : Combining Ext JS and CakePHP (http://banchaproject.org)
 * Copyright 2011-2012 Roland Schuetz, Kung Wong, Andreas Kern, Florian Eckerstorfer
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @package       Bancha
 * @category      tests
 * @copyright     Copyright 2011-2012 Roland Schuetz, Kung Wong, Andreas Kern, Florian Eckerstorfer
 * @link          http://banchaproject.org Bancha Project
 * @since         Bancha v 0.9.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author        Florian Eckerstorfer <f.eckerstorfer@gmail.com>
 * @author        Andreas Kern <andreas.kern@gmail.com>
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Kung Wong <kung.wong@gmail.com>
 */

/**
 * AllBehaviorsTest class
 *
 * This test group will run all test in the Bancha/Test/Cases/Model/Behaviours directory
 *
 * @package       Bancha
 * @category      tests
 */
class AllBehaviorsTest extends PHPUnit_Framework_TestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('Model Behavior and all behaviors');

		$path = dirname(__FILE__) . DS . 'Model' . DS;
		$suite->addTestFile($path . 'BanchaRemotableBehaviorTest.php');

		$suite->addTestDirectory($path);
		return $suite;
	}
}
