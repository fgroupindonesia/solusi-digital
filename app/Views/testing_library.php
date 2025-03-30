<?php
if (extension_loaded('gd')) {
    echo "GD Library is installed and enabled.";
} else {
    echo "GD Library is NOT installed.";
}

 $folderPath = WRITEPATH . 'uploads/';

 echo $folderPath;

?>
