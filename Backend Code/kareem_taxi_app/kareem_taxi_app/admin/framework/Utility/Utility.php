<?php

require_once(CONFIG);

class Utility
{


    public static function Logger($data)
    {
        echo "<br> Logger = " . $data;
    }

    public static function LoggerArray($data){

        print_r($data);

    }

    public static function DebugObject($data)
    {
        echo "<br>";
        var_dump($data);
    }

    public static function replaceEmpty($data)
    {
        if (isset($data)) {
            return simplifySpecialCharacter($data);
        } else {
            return null;
        }
    }

    public static function utf8ize($d)
    {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = Utility::utf8ize($v);
            }
        } else if (is_string($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

    public static function getPaginationCssCode($rows)
    {

        $cssCode = "";
        $prevCode = "";
        $nextCode = "";
        $expandInitialValue = 2;
        $offsetNo = 0;

        for ($i = 0; $i < $rows; $i++) {

            $pageNo = $i + 1;
            if ($i > 0)
                $offsetNo += 10;

            if ($i >= $expandInitialValue && $i <= ($rows - 2) && $rows > 5) {

                if ($i == 2)
                    $cssCode .= "<li  id='expand' class=\"page-item\"><a class=\"page-link\"   onclick='expand($i, ($rows-2))'>...</a></li>";
                /// else
                $cssCode .= "<li id='li-$i' style='display: none' class=\"page-item\"><a id='pag-$i' class=\"page-link\" href=\"#\"  onclick='pag($offsetNo,$i)'>$pageNo</a></li> ";

            } else {
                if($i == 0){
                    $cssCode .= "<li id='li-$i' class=\"page-item\"><a id='pag-$i' class=\"page-link active\"   onclick='pag($offsetNo,$i)'>$pageNo</a></li>";
                }else {
                    $cssCode .= "<li id='li-$i' class=\"page-item\"><a id='pag-$i' class=\"page-link\"   onclick='pag($offsetNo,$i)'>$pageNo</a></li>";
                }

            }


        }

        $prevCode = "<li id='prev-page' class=\"page-item\"><a class=\"page-link page_pre\"  onclick='prevPage(0,$rows,$expandInitialValue,($rows-2))'><span><i
                                class=\"fas fa-angle-left\"></i></span></a></li> <br />";

        $nextCode .= "<li id='next-page' class=\"page-item\"><a class=\"page-link page_next\"  onclick='nextPage(0,$rows,$expandInitialValue,($rows-2))'><span><i
                                class=\"fas fa-angle-right\" ></i></span></a></li>";

        $cssCode = $prevCode . $cssCode . $nextCode;

        ///Utility::Logger($cssCode);

        return $cssCode;
    }

    public static function convert_save_image_from_base64($picture_name, $picture_into_base64, $folder_path)
    {
        // echo $picture_into_base64;
        $pictureData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $picture_into_base64));
        $pictureName = $picture_name;
        file_put_contents($folder_path . $pictureName, $pictureData);


        return $picture_name;
    }

    public static function extractNumericFromString($string)
    {
        preg_match_all('!\d+!', $string, $match);

        return $match[0][0];
    }


    public static function extractCharactersFromString($string)
    {
        preg_match_all('!\D+!', $string, $match);

        return $match[0][0];
    }


}


?>