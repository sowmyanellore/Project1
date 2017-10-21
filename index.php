<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);


class Manage {
       public static function autoload($class) {
       include $class . '.php';
       echo "rrr";
       }
    }

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();
echo $obj::$html;


class main
{
public static $html;

public  function __construct()
{
$form =   '<!DOCTYPE html>';
$form .=   '<html>';
$form .=   '<head>';
$form .=   '<style>.error {color: #FF0000;}';
$form .=   '<link rel="stylesheet" href="styles.css">';
$form .=   '</style></head><body>';
$form .=   '<form action="upload.php" method="post" enctype="multipart/form-data">';
$form .=   ' BROWSE THE FILE TO UPLOAD: <br><br>';
$form .=   ' <input type="file" name="fileToUpload" id="fileToUpload">';
$form .=   '<br><br>';
$form .=   ' <br><br> <input type="submit" value="Upload File" name="submit">';
$form .=   '</form>';
$form .=   '</body>';
$form .=   '</html>';
$this::$html .= $form;
}

}
?>