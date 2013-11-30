<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30/11/13
 * Time: 12:32
 */

class NameInverterTest extends PHPUnit_Framework_TestCase {

    /**
     * test_given_false_value_return_empty_string
     */
    public function testGivenFalseValueReturnEmptyString()
    {
        $this->assertEquals('', invertName(null));
        $this->assertEquals('', invertName(false));
        $this->assertEquals('', invertName(''));
        $this->assertEquals('', invertName(0));
    }
}

/**
 * Invert First and Last names
 *
 * @param $name
 * @return string
 */
function invertName($name)
{
    return '';
}
 