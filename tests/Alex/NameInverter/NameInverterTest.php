<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30/11/13
 * Time: 12:32
 */

namespace Alex;

class NameInverterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param $invertedName
     * @param $originalName
     */
    public function assertInverted($invertedName, $originalName)
    {
        $this->assertEquals($invertedName, (new NameInverter())->invertName($originalName));
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

    /**
     * test_given_first_last_name_with_honorific_ignore_it_when_returning_last_first
     *
     * @dataProvider providerHonorifics
     *
     * @param $expectedName
     * @param $nameWithHonorific
     */
    public function testGivenFirstLastNameWithHonorificIgnoreItWhenReturningLastFirst($expectedName, $nameWithHonorific)
    {
        $this->assertInverted($expectedName, $nameWithHonorific);
    }

        /**
         * @return array
         */
        public static function providerHonorifics()
        {
            return array(
                array('Last First', 'M. First Last'),
                array('Last First', 'Mme First Last'),
                array('Last First', 'Mlle First Last'),
            );
        }

    /**
     * test_post_nominals_stay_at_end
     */
    public function testPostNominalsStayAtEnd()
    {
        $this->assertInverted('First Last Sr.', 'Last First Sr.');
        $this->assertInverted('First Last BS. PhD.', 'Last First BS. PhD.');
    }

    /**
     * @ignored
     * test_with_commas_and_other_punctuation_marks
     */

    /**
     * Just an integration test
     */
    public function testIntegration()
    {
        $this->assertInverted('Doe John Sr. PhD, EdD, DMus, DArts', ' John     Doe Sr.  PhD, EdD, DMus,    DArts  ');
    }
}

