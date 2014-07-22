<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/21/14
 * Time: 11:42 PM
 */

class TestBase {
    protected static function runTests($className, $classObject) {
        $myClassReflection = new ReflectionClass($className);
        $methods = $myClassReflection->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method)
            if ($method->name !== 'run')
                $method->invoke($classObject);
    }

    protected static function assertTrue($bool, $message = '') {
        if (!$bool) {
            trigger_error('Assertion Failed: '.$message);
        }
    }

    protected static function assertFalse($bool, $message = '') {
        if ($bool) {
            trigger_error('Assertion Failed: '.$message);
        }
    }
} 