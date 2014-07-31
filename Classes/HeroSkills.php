<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/27/14
 * Time: 11:11 AM
 */

namespace Classes;


class HeroSkills extends \ArrayObject {
    protected static $friendClasses = array('Classes\Hero', 'Classes\Skill');

    public function append($value) { // override
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }
        if (!is_a($value, 'Classes\Skill')) return false;

        parent::append($value);
    }

    public function remove($value) {
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }
        if (!is_a($value, 'Classes\Skill')) return false;

        $indexes = array_keys(parent, $value, true);
        array_splice($this->innerArray, $indexes[0], 1);
    }
}