<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30/11/13
 * Time: 16:03
 */

namespace Alex;

class NameInverter
{
    /**
     * Invert First and Last names
     *
     * @param $name
     * @return string
     */
    public function invertName($name)
    {
        if (!$name) {
            return '';
        } else {
            return $this->formatName($this->removeHonorifics($this->splitNames($name)));
        }
    }

    /**
     * @param $names
     * @return string
     */
    private function formatName($names)
    {
        if (count($names) == 1) {
            return $names[0];
        } else {
            return $this->formatMultiElementName($names);
        }
    }

    /**
     * @param $names
     * @return string
     */
    private function formatMultiElementName($names)
    {
        $postNominal = $this->getPostNominals($names);
        $firstName = $names[0];
        $lastName = $names[1];
        return trim(sprintf('%s %s %s', $lastName, $firstName, $postNominal));
    }

    /**
     * @param $names
     * @return string
     */
    private function getPostNominals($names)
    {
        $postNominals = '';
        if (count($names) > 2) {
            $postNominalsList = array_slice($names, 2);
            foreach ($postNominalsList as $pn) {
                $postNominals .= $pn . ' ';
            }
        }
        return $postNominals;
    }


    /**
     * @param $names
     */
    private function removeHonorifics($names)
    {
        if (count($names) > 1 && $this->isHonorific($names[0])) {
            array_shift($names);
        }
        return $names;
    }

    /**
     * @param $name
     * @return bool
     */
    private function isHonorific($name)
    {
        $honorifics = array('Mme', 'Mlle', 'M.');
        return in_array($name, $honorifics);
    }

    /**
     * @param $name
     * @return array
     */
    private function splitNames($name)
    {
        return preg_split("/[\s]+/", trim($name));
    }
}