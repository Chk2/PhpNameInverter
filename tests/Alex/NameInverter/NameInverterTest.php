<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30/11/13
 * Time: 12:32
 */

class NameInverterTest extends PHPUnit_Framework_TestCase {

    /**
     * @param $invertedName
     * @param $originalName
     */
    public function assertInverted($invertedName, $originalName)
    {
        $this->assertEquals($invertedName, invertName($originalName));
    }

    /**
     * @return array
     */
    public static function FalseValuesProvider()
    {
        return array(
            array('', null),
            array('', false),
            array('', ''),
            array('', 0),
        );
    }

    /**
     * test_given_false_value_return_empty_string
     *
     * @dataProvider FalseValuesProvider
     *
     * @param $invertedName
     * @param $originalName
     */
    public function testGivenFalseValueReturnEmptyString($invertedName, $originalName)
    {
        $this->assertInverted($invertedName, $originalName);
    }

    /**
     * test_given_simple_name_return_simple_name
     */
    public function testGivenSimpleNameReturnSimpleName()
    {
        $this->assertInverted('Name', 'Name');
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
    if (!$name) {
        return '';
    }

    return $name;
}
 