<?php

namespace Lenovo\TestApp;

class Exploder
{
    public function explode(string $separator, string $val, int $limit = PHP_INT_MAX): array
    {
        $result = [];
        while(stripos($val, $separator) !== false) {
            $limit--;
            if($limit <= 0 ) break;

            $posSep = stripos($val, $separator);
            $result[] = substr($val, 0, $posSep);
            $val = substr($val, $posSep + strlen($separator));
        }
        
        $result[] = $val;
        return $result;
    }
}