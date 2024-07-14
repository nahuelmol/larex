<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;

use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;

class SetStoring extends Controller
{
    public function __construct(Database $database){
        $this->database = $database;
        $this->tablename = 'folders';
        $this->firebaseAuth = Firebase::auth();
    }
    public function add(Request $request){
        //this is the api
        //I must get its folder owner
        $setname = $request->input('name');
        $folder = $request->input('folder');
        $data = $request->input('data');
        $idToken = session('token');
        $postData = [
            'name' => $setname,
            'data' => $data,
        ];
        try {
            if(!$idToken){
                return redirect()->route('login');
            }
            $tablename = $this->tablename;
            $verifiedToken = $this->firebaseAuth->verifyIdToken($idToken);
            $value = $this->database->getReference($tablename)->getValue();
            foreach($value as $key => $record){
                if($record['name'] == $folder){
                    try {
                        $this->database
                         ->getReference($tablename.'/'.$folder.'/sets')
                         ->set('New name');
                    } catch(\Exception $e) {
                        $message = [
                            'error' => 'error'.$e->getMessage(),
                        ];
                        return redirect()->route('home')
                                ->withError($message);
                    }
                }
            }

        } catch(\Exception $e) {
            $message = [
                'error' => 'error: '.$e->getMessage(),
            ];
            return redirect()->route('home')
                             ->withError($message);
        }
        $postRef = $this->database->getReference($tablename)->push($postData);
        if($postRef){
            return redirect()->route('home')
                ->with('status', 'success');
        } else {
            return redirect()->route('home')
                ->with('status', 'failed');
        }
    }

    public function view(Request $request){
        return view('addset');
    }
}
