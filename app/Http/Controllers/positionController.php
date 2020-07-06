<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Position;
use App\historiquePosition;
class positionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function store(Request $request){
        $this->validate($request,[
            'user_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
            ]);
            do{
        $position=new Position;
        $position->user_id=$request->input('user_id');
        $position->latitude=$request->input('latitude');
        $position->longitude=$request->input('longitude');
        $position->product_id=$request->input('product_id');
        $position->save();}
        while($position->add==1);
        return redirect('/');
    }
    public function stop(Request $request){
        $id=$request->input('user_id');
        $idP=$request->input('product_id');
        Position::where('product_id',$idP)->update(['add' => '0']);
        $results=Position::where('user_id',$id)->get();
        $size=count($results);
        for($i=0 ; $i<$size; $i++){
            if($i==$size-1){
                $historique=new historiquePosition();
                $historique->user_id=$results[$i]->user_id;
                $historique->product_id=$results[$i]->user_id;
                $historique->latitude=$results[$i]->latitude;
                $historique->longitude=$results[$i]->longitude;
                $historique->save();
            }
    }


    return redirect("/");
    }

}
