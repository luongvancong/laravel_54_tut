<?php
if( ! function_exists('upload') ) {
    /**
     * Upload file
     * @param  str $fileControl
     * @return str
     */
    function upload($fileControl) {
        $baseFilename = public_path() . '/uploads/' . $_FILES[$fileControl]['name'];
        $info = new SplFileInfo($baseFilename);
        $ext = $info->getExtension();

        // Tên file mới
        $filename = md5($baseFilename) . '.' . $ext;

        move_uploaded_file($_FILES[$fileControl]['tmp_name'], public_path() . '/uploads/' . $filename);

        return $filename;
    }
}


if( ! function_exists('_debug') ) {
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
}

if( ! function_exists('xss_clean') ) {
    function xss_clean($data)
    {
        // Fix &entity\n;
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        // we are done...
        return $data;
    }
}


/**
 * Make Delete Button
 *
 * @param  url $link
 * @return html
 */
function makeDeleteButton($link) {
    return '<a class="btn btn-xs btn-danger btn-delete-action" href="'. $link .'"><i class="fa fa-trash-o"></i></a>';
}


/**
 * Make Edit button
 *
 * @param  url $link
 * @return html
 */
function makeEditButton($link) {
    return '<a class="btn btn-xs btn-default" href="'. $link .'"><i class="fa fa-pencil"></i></a>';
}


/**
 * Make active button
 *
 * @param  url $link
 * @param  integer $currentActiveValue
 * @return html
 */
function makeActiveButton($link, $currentActiveValue) {
    $classActive = $currentActiveValue == 1 ? 'fa-check-square' : 'fa-square-o';
    return '<a class="btn-action btn-xs btn-active-action" href="'. $link .'"><i class="fa '. $classActive .' fa-2x"></i></a>';
}

/**
 * Format tiền tệ
 * @param  integer $number
 * @return string
 */
function formatCurrency($number) {
    return number_format($number, 0, '.', '.');
}


/**
 * Tao chu khong dau & thay the dau cach bang dau -
 * @param  string $string
 * @param  string $keyReplace
 * @return string
 */
function removeTitle($string, $keyReplace = "/"){
    $string = removeAccent($string);
    $string =  trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
    $string =  str_replace(" ","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace("--","-",$string);
    $string = str_replace($keyReplace,"-",$string);
    return strtolower($string);
}

/**
 * Remove tieng viet thanh khong dau
 * @param  string $string
 * @return string
 */
function removeAccent($string) {
    $marTViet = array(
    // Chữ thường
    "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
    "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
    "ì","í","ị","ỉ","ĩ",
    "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
    "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
    "ỳ","ý","ỵ","ỷ","ỹ",
    "đ","Đ","'",
    // Chữ hoa
    "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
    "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
    "Ì","Í","Ị","Ỉ","Ĩ",
    "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
    "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
    "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
    "Đ","Đ","'",
    );
    $marKoDau=array(
        /// Chữ thường
        "a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d","D","",
        //Chữ hoa
        "A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","D","",
        );
    return str_replace($marTViet, $marKoDau, $string);
}