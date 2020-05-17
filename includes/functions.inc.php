<?php

function display_images()
{
    $dir=$_SESSION['username'];
    if (isset($_GET['file'])) {
        if(unlink("$dir/" . $_GET['file'])){
            header('Location: gallery.php');
        } else {
            echo '<p>File not deleted.</p>';
        }       
    }
    
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    $filename = rawurlencode($filename);
                    echo "<div class=\"pic mb-5\"><img src=\"$dir/$filename\" alt=\"A photo\"><br><a href=\"?file=$filename\" class=\"fas fa-trash-alt fa-sm\" title=\"click to delete image\"> Delete image</a></div>";
                }
            } // end while
            // close the directory now that we are done with it
            closedir($dir_handle);
        } // end if
    } // end if
}