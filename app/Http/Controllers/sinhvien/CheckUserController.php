<?php

namespace App\Http\Controllers\sinhvien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\sinhvien;
use App\User;
class CheckUserController extends Controller
{
    public function getLogin() {
        return view('login',['code' => 1]);
    }
 
    public function postLogin(Request $request) {
		if($request->option == "pdt"){
        	if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) 
				return view('home');
			else 
				return view('login',['code' => 200]);
		}else {
			if($sv = sinhvien::where('username', '=',  $request->username) != null){
				//echo $sv;
				
				$result = $this->svlogin($request->username, $request->password);
				
				if($result == 302) {
					Auth::guard('sinhvien')->loginUsingId($sv,true);
					return redirect('/home_sv');
				}
				else if($result == 200){
					//Auth::logout();
					return view('login',['code' => 200]);
				}
				else {
					//Auth::logout();
					return view('login',['code' => 0]);
				}
			}else 
				return view('login',['code' => 1]);
		}
    }
 
    public function logout() {
        Auth::logout();
        return view('login',['code' => 1]);
    }
	protected function svlogin(string $username, string $password){
		$url = 'http://ctmail.vnu.edu.vn/webmail/src/redirect.php';
		$data = array(
		'login_username' => $username, 'secretkey' => $password, 'js_autodetect_results'=>1, 'just_logged_in' => 1);
		//$postString = http_build_query($data, '', '&');
		$ch = curl_init( $url );
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);   
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);    
		//echo($httpcode."\n\n\n\n".$result);
		return $httpcode;
	}
}
