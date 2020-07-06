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
    public function getdata(){
        $data=Position::Find(Auth::user()->id,'user_id');
        $latitude=$data->latest()->first()->latitude;
        $longitude=$data->latest()->first()->longitude;
        return view('clientside',['latitude'=>$latitude,'longitude' => $longitude]);
    }
}
