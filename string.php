<?php

$strings = ["Hello", "World", "PHP", "Programming"];
function countVowels($string)
{
    $vowels = "aeiouAEIOU";
    $count = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        if (strpos($vowels, $string[$i]) !== false) {
            $count++;
        }
    }

    return $count;
}

foreach ($strings as $string) {
    $vowelCount = countVowels($string);

    $reversedString = strrev($string);

    echo "Original String: $string, Vowels count: $vowelCount,  Reversed String: $reversedString \n\n";

}