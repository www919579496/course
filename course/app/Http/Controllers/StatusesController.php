<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        //当我们在创建微博的时候，需要通过以下方式来进行创建。这样创建的微博会自动与用户进行关联
        //因为创建微博的用户始终为当前用户，借助 Laravel 提供的 Auth::user() 
        //方法我们可以获取到当前用户实例。在创建微博的时候，我们需要对微博的内容进行赋值，因此最终的创建方法如下：
        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        session()->flash('success', 'post successful!');
        return redirect()->back();
    }
    //这里我们使用的是『隐性路由模型绑定』功能，Laravel 会自动查找并注入对应 ID 的实例对象 $status，如果找不到就会抛出异常。
    public function destroy(Status $status){
        //做删除授权的检测，不通过会抛出 403 异常。
        $this->authorize('destroy', $status);
        //调用 Eloquent 模型的 delete 方法对该微博进行删除
        $status->delete();
        session()->flash('success', 'record is deleted');
        return redirect()->back();
    }
}
