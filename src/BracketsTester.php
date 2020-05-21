<?php

namespace dgoryaev;

/**
 * Short Description
 *
 * Long Description
 */
class BracketsTester
{
    const ALLOWED_SYMBOLS = ['(', ')', ' ', "\n", "\t", "\r"];

    /**
     * Short Description
     *
     * Long Description
     *
     * @param $str
     * @return mixed
     */
    public function test($str): bool
    {
        if ($this->validateString($str)) {
            return $this->validateNesting($str);
        }

        return false;
    }

    /**
     * Short Description
     *
     * Long Description
     *
     * @param $str
     * @return mixed
     */
    public function validateString($str): bool
    {
        if (preg_match("/[^\n\t\r() ]+/", $str)) {
            throw new \InvalidArgumentException('String is incorrect');
        }

        return true;
    }

    /**
     * Short Description
     *
     * Long Description
     *
     * @param $str
     * @return mixed
     */
    public function validateNesting($str): bool
    {
        $str = preg_replace("/[ \t\n\r]+/", '', $str);

        while (preg_match('/\(\)/', $str)) {
            $str = preg_replace('/\(\)/', '', $str);
        }

        return empty($str);
    }
}