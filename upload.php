<?php
 $obj = new upload();
 
 class upload
 {
 
    public function __construct()
    {
        echo "in upload";
         if($_SERVER['REQUEST_METHOD'] == 'POST') {
           $this::post();
         }
    }
    
    public static function post()
    {
    //static $myvar = 45;
 $target_dir = "upload_dir/";

$file_ext=strtolower(end(explode('.',$_FILES["fileToUpload"]["name"])));
 $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
 $name = basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($tmp_name, "$target_dir/$name");
 $sow = $_FILES["fileToUpload"]["name"];
$s = $target_dir . $sow ;
 $t = "upload_dir/" . $_FILES["fileToUpload"]["name"]; 
header("Location: csv2html.php?file=$t");
}

}
?>
