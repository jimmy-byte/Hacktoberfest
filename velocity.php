<?php

$initialPositionX = 2; 
$initialPositionY = 3; 

$finalPositionX = 5;   
$finalPositionY = 8;   

$timeTaken = 2; 

$changeInX = $finalPositionX - $initialPositionX;
$changeInY = $finalPositionY - $initialPositionY;

$velocityX = $changeInX / $timeTaken;
$velocityY = $changeInY / $timeTaken;

$velocityMagnitude = sqrt($velocityX ** 2 + $velocityY ** 2);


echo "Velocity in the X-direction: " . $velocityX . " units per second\n";
echo "Velocity in the Y-direction: " . $velocityY . " units per second\n";
echo "Resultant Velocity: " . $velocityMagnitude . " units per second\n";
?>
