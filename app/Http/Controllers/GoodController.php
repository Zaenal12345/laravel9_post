<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Category;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Good::with('categories')->get();
        $data = [
            'goods' => $goods
        ];

        return view('pages/goods',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $data = [
            'category' => $category
        ];

        return view('pages/goods_add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'goods_name' => $request->goods_name,
            'unit' => $request->unit,
            'price' => $request->price,
            'mininum_stock' => $request->mininum_stock,
            'expired_date' => $request->expired_date,
        ];
        Good::create($data);

        return redirect()->route('good.index')->with('message','Data berhasil dimasukkan');
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
        $category = Category::all();
        $goods = Good::findOrFail($id);
        $data = [
            'category' => $category,
            'goods' => $goods
        ];

        return view('pages/goods_edit',$data);
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
        $data = [
            'category_id' => $request->category_id,
            'goods_name' => $request->goods_name,
            'unit' => $request->unit,
            'price' => $request->price,
            'mininum_stock' => $request->mininum_stock,
            'expired_date' => $request->expired_date,
        ];
        Good::where('id',$id)->update($data);

        return redirect()->route('good.index')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goods = Good::findOrFail($id);
        $goods->delete();

        return redirect()->route('good.index')->with('message','Data berhasil dihapus');
    }
}
