<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Folder extends Controller {
    //this is just for views
    public function create(){
        return view('folderform');
    }
}
