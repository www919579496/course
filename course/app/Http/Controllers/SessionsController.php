<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create(){
        return view('sessions.create');
    }
    
    public function store(Request $request){
       $credentials = $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);

       if (Auth::attempt($credentials,$request->has('remember'))){
            //after sucessed login what action to  do
            if(Auth::user()->activated){
                session()->flash('success', 'welcomebakc');
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback);
            }else{
                Auth::logout();
                session()->flash('warning', 'your account is not actived,please active first');
                return redirect('/');
            }
        }else{
            //after failed logn ,what action to do
            session()->flash('danger', 'sorry，your email address is not match the password');
            return redirect()->back()->withInput();
       }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','logout successful!');
        return redirect('login');
    }
}

/*
if (Auth::attempt(['email' => $email, 'password' => $password])) {
    // 该用户存在于数据库，且邮箱和密码相符合
}
我们在 store 方法内使用了 Laravel 提供的 Auth::user() 方法来获取 当前登录用户 的信息，并将数据传送给路由。
这时如果尝试输入错误密码则会显示登录失败的提示信息。
使用 withInput() 后模板里 old('email') 将能获取到上一次用户提交的内容，这样用户就无需再次输入邮箱等内容
*/
