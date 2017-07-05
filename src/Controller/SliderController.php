<?php
namespace Pratik\Slider\Controller;

use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
// use Pratik\ToDoEventCalender\Requests\CalenderRequest;
use Pratik\Slider\Model\Slider;
class SliderController extends Controller
{
 
     
  public function index()
    {
        $sliders=Slider::all();
        return view('slider::index')->with('sliders',$sliders);
    }
    public function create(Request $request)
    {
        return view('slider::slider_form');
    }

// public function store(CalenderRequest $request)
// {
// 	// print_r(Input::all());
// 	$msg='';
// 	$msg_status=false;
// 	$id=$request->id;
// 	$title=$request->title;
// 	$description=$request->description;
// 	$daterange=$request->daterange;
// 	$daterange=explode('-', $daterange);
// 	// echo '<pre>';
// 	// print_r($daterange);

// 	$var = $daterange[0];
// 	$date = str_replace('/', '-', $var);
//  	$daterange[0]=date('Y-m-d H:i:s ', strtotime($date));
	
// 	$start_dt=$daterange[0];

// 	$var = $daterange[1];
// 	$date = str_replace('/', '-', $var);
//  	$daterange[1]=date('Y-m-d H:i:s ', strtotime($date));
// 	$end_dt=$daterange[1];
// 	 // print_r(\Auth::user()->id); exit;
// 	if($id==''){
// 		$obj =new Calender();
// 	}else{
// 		$obj =Calender::find($id);
// 	}
// 	$obj->title=$title;
// 	$obj->description=$description;
// 	$obj->start_dt=$start_dt;
// 	$obj->end_dt=$end_dt;
// 	$obj->status=1;
// 	$obj->user_id=Auth::id();

// 	if($obj->save()){
// 	$msg_status=true;
// 	if($id==''){
// 	 $msg="Save Successfully !";
// 	}else{
// 	 $msg="Update Successfully !";
// 	}
// 	}else{
// 			 $msg="Something went wrong ! Please retry.";
// 	}

//     	 return response()->json(array('status' => $msg_status, 'msg'=>$msg));
	
// }

// public function getCalender(Request $request)
// {

// 	$start=$request->get('start');
// 	$end=$request->get('end');

// 	// echo $date=date('Y-m-d',$start);
// 	$rows=Calender::select('id','start_dt','end_dt','title','description')->where('start_dt','>=',date('Y-m-d',$start))->get()->all();
// 	// print_r($calender);
// 	$calender=[];
// 	$test_arr=[];
// 	foreach ($rows as $key=> $row) {
// 		$calender['id']=$row->id;
// 		$calender['title']=$row->title;
// 		$calender['start']=date('Y-m-d',strtotime($row->start_dt)).'T'.date('H:i:s',strtotime($row->start_dt)) ;	
// 		// $calender['start']=date('Y-m-d',strtotime($row->start_dt)) ;
// 		// $calender['end']=date('Y-m-d',strtotime($row->end_dt)) ;
//  		$calender['end']=date('Y-m-d',strtotime($row->end_dt)).'T'.date('H:i:s',strtotime($row->end_dt)) ;
// 		$calender['description']=$row->description;
// 	$test_arr[]=$calender;
// 	}

// 	// print_r($test_arr);

//     	 // return response()->json(array('status' => true, 'rows'=>$calender));
//     	 return response()->json($test_arr);

// }

// public function resize(Request $request)
// {
// 	$id=$request->get('id');

// 	$start_dt=$request->get('start_dt');
// 	$start_dt=str_replace('T', ' ', date('Y-m-d H:i:s',strtotime($start_dt))) ;
// 	$end_dt=$request->get('end_dt');
// 	$end_dt=str_replace('T', ' ', date('Y-m-d H:i:s',strtotime($end_dt))) ;
	
// 	$obj =Calender::find($id);
// 	$obj->start_dt=$start_dt;
// 	$obj->end_dt=$end_dt;
// 	$obj->save();

//     	 return response()->json(array('status' => true));


// }
// public function delete(Request $request)
// {
// 	$id=$request->get('id');
// 	$obj =Calender::find($id);
// 	$obj->delete();

//     	 return response()->json(array('status' => true));


// }


}