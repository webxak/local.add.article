<?php

namespace app\modules;

/**
 * переводит в транслит название статьи
 * Справочник языка => spravochnik-yazyka
 * getLetter - массив букв, для замены
 * translite - переводит в транслит полученную строку
 * Class Translite
 * @package app\modules
 */

class Translite
{
    /**
     * переводит в транслит полученную строку
     * @param $word
     * @return string
     */
    public static function translite($word)
    {
        $newWord = '';
        $word = mb_strtolower($word);
        $letters = self::getLetter();

        for ($i = 0; $i < strlen($word); $i++) {
            $currentLetter = mb_substr($word, $i, 1);

            //замена пробелов на подчеркивания и простановка тирэ
            if ($currentLetter === " ") {
                $newWord .= "-";
            } elseif ($currentLetter === "-") {
                $newWord .= $currentLetter;
            }

            //заменяем буквы
            foreach ($letters as $rus => $eng) {
                if ($currentLetter == $rus) {
                    $newWord .= str_replace($rus, $eng, $currentLetter);
                } else {
                    continue;
                }
            }
        }
        return $newWord;
    }

    /**
     * массив букв, для замены
     * @return array
     */
    private static function getLetter()
    {
        return $letters = [
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'jh', 'з' => 'z',
            'и' => 'i', 'й' => 'j', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh',
            'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        ];
    }
}
