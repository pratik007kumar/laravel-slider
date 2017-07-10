<?php
namespace Pratik\Slider\Controller;

use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Pratik\Slider\Requests\SliderRequest;
use Pratik\Slider\Model\Slider;
use Pratik\Slider\Model\Slides;
use Session;

class SliderController extends Controller
{

public  static $autoplaySpeed=[1000=>'1 sec',
                               1500=>'1.5 sec',
                               2000=>'2 sec',
                               2500=>'2.5 sec',
                               3000=>'3 sec',
                               3500=>'3.5 sec',
                               4000=>'4 sec',
                               4500=>'4.5 sec',
                               5000=>'5 sec',
                               6000=>'6 sec',
                               7000=>'7 sec',
                               8000=>'8 sec',
                               9000=>'9 sec',
                               10000=>'10 sec'];
public  static $slides=[1=>'1',
                        2=>'2',
                        3=>'3',
                        4=>'4',
                        5=>'5',
                        6=>'6',
                        7=>'7',
                        8=>'8',
                        9=>'9',
                        10=>'10',
                              ];

  public function index()
  {
    $sliders=Slider::all();
    return view('slider::index')->with('sliders',$sliders);
}
public function create(Request $request)
{ 
    return view('slider::slider_form')->with('autoplaySpeed',self::$autoplaySpeed)->with('slides',self::$slides);
}

public function store(SliderRequest $request)
{
    // echo '<pre>';
    // print_r($request->all());
    // exit;
    $id=$request->id;
    $title=$request->title;
    $slider_type=$request->slider_type;
    $settings=["slidesToShow" => $request->slidesToShow,
     "slidesToScroll" =>$request->slidesToScroll,
     "autoplay"=>$request->autoplay,
     "autoplaySpeed"=>$request->autoplaySpeed,
     "dots"=>$request->dots,
     "arrows"=>$request->arrows,
     "centerMode"=> $request->centerMode,
     "infinite"=> 'true'
     ];

    $slide=$request->slide;

    if($id==''){
       $obj =new Slider();
   }else{
       $obj =Slider::find($id);
   }
   $obj->title=$title;
   $obj->slider_type=$slider_type;
   $obj->settings=serialize($settings);

   if($obj->save()){
    //Delete all slides and add new
    $slides=Slides::where('slider_id','=',$obj->id)->delete();

    foreach ($slide as $key => $value) {
        $slidObj=new Slides();
        $slidObj->slider_id=$obj->id;
        $slidObj->title='';
        $slidObj->image=$value;
        $slidObj->status=1;
        $slidObj->save();
    }
    if($id==''){
      $msg="Save Successfully !";
  }else{
      $msg="Update Successfully !";
  }
  Session::flash('alert-class', 'alert-success'); 

}else{
  $msg="Something went wrong ! Please retry.";
  Session::flash('alert-class', 'alert-danger'); 
}
Session::flash ('message',$msg);

return redirect()->action('\Pratik\Slider\Controller\SliderController@index') ;


}
public function show($id)
{
    $slider=Slider::find($id);
    $slider->settings=unserialize($slider->settings);

    $slider->slidesToShow =$slider->settings['slidesToShow'];
    $slider->slidesToScroll=$slider->settings['slidesToScroll'];
    $slider->autoplay=$slider->settings['autoplay'];
    $slider->autoplaySpeed=$slider->settings['autoplaySpeed'];
    $slider->dots=$slider->settings['dots'];
    $slider->arrows=$slider->settings['arrows'];
    $slider->centerMode=$slider->settings['centerMode'];

   // echo '<pre>'; print_r($slider);exit;
    return view('slider::slider_form')
    ->with('slider',$slider)
    ->with('autoplaySpeed',self::$autoplaySpeed)
    ->with('slides',self::$slides)
    
    ;
    
}

public function delete($id)
{

    $obj =Slider::find($id);
    $slides=Slides::where('slider_id','=',$obj->id)->delete();
    $obj->delete();
    Session::flash('alert-class', 'alert-success'); 
    Session::flash('message','Delete Successfully.');
    return redirect()->action('\Pratik\Slider\Controller\SliderController@index') ;

}
public function preview($id)
{

   $slider=Slider::find($id);
   $slider->settings= unserialize($slider->settings);
   

   return view('slider::slider_preview')->with('slider',$slider);


}


}