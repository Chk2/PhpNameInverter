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

    /**
     * test_given_simple_name_with_white_spaces_will_return_simple_name
     */
    public function testGivenSimpleNameWithWhiteSpacesWillReturnSimpleName()
    {
        $this->assertInverted('Name', '     Name ');
    }

    /**
     * test_given_first_and_last_name_return_last_and_first_name
     */
    public function testGivenFirstAndLastNameReturnLastAndFirstName()
    {
        $this->assertInverted('Last First', 'First Last');
    }

    /**
     * test_first_last_name_with_extra_spaces_between_them_will_return_last_first
     */
    public function testFirstLastNameWithExtraSpacesBetweenThemWillReturnLastFirst()
    {
        $this->assertInverted('Last First', ' First   Last ');
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
    } else {
        $names = preg_split("/[\s]+/", trim($name));

        if (count($names) == 1) {
            return $names[0];
        } else {
            return sprintf('%s %s', $names[1], $names[0]);
        }
    }
}
 