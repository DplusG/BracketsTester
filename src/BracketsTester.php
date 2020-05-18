<?php

namespace dgoryaev;

class BracketsTester
{
    const ALLOWED_SYMBOLS = ['(', ')', ' ', "\n", "\t", "\r"];

    public function test($str): bool
    {
        if ($this->validateString($str)) {
            return $this->validateNesting($str);
        }
    }

    public function validateString($str): bool
    {
        if (preg_match("/[^\n\t\r() ]+/", $str)) {
            throw new \InvalidArgumentException('String is incorrect');
        }

        return true;
    }

    public function validateNesting($str): bool
    {
        $str = preg_replace("/[ \t\n\r]+/", '', $str);

        while (preg_match('/\(\)/', $str)) {
            $str = preg_replace('/\(\)/', '', $str);
        }

        return empty($str);
    }
}