<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

use App\Helpers;

class UserStoring extends Controller {
    public function __construct(Database $database){
        $this->database = $database;
        $this->tablename = 'users';
    }
    public function store(Request $request){
        $tablename = $this->tablename;
        $cleaned_uname = strip_tags($request->username);
        $hashed_pass = Helpers\passwordHashing($request->password);
        echo $cleaned_uname. "\n";
        $postData = [
            'username'=>$request->$cleaned_uname,
            'email'=>$request->email,
            'password'=>$hashed_pass,
        ];

        $postRef = $this->database->getReference($tablename)->push($postData);
        if($postRef){
            return redirect('register')->with('status', 'success');
        } else {
            return redirect('register')->with('status', 'failed');
        }
    }
    public function edit(Request $request){
        //this is when a user wants to modify some data on its account
    }
    public function delete(Request $request){
        //this is when a user wants to eliminate its own account
    }
}
