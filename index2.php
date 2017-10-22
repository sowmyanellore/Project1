<?php

//Error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);



//Function to autoload files
class Manage 
{
    public static function autoload($class)
     {
        //you can put any file name or directory here
        include $class . '.php';
    }
}


//Autoload function
spl_autoload_register(array('Manage', 'autoload'));


//Initialize the main class
$obj = new main();

class main
{
    function __construct()
    {
        
        $pageRequest = 'uploadForm';   //Default page 
        
        if(isset($_REQUEST['page']))  //Checking if  the page is set
        {
           $pageRequest = $_REQUEST['page'];
        }
        
        $page = new $pageRequest;  //Call requested page
         
         //Checking the method requested   
        if($_SERVER['REQUEST_METHOD'] == 'GET') 
         {
            $page->show();
         } else {
            $page->display();
        }
    }
}



//Html for the page display
abstract class page
{
    protected $html;
    function __construct()
    {
        $this->html.='<html><head>';
        $this->html.='<link rel="stylesheet" href="style.css" type="text/css">';
        $this->html.= '</head><body>';
    }
    function __destruct()
    {
        $this->html.='</body></html>';
        print_r($this->html);
        
    }
}


//Uploading a form
class uploadForm extends page
{
//Upload form
        function show()
        {
            $form = '<form action="index2.php?page=uploadForm" method="post" enctype="multipart/form-data">';
            $form .= '<h1>Select the fileto upload</h1>';
            $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
            $form .= '<input type="submit" value="Upload File" name="submit">';
            $form.= '</form>';
            $this->html.=$form;
        }
        
        
//Saving file in afs directory
        function display()
       {       
           $target_dir = "upload_dir/";
           $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
           $uploadOk=1;
           $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
           $name = basename($_FILES["fileToUpload"]["name"]);
           if ($imageFileType != 'csv')
            {
            echo 'You can only upload a CSV file';
            }
            else
            {
           move_uploaded_file($tmp_name, "$target_dir/$name");
           header("Location:index2.php?page=htmlTabledisplay&file=$target_file");
           }

       }
}


//Csv file to Html table 
class htmlTabledisplay extends page
{
         function show()
         {
        
             $sow = $_REQUEST["file"];
             $row = 0;
             if (($handle = fopen($sow, "r")) !== FALSE)
              {
             echo "<table >";
                 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                  {
                    $num = count($data);
                    echo '<tr>'; 
                     for ($c=0; $c < $num; $c++)
                      {
                        if ($row == 0) 
                        {
                        echo '<th>' . $data[$c] . '</th>';
                        }
                        else  echo '<td>' .  $data[$c] . '</td>';
                      }
                 echo '</tr>';
                 $row++;
                 }
                 echo '</table>';
                 fclose($handle);
              }
            else
            {
            echo ' *Error in your table display'.$handle;
            }
         }
}
?>