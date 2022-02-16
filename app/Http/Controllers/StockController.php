<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('goods')->get();
        $data = [
            'stocks' => $stocks
        ];

        return view('pages/stock',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goods = Good::all();
        $data = [
            'goods' => $goods
        ];

        return view('pages/stock_add',$data);
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
            'stock' => $request->stock,
            'goods_id' => $request->goods_id,
        ];
        Stock::create($data);

        return redirect()->route('stock.index')->with('message','Data berhasil dimasukkan');
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
        $goods = Good::all();
        $stock = Stock::findOrFail($id);
        $data = [
            'goods' => $goods,
            'stock' => $stock,
        ];

        return view('pages/stock_edit',$data);
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
            'stock' => $request->stock,
            'goods_id' => $request->goods_id,
        ];
        Stock::where('id',$id)->update($data);   

        return redirect()->route('stock.index')->with('message','Data berhasil diubah');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('stock.index')->with('message','Data berhasil dihapus');
    }
}
