<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models;
use Auth;
class StaticPagesController extends Controller
{
    /*
    我们定义了一个空数组 feed_items 来保存微博动态数据。由于用户在访问首页时，
    可能存在登录或未登录两种状态，因此我们需要确保当前用户已进行登录时才从数据库读取数据。
    前面章节我们已讲过，可以使用 Auth::check() 来检查用户是否已登录。
    另外我们还对微博做了分页处理的操作，每页只显示 30 条微博。
    */
    public function home()
    {
        $feed_items = [];
        //$user=\Auth::user();
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(10);
        }else{
            $feed_items= Product::orderBy('created_at','desc')->get();
        }
        return view('static_pages/home', compact('feed_items'));
    }

    public function help()
    {
        return view('static_pages.help');
    }

    public function about()
    {
        return view('static_pages.about');
    }
    public function search(Request $request){

        $keyword = $request->keyword;
        $products = Product::where('id', 'LIKE', "%$keyword%")->orderBy('created_at', 'DESC')->paginate(10);
        //var_dump($statuses);
         //var_dump($keyword);
         return view('static_pages._search_result', compact('products', 'keyword'));
    }
}
