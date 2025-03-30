<?php
function getPath($forWho){

    $folderPath = WRITEPATH . 'uploads/' . $forWho;

    return $folderPath ;


}

function resizeImage($source, $destination) {
    list($width, $height, $type) = getimagesize($source);
    
    // Determine new dimensions
    if ($width > $height) {
        // Landscape
        $newWidth = 800;
        $newHeight = 600;
    } else {
        // Portrait
        $newWidth = 600;
        $newHeight = 800;
    }

    // Create a new image resource from the original
    switch ($type) {
        case IMAGETYPE_JPEG:
            $srcImage = imagecreatefromjpeg($source);
            break;
        case IMAGETYPE_PNG:
            $srcImage = imagecreatefrompng($source);
            break;
        case IMAGETYPE_GIF:
            $srcImage = imagecreatefromgif($source);
            break;
        default:
            die("Unsupported image type.");
    }

    // Create a new blank image with the desired dimensions
    $dstImage = imagecreatetruecolor($newWidth, $newHeight);

    // Resize the image
    imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Save the resized image
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($dstImage, $destination);
            break;
        case IMAGETYPE_PNG:
            imagepng($dstImage, $destination);
            break;
        case IMAGETYPE_GIF:
            imagegif($dstImage, $destination);
            break;
    }

    // Free memory
    imagedestroy($srcImage);
    imagedestroy($dstImage);
}

// Example usage
/* $sourceImage = 'input.jpg';  // Change this to your image path
$destinationImage = 'resized.jpg';

resizeImage($sourceImage, $destinationImage);
echo "Image resized successfully!"; */
?>
