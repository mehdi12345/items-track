<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Position;
use App\Product;
use App\historiquePosition;
use PHPUnit\Framework\Constraint\Count;

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
            $historique=historiquePosition::all();

            for($i=0;$i<count($historique);$i++){
                $results[$i]=$historique[$i]->product_id;
            }
            $positions=Position::where('add','0')->get();
            foreach(Product::all() as $product){
        $position=new Position;
        $position->user_id=$request->input('user_id');
        $position->latitude=$request->input('latitude');
        $position->longitude=$request->input('longitude');
        if(Count($positions)==0){
            $position->product_id=$product->id;
            $position->save();
        }
        else{
        foreach($positions as $pos){
            if($pos->product_id!=$product->id){
        $position->product_id=$product->id;
        $position->save();
    }}
    }
        }
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
                $historique->product_id=$idP;
                $historique->latitude=$results[$i]->latitude;
                $historique->longitude=$results[$i]->longitude;
                $historique->save();
            }
    }
    return redirect("/");
    }
    public function start(Request $request){
        $idP=$request->input('product_id');
        Position::where('product_id',$idP)->update(['add' => '1']);
return redirect("/");
    }

}
