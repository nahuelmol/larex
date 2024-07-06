<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class UserStoring extends Controller {
    public function __construct(Database $database){
        $this->database = $database;
        $this->tablename = 'users';
    }
    public function store(Request $request){
        $tablename = $this->tablename;
        $postData = [
            'email'=>$request->email,
            'age'=>$request->age,
            'username'=>$request->username,
        ];
        $postRef = $this->database->getReference($tablename)->push($postData);
        if($postRef){
            return redirect('register')->with('status', 'success');
        } else {
            return redirect('register')->with('status', 'failed');
        }
    }
}
