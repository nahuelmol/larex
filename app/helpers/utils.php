<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Hash;

function generateSalt(){
    $random = rand(1,100);
    return $random;
}
function passwordHashing($password){
    $salt = generateSalt();
    $hashed = Hash::make($password, [
        'rounds' => 12,
    ]);
    return $hashed;
}
