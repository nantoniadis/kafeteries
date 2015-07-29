<?php
REQUIRE_ONCE('settings.php');
//General Functions
function isInteger($input){
    return(ctype_digit(strval($input)));
}
function formatNumber($number) {
    $prefixes = 'kMGTPEZY';
    if ($number >= 10000) {
        $log1000 = floor(log10($number)/3);
        return floor($number/pow(1000, $log1000)).$prefixes[$log1000-1];
    }
    return $number;
}
function upperCase($string)
{
        $search  = array("Ά", "Έ", "Ή", "Ί", "Ϊ", "ΐ", "Ό", "Ύ", "Ϋ", "ΰ", "Ώ");
        $replace = array("Α", "Ε", "Η", "Ι", "Ι", "Ι", "Ο", "Υ", "Υ", "Υ", "Ω");
        $string  = mb_strtoupper($string, "UTF-8");

        return str_replace($search, $replace, $string);
}
function getValue($value, $table, $id) {
	global $db;
	$sql = 'SELECT `'.$value.'` FROM `'.$table.'` WHERE `id` = ?';
	$params = array($id);
	if($row = $db->row($sql,$params))
		return $row->$value;
	else
		return false;
}
function createSlug($string){
   $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
//Application Functions
?>
