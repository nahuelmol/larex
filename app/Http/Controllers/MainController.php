<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Database;

class MainController extends Controller {
    protected $firebaseAuth;
    public function __construct(Database $database){
        $this->database = $database;
        $this->firebaseAuth = Firebase::auth();
        $this->tablename = 'folders';
    }
    public function calculator(){
        return view('calculator');
    }
    public function home(Request $request){
        $email_session = session('email');
        $token_session = session('token');
        $data = [];
        if(!$token_session){
            return view('home');
        }
        $users = [];
        try {
            $verifiedToken = $this->firebaseAuth->verifyIdToken($token_session);
            $uid = $verifiedToken->claims()->get('sub');
            $tablename = $this->tablename;
            $value = $this->database->getReference($tablename)->getValue();
            if($value == null){
                $data['firebase_session'] = false;
                return view('home', ['data' => $data]);
            }
            foreach($value as $key => $record){
                if($uid == $record['userid']){
                    $sets = [];
                    $user = [
                        'title' => $record['title'],
                        'description' => $record['description'],
                        'time' => $record['time'],
                        'sets' => $sets,
                    ];
                    array_push($users, $user);
                }
            }
            $user = $this->firebaseAuth->getUser($uid);
            $data = [
                'email' => $user->email,
            ];
        } catch(FailedToVerifyToken $e){
            session()->flush();
            $message = [
                'error' => 'error:'.$e->getMessage(),
            ];
            return redirect()->route('login')->withErrors($message);
        }
        $data = [
            'firebase_session' => true,
            'email' => $data['email'],
            'folders' => $users,
        ];
        return view('home', ['data' => $data]);
    }
}
