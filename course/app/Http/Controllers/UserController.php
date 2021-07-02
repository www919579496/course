<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Mail;

class UserController extends Controller
{
    /*
    __construct 是 PHP 的构造器方法，当一个类对象被创建之前该方法将会被调用。
    我们在 __construct 方法中调用了 middleware 方法，该方法接收两个参数，第一个为中间件的名称，第二个为要进行过滤的动作。
    我们通过 except 方法来设定 指定动作 不使用 Auth 中间件进行过滤，意为 —— 除了此处指定的动作以外，所有其他动作都必须登录用户才能访问
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'register', 'store', 'index', 'confirmEmail', 'search']//除了這些動作外，其他都必須登錄后才能操作
        ]);

        $this->middleware('guest', [
            'only' => ['register', 'search']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function register()
    {
        return view('users.register');
    }

    public function create()
    {
        return view('users.create');
    }


    public function show(User $user)
    {
        $products = $user->products()
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);
        //$user = $user->where('id', $user->id)->with('user_type')->first();
        //$type_name = $user->user_type->name;
        //return compact('user', 'type_name');
        return view('users.show', compact('user', 'products'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'location' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type_id' => $request->type_id,
            'location' => $request->location,
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', 'actived email is send,please check it');
        return redirect('/');
        /*
        由于 HTTP 协议是无状态的，所以 Laravel 提供了一种用于临时保存用户数据的方法 - 会话（Session），
        并附带支持多种会话后端驱动，可通过统一的 API 进行使用。
        我们可以使用 session() 方法来访问会话实例。而当我们想存入一条缓存的数据，
        让它只在下一次的请求内有效时，则可以使用 flash 方法。flash 方法接收两个参数，
        第一个为会话的键，第二个为会话的值，我们可以通过下面这行代码的为会话赋值。
         */
        return redirect()->route('users.show', [$user->id]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
        //compact() 的字符串可以就是变量的名字，多个变量名用逗号隔开。这个时候注意更改视图的变量输出
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', 'edit successfully');
        return redirect()->route('users.show', $user->id);
        //首先，我们将用户密码验证的 required 规则换成 nullable，这意味着当用户提供空白密码时也会通过验证，
        //因此我们需要对传入的 password 进行判断，当其值不为空时才将其赋值给 data，避免将空白密码保存到数据库中。
        //我们还通过会话闪存来添加用户资料更新成功后的消息提示。
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', 'delete user successfully!');
        return back();
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "register successfully,please active your account by email";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', 'Congratulations, activation is successful!');
        return redirect()->route('users.show', [$user]);
        /*
        Auth 中间件黑名单中，我们增加了 confirmEmail 来开启未登录用户的访问。
        在 confirmEmail 中，我们会先根据路由传送过来的 activation_token 参数从数据库中查找相对应的用户，
        Eloquent 的 where 方法接收两个参数，第一个参数为要进行查找的字段名称，
        第二个参数为对应的值，查询结果返回的是一个数组，因此我们需要使用 firstOrFail 方法来取出第一个用户，
        在查询不到指定用户时将返回一个 404 响应。在查询到用户信息后，
        我们会将该用户的激活状态改为 true，激活令牌设置为空。最后将激活成功的用户进行登录，
        并在页面上显示消息提示和重定向到个人页面。
         */
    }
}

/*
在实际开发中，我们经常需要对用户输入的数据进行 验证，
在验证成功后再将数据存入数据库。在 Laravel 开发中，
提供了多种数据验证方式，在本教程中，我们使用其中一种对新手较为友好的验证方式 - validator 来进行讲解。
validator 由 App\Http\Controllers\Controller 类中的 ValidatesRequests 进行定义，
因此我们可以在所有的控制器中使用 validate 方法来进行数据验证。
validate 方法接收两个参数，第一个参数为用户的输入数据，第二个参数为该输入数据的验证规则。
 */

/*
在用户填写表单的时候，我们会要求用户必须填写上自己的用户名，当用户名为空时将注册失败。
这时我们可以使用 required 来验证用户名是否为空。
'name' => 'required'
 */
/*
我们还可以使用 min 和 max 来限制用户名所填写的最小长度和最大长度。
'name' => 'min:3|max:50'
*/
/*
其它的一些应用上，如果要对用户邮箱进行验证，
则可能需要你写一段非常冗长且不易理解的 正则表达式 来匹配邮箱格式。但在 Laravel 中，我们只需简单的使用 email 便能够完成邮
'email' => 'email'
 */
/*
一般情况下，我们还需要验证用户使用的注册邮箱是否已被它人使用，这时我们可以使用唯一性验证，这里是针对于数据表 users 做验证。
'email' => 'unique:users'
 */
/*
如果我们需要确保用户在输入密码时，保证两次输入的密码一致。这时候则可以使用 confirmed 来进行密码匹配验证。
'password' => 'confirmed'
 */
