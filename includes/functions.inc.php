<?php
function display_images()
{
    if (isset($_GET['file'])) {
        copy('uploads/' . $_GET['file'],'backup/' . $_GET['file']);
        if(unlink("uploads/" . $_GET['file'])){
            header('Location: gallery.php');
        } else {
            echo '<p>File not deleted.</p>';
        }       
    }
    // start at current directory
    $dir = "uploads";
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    echo "<div class=\"pic mb-5\"><img src=\"uploads/$filename\" alt=\"A photo\"><br><a href=\"?file=$filename\" class=\"fas fa-trash-alt fa-sm\" title=\"click to delete image\"> Delete image</a></div>";
                    
                }
            } // end while
            // close the directory now that we are done with it
            closedir($dir_handle);
        } // end if
    } // end if
}