<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/21/14
 * Time: 11:21 PM
 */

include_once('../Classes/Hero.php');
include_once('TestBase.php');

class HeroTest extends TestBase {

    private function __construct() { }

    public static function run()
    {
        parent::runTests('HeroTest', new HeroTest());
    }



    public function testGetHeroByName()
    {
        self::assertTrue(false);
    }
}

HeroTest::run();