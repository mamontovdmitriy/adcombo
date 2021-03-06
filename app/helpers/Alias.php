<?php

namespace app\helpers;

class Alias
{
    public static function generate($str)
    {
        $rules = [
            "А" => "a",
            "Б" => "b",
            "В" => "v",
            "Г" => "g",
            "Д" => "d",
            "Е" => "e",
            "Ё" => "yo",
            "Ж" => "zh",
            "З" => "z",
            "И" => "i",
            "Й" => "y",
            "К" => "k",
            "Л" => "l",
            "М" => "m",
            "Н" => "n",
            "О" => "o",
            "П" => "p",
            "Р" => "r",
            "С" => "s",
            "Т" => "t",
            "У" => "u",
            "Ф" => "f",
            "Х" => "h",
            "Ц" => "ts",
            "Ч" => "ch",
            "Ш" => "sh",
            "Щ" => "sch",
            "Ь" => "",
            "Ы" => "i",
            "Ъ" => "",
            "Э" => "e",
            "Ю" => "yu",
            "Я" => "ya",
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "е" => "e",
            "ё" => "yo",
            "ж" => "zh",
            "з" => "z",
            "и" => "i",
            "й" => "y",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "u",
            "ф" => "f",
            "х" => "h",
            "ц" => "ts",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "sch",
            "ь" => "",
            "ы" => "i",
            "ъ" => "",
            "э" => "e",
            "ю" => "yu",
            "я" => "ya",
            "\"" => "",
            "\r" => "",
            "\n" => "",
            "\t" => "",
            "'" => "",
            "`" => "",
            "!" => "",
            "@" => "",
            "#" => "",
            "$" => "",
            "%" => "",
            "?" => "",
            "^" => "",
            "№" => "",
            "[" => "",
            "]" => "",
            "{" => "",
            "}" => "",
            "(" => "",
            ")" => "",
            ":" => "",
            " " => "_",
            "." => "_",
            "," => "_",
            "*" => "_",
            "+" => "_",
            "=" => "_",
            "/" => "_or_",
            "\\" => "_or_",
            "&amp;" => "_and_",
            "&copy" => "_",
            "&trade;" => "_",
            "&reg;" => "_",
            "&quot;" => "_",
            "quot;" => "_",
            "&" => "_",
            ";" => "",
            "__" => "_",
        ];
        return str_replace(array_keys($rules), array_values($rules), $str);
    }
}