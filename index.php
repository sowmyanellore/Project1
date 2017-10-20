<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
      BROWSE THE FILE TO UPLOAD: <br><br>
    <input type="file" name="fileToUpload" id="fileToUpload">
 
    <span class="error">* <?php echo $err;?></span>
  <br><br>
   <br><br> <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

