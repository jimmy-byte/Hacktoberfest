<?php
function calculateCylinderSurfaceArea($radius, $height) {
    $pi = 3.14159;
        
    $surfaceArea = 2 * $pi * $radius * ($radius + $height);
    
    return $surfaceArea;
}

$radius = 5; 
$height = 10; 

$surfaceArea = calculateCylinderSurfaceArea($radius, $height);

echo "The surface area of the cylinder is: " . $surfaceArea;
?>
