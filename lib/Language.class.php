<?php

class Language
{
    private static $browserLang;
    private static $languageObject;
    private static $fileExt = '.lang.php';

    public static function init($langDir, $dbDefaultLang = NULL)
    {
        if (!is_dir($langDir)) throw new Exception('The parameter is not a directory!');

        self::$browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        $loadLanguage = NULL;
        if (!is_null($dbDefaultLang)) {
            $loadLanguage = $dbDefaultLang;
        } elseif (is_file($langDir . '/' . self::$browserLang . self::$fileExt)) {
            $loadLanguage = self::$browserLang;
        } elseif (is_file($langDir . '/de' . self::$fileExt)) {
            $loadLanguage = 'de';
        } else {
            throw new Exception('No valid language file could be found and loaded!');
        }
        require_once($langDir . '/' . $loadLanguage. self::$fileExt);
        self::$languageObject = self::arrayToObject($lang);
    }

    private static function arrayToObject($array)
    {
        if (!is_array($array)) {
            return $array;
        }
        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = self::arrayToObject($value);
                }
            }
            return $object;
        } else {
            return FALSE;
        }
    }

    public static function getObject()
    {
        if (!is_null(self::$languageObject)) {
            return self::$languageObject;
        } else {
            throw new Exception('The language object is empty!');
        }
    }
}

