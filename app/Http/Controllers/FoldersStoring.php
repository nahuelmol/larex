<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;

use App\Helpers;

class FoldersStoring extends Controller {
    public function __construct(Database $database){
        $this->database = $database;
        $this->tablename = 'folders';
        $this->firebaseAuth = Firebase::auth();
    }
    public function create(Request $request){
        $foldername = $request->input('name');
        $description = $request->input('description');
        $title = $request->input('title');
        $idToken = session('token');
        $tablename = $this->tablename;
        $postData = [];
        try {
            if(!$idToken){
                return redirect()->route('login');
            }
            $verifiedToken = $this->firebaseAuth->verifyIdToken($idToken);
            $uid = $verifiedToken->claims()->get('sub');
            $time = now();
            $sets = [];
            $postData = [
                'title' =>$title,
                'userid'=>$uid,
                'description'=>$description,
                'sets' => $sets,
                'time' => $time,
            ];
        } catch(\Exception $e) {
            $message = [
                'error' => 'error: '.$e->getMessage(),
            ];
            return redirect()->route('folder-form')
                             ->withError($message);
        }

        $postRef = $this->database->getReference($tablename)->push($postData);
        if($postRef){
            return redirect()->route('home')
                ->with('status', 'success');
        } else {
            return redirect()->route('formfolder')
                ->with('status', 'failed');
        }
    }
    public function edit(Request $request){
        $tablename = $this->tablename;
        $value = $this->database->getReference($tablename)->getValue();
        //this is when a user wants to modify some data on its account
        return redirect()->route('home');
    }
    public function delete(Request $request){
        //this is when a user wants to eliminate its own account
        return redirect()->route('home');
    }
}
