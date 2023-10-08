<?php
function calculateAge($birthdate)
{
    $today = new DateTime();
    $birthDate = new DateTime($birthdate);
    $age = $today->diff($birthDate);
    return $age->y;
}

$birthdate = '1990-05-15';

$age = calculateAge($birthdate);
echo "Your age is $age years.";
