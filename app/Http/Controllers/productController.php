<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'name' => 'required',
            'price' => 'required',
            'user_name' => 'required'
        ]);
            $code=$request->input('code');
            if($code=='azerty@987'){
        $image = $request->file('file');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $product=new Product;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->path=$name;
        $product->user_name=$request->input('user_name');
        $product->save();
            return redirect('Store')->with(['status' => 'done']);}
            else{
                return redirect('Store')->with(['status' => 'fail']);
            }
    }
}
