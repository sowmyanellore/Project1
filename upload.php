 <?php
  $obj = new upload();
  
  class upload
  {
  
     public function __construct()
     {
         
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this::post();
          }
     }
     
     public static function post()
     {
     
  $target_dir = "upload_dir/";
 
 
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