<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class auth extends Controller
{
    function login(Request $req){
        $req->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $user=Login::where(['email'=>$req->email])->first();
       
    if($user && hash::check($req->password, $user->password)){
        session()->put("user",$user);
        return redirect("/dashboard");
    }
        return redirect('/');
}
function register(Request $req){

    $req->validate([
        "name"=>"required",
        "email"=>"required | email",
        "password"=>"required | confirmed",
        "password_confirmation"=>"required",

    ]);

$user =new Login;
$user->name=$req->name;
$user->email=$req->email;
$user->password=hash::make($req->password);
$user->save();
return redirect("/");
}
}
