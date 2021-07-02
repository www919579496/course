<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->paginate(5);

        return view('test', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight'=>'required',
            'ractopamine'=>'required',
        ]);
        //当我们在创建微博的时候，需要通过以下方式来进行创建。这样创建的微博会自动与用户进行关联
        //因为创建微博的用户始终为当前用户，借助 Laravel 提供的 Auth::user()
        //方法我们可以获取到当前用户实例。在创建微博的时候，我们需要对微博的内容进行赋值，因此最终的创建方法如下：
        Product::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'weight'=> $request->weight,
            'detail'=>$request->detail,
            'ractopamine'=>$request->ractopamine,
        ]);
        session()->flash('success', 'upload successful!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
