<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 09/07/17
 * Time: 11:37
 */

namespace AppBundle\Parser;


class TextParser
{
    /**
     * @param string $text
     * @return string
     */
    public static function sanitize(string $text): string
    {
        return self::removeAccents(
                self::removeExtraWhitespaces(
                $text
            )
        );
    }

    /**
     * @param $string
     * @return string
     */
    public static function removeAccents($string): string
    {
        $unwanted_array = ['Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' ];

        return strtr( $string, $unwanted_array );
    }

    /**
     * @param string $text
     * @return string
     */
    public static function removeExtraWhitespaces(string $text): string
    {
        return preg_replace('/\s+/', ' ', $text);
    }

    /**
     * Return an array with keys 'from' and 'to' default to null
     *
     * @param string $text
     * @return array
     */
    public static function recognizeDestination(string $text): array
    {
        preg_match(
            '/(?(?=(je veux aller|aller|trajet|direction)\s(a|de|pour)\s(?P<from>.*)\sa\s(?P<to>.*))|(je veux aller|aller|trajet|direction)\s(de|a|pour)\s(?P<destination>.*))/',
            strtolower(self::sanitize($text)),
            $matches
        );

        return [
            'from' => $matches['from'] ?? null,
            'to'   => $matches['to'] ?? $matches['destination'] ?? null,
        ];
    }

}