<?php 
session_start();
include_once('idea_header.php');
include_once('classes/check.class.php');
$_SESSION['userid'] = $_SESSION['bridge']['user_id'];
?>
<br><br>
<?php 
if($_POST['Submit'] == 'Upload') 
{ 
// This is the unique user_id
$id = $_SESSION['bridge']['user_id'];

if (!empty ($_FILES['ifile']['tmp_name']))
{
/* Thumbnail class is required */
include_once('phpthumb/ThumbLib.inc.php');

/* GetImageSize() function pulls out valid info about image such as image type, height etc. If it fails 
then it is not valid image. */

 if (!getimagesize($_FILES['ifile']['tmp_name']))
  { 
   die("Error - Invalid Image File.");
  
  }

$imgtype = array('1' => '.gif', '2' => '.jpg' , '3' => '.png');
  
  // extract the width and height of image 
  list($width, $height, $type, $attr) = getimagesize($_FILES['ifile']['tmp_name']);
 
 // Extract the image extension
  switch ($type)
  {
  case 1: $ext='.gif'; break;
  case 2: $ext = '.jpg';break;
  case 3: $ext='.png'; break;
  }
  // Dont allow gif files to upload as it may  contain harmful code
  if ( $ext == '.gif') {
    die("Sorry - GIF not allowed. Please use only PNG or JPEG formats");
    }
  
 /* Specify maximum height and width of users uploading image */
   if ($width > 2000 || $height > 2000)
  {
   die("ERROR: Maximum width and height exceeded. (max 2000x2000 pixels)");
   
  }
  /* Specify maximum file size here in bytes */ 
  if ($_FILES['ifile']['size'] > 3000000 )
    {
    die("Error: Large File size. (max 500kb)");
    
    } 
    /******** IMAGE RESIZING *********************/
    // Before we start resizing, we first have to move the image file to server
    // save it there under a unique name and then do the final resizing and save the resized image.
    
    // Specify which directory you want to upload. It should be a subfolder where the script is present
    // We also generate a unique name for picture FILE-USERID-XXX where xxx is random number
    // The uploads folder must have writable permissions.
    $uploaddir = 'uploads/';
    $secondname = rand(100,1);
    $uploadfile =  $uploaddir . "img-$id-$secondname". $ext;
    
    if (!move_uploaded_file($_FILES['ifile']['tmp_name'], $uploadfile ))
     {
       die("Error moving the uploaded file");
     }
    
    $thumb = PhpThumbFactory::create($uploadfile);
    //specify the height and width of avatar image to resize
    $thumb->resize(100,100);
    $thumb->save($uploadfile);
    //$thumb->show();
    //MySQL query to update avatar filename in the database. You need to create a field avatar
    $image = mysql_query("UPDATE login_users SET avatar='$uploadfile' WHERE user_id='$id'");
    $row_settings = mysql_fetch_array($image);
    
    //$thumb->destruct();
    }
    
}    
?>
<form action="mysettings.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
          <p> 
            Image Upload 
            <input type="file" name="ifile">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input name="Submit" type="submit" id="Submit" value="Upload">
          </p>
        <p><strong>Max 500 Kb, JPEG/PNG only (128x128 pixels maximum) </strong></p>
      </form> 
<?php include_once('footer.php'); ?>      