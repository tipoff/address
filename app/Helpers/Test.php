<?php

function cleanSlug($string)
{
    $string = preg_replace('/\%/', ' percentage', $string);
    $string = preg_replace('/\@/', ' at ', $string);
    $string = preg_replace('/\&/', ' and ', $string);
    $string = preg_replace('/\s[\s]+/', '-', $string);    // Strip off multiple spaces
    $string = preg_replace('/[^\\pL\d_]+/u', '-', $string);
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    $string = strtolower($string);
    $string = preg_replace('/[^-a-z0-9_]+/', '', $string);
    $string = preg_replace('/[\s\W]+/', '-', $string);    // Strip off spaces and non-alpha-numeric
    $string = trim($string, '-'); // Strip off the starting & ending hyphens

    return $string;
}
