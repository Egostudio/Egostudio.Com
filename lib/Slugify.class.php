<?php
class SlugifyClass {
  private static function filterEnhanced($text)
  {
  	$bad = array(
    'À','à','Á','á','Â','â','Ã','ã','Ä','ä','Å','å','Ă','ă','Ą','ą',
    'Ć','ć','Č','č','Ç','ç',
    'Ď','ď','Đ','đ',
    'È','è','É','é','Ê','ê','Ë','ë','Ě','ě','Ę','ę',
    'Ğ','ğ',
    'Ì','ì','Í','í','Î','î','Ï','ï',
    'Ĺ','ĺ','Ľ','ľ','Ł','ł',
    'Ñ','ñ','Ň','ň','Ń','ń',
    'Ò','ò','Ó','ó','Ô','ô','Õ','õ','Ö','ö','Ø','ø','ő',
    'Ř','ř','Ŕ','ŕ',
    'Š','š','Ş','ş','Ś','ś',
    'Ť','ť','Ť','ť','Ţ','ţ',
    'Ù','ù','Ú','ú','Û','û','Ü','ü','Ů','ů',
    'Ÿ','ÿ','ý','Ý',
    'Ž','ž','Ź','ź','Ż','ż',
    'Þ','þ','Ð','ð','ß','Œ','œ','Æ','æ','µ',
    );

    $good = array(
    'A','a','A','a','A','a','A','a','Ae','ae','A','a','A','a','A','a',
    'C','c','C','c','C','c',
    'D','d','D','d',
    'E','e','E','e','E','e','E','e','E','e','E','e',
    'G','g',
    'I','i','I','i','I','i','I','i',
    'L','l','L','l','L','l',
    'N','n','N','n','N','n',
    'O','o','O','o','O','o','O','o','Oe','oe','O','o','o',
    'R','r','R','r',
    'S','s','S','s','S','s',
    'T','t','T','t','T','t',
    'U','u','U','u','U','u','Ue','ue','U','u',
    'Y','y','Y','y',
    'Z','z','Z','z','Z','z',
    'TH','th','DH','dh','ss','OE','oe','AE','ae','u'
    );

    // convert special characters
    return str_replace($bad, $good, $text);
  }

  // Enhanced filter already deals with these characters.
  // Use Basic filter only if you do not use Enhanced.
  public static function filterBasic($text) 
  {
    // convert special characters
    $text = utf8_decode($text);
    $text = htmlentities($text);
    $text = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $text);
    $text = html_entity_decode($text);

    return $text;
  }

  private static function filterTolower($text)
  {
    return strtolower($text);
  }

  private static function filterCommon($text, $separator)
  {
    // strip all non word chars
    $text = preg_replace('/\W/', ' ', $text);

    // replace all white space sections with a separator
    $text = preg_replace('/\ +/', $separator, $text);

    // trim separators
    $text = trim($text, $separator);

    return $text;
  }

  private static function filterRussian($text)
  {
    // dictionary from http://blog.fxposter.org/2008/02/page/2/
    $converter = array(
      'а' => 'a',  'б' => 'b',  'в' => 'v',   'г' => 'g',  'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh',
      'з' => 'z',  'и' => 'i',  'й' => 'y',   'к' => 'k',  'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
      'п' => 'p',  'р' => 'r',  'с' => 's',   'т' => 't',  'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
      'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '',   'ы' => 'y', 'ъ' => '',  'э' => 'e', 'ю' => 'yu',
      'і' => 'i',  'ї' => 'yi', 'я' => 'ya',
      'А' => 'A',  'Б' => 'B',  'В' => 'V',   'Г' => 'G',  'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'ZH',
      'З' => 'Z',  'И' => 'I',  'Й' => 'Y',   'К' => 'K',  'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
      'П' => 'P',  'Р' => 'R',  'С' => 'S',   'Т' => 'T',  'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
      'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ь' => '',   'Ы' => 'Y', 'Ъ' => '',  'Э' => 'E', 'Ю' => 'YU',
      'І' => 'I',  'Ї' => 'YI', 'Я' => 'YA',
    );

    return strtr($text, $converter);
  }

  static function Slugify($text)
  {
	$separator = '-';
	$useFilters = "russian basic tolower common";
    // find out which filters to use
    $filters = explode(" ", $useFilters);
    foreach ($filters as $filter) {
      $filterMethod = "filter" . ucFirst($filter);
      /*if (!method_exists('Slugify', $filterMethod )) {
        throw new sfException(sprintf('Unknown filter "%s" for slug creation', $filter));
      }*/
      $text = self::$filterMethod($text, $separator);
    }
    	
    return $text;
  }

    static function slugifyUrl($text)
  {
    $text = preg_replace("#((https?|ftp)://)|(w{2,}.)#", "", $text);
    return $text;
  }
}
?>
