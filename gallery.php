<?php require_once 'includes/functions.inc.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">


</head>
    
<body>
<?php

    // Define these errors in an array
    $upload_errors = array(
        UPLOAD_ERR_OK                 => "No errors.",
        UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL             => "Partial upload.",
        UPLOAD_ERR_NO_FILE             => "Please select a file to upload",
        UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
    );

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // what file do we need to move?
        $tmp_file = $_FILES['file_upload']['tmp_name'];

        // set target file name
        // basename gets just the file name
        $target_file = basename($_FILES['file_upload']['name']);

        // set upload folder name
        $upload_dir = 'uploads';

        // Now lets move the file
        // move_uploaded_file returns false if something went wrong
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        } // end of if
    }

    if (isset($_GET['file'])) {
        copy('uploads/' . $_GET['file'],'backup/' . $_GET['file']);
        if(unlink("uploads/" . $_GET['file'])){
            header('Location: gallery.php');
        } else {
            echo '<p>File not deleted.</p>';
        }       
    }        
    
?>
<div class="container">
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
		                <input type="hidden" name="MAX_FILE_SIZE" value="100000000">              
                        <input type="file" name="file_upload">            
                        <div class="form-group">
                            <!-- <label name="file_upload" class="control-label">Upload Your Favorite Images</label> -->
                        
                        <input type="submit" name="submit" value="Upload File">
                        </div>
                    </div>
                </div>
            <div class="row">
        <?php if (!empty($message)) {echo "<p id=\"alert\" class=\"alert alert-primary mt-4\">{$message}</p>";}?>
        </div> 
	</form>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap flex-row align-items-center justify-content-between">
                <?php display_images(); ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>