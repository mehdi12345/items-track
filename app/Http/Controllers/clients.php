<?php

namespace App\Http\Controllers;
use App\Position;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Http\Request;

class clients extends Controller
{

    public function index()
    {
        return view('clientside');
    }

    public function productId(Request $request){
        $product_id=$request->input('id');
        $product=Position::where('product_id',$product_id)->latest()->first();
        Position::where('product_id',$product_id)->update(['show'=>'1']);
        $show=Position::where('product_id',$product_id)->latest()->first();

        $latitude=$product->latitude;
        $longitude=$product->longitude;
        return view('clientside',['latitude'=>$latitude,'longitude' => $longitude,'product_id' =>$product_id]);

    }
}
