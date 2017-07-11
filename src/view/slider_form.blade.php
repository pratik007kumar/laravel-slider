<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/colorbox/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/css/style.css') }}">
<style type="text/css">
	
</style>
</head>
<body>
	<div class="container">
 
			<div class="row">
				<div class="col-md-12">
				@if(isset($slider))
					{{ Form::model($slider,['url' => 'slider/store', 'data-toggle'=>"validator" ,'role'=>"form",'method'=>'post','class'=>'form-horizontal']) }}
					<input type="hidden" name="id" value="{{$slider->id}}">
				@else
					{{ Form::open(['url' => 'slider/store', 'data-toggle'=>"validator" ,'role'=>"form",'method'=>'post','class'=>'form-horizontal']) }}
				@endif
					 <div class="form-group">
			        <div class="col-md-6">
			          {!! Form::label('Slider Title','Slider Title', ["class"=>"control-label"]) !!}
			          {{Form::text('title',Input::old('title'),['placeholder'=>"Slider Title" ,'class'=>"form-control",'id'=>'helpTitle','data-error'=>"Enter Slider Title", 'required'=>'required'])}}
			          <span class="text-danger" id="helpTitle">{{ $errors->first('title') }}</span>    
			        </div>
			        <div class="col-md-6">
			           {!! Form::label('Slider Type','Slider Type', ["class"=>"control-label"]) !!}
			          {{Form::select('slider_type',[1=>'Page Banner',2=>'Image Slider'],Input::old('slider_type'),['class'=>"form-control",'id'=>'help_slider_type','data-error'=>"Enter Slider Type", 'required'=>'required'])}}
			          <span class="text-danger"  id="help_slider_type">{{ $errors->first('slider_type') }}</span>    
			          </div>
			        </div>			        		        
			        <div class="form-group">
			        <div class="col-md-2">
			        {!! Form::label('slidesToShow','Slides To Show', ["class"=>"control-label"]) !!}
			         	{{Form::select('slidesToShow',$slides,Input::old('centerMode'),['class'=>"form-control",'required'=>'required'])}}
			         </div> 
			         <div class="col-md-2">
			        {!! Form::label('slidesToScroll','Slides To Scroll', ["class"=>"control-label"]) !!}
			         	{{Form::select('slidesToScroll',$slides,Input::old('slidesToScroll'),['class'=>"form-control",'required'=>'required'])}}
			         </div>
			        <div class="col-md-2">
			        {!! Form::label('Auto Play','Auto Play', ["class"=>"control-label"]) !!}
			         	{{Form::select('autoplay',['true'=>'On','false'=>'Off'],Input::old('auto_play'),['class'=>"form-control",'required'=>'required'])}}
			         </div> 
			         
			         <div class="col-md-2">
			        	{!! Form::label('Auto Play Speed','Auto Play Speed', ["class"=>"control-label"]) !!}
			         	{{Form::select('autoplaySpeed',$autoplaySpeed,Input::old('autoplaySpeed'),['class'=>"form-control",'required'=>'required'])}}
			         </div>
			         
			          
			         </div> 
			        <div class="form-group">
			         <div class="col-md-2">
			        {!! Form::label('dots','Dots', ["class"=>"control-label"]) !!}
			         	{{Form::select('dots',['true'=>'On','false'=>'Off'],Input::old('dots'),['class'=>"form-control",'required'=>'required'])}}
			         </div> 
			         <div class="col-md-2">
			        {!! Form::label('Arrows','Arrows', ["class"=>"control-label"]) !!}
			         	{{Form::select('arrows',['true'=>'On','false'=>'Off'],Input::old('arrows'),['class'=>"form-control",'required'=>'required'])}}
			         </div> 
			         <div class="col-md-2">
			        {!! Form::label('CenterMode','Center Mode', ["class"=>"control-label"]) !!}
			         	{{Form::select('centerMode',['true'=>'On','false'=>'Off'],Input::old('centerMode'),['class'=>"form-control",'required'=>'required'])}}
			         </div> 
			        </div>	
			        
			        <div class="form-group">
			         <div class="col-md-6">
			         	<input type="hidden" id="feature_image" name="feature_image" value="">
						<a href="" class="btn btn-success popup_selector" id="elfinder_button" data-path="{{url('/')}}" data-inputid="feature_image"> + New Image</a>
						<span class="text-danger" id="helpTitle">{{ $errors->first('slide') }}</span> 
			         </div>
			        </div>
			        <div class="form-group" id="slides_div">
			           

			        @if(isset($slider))
			        @foreach($slider->slides as $slide)
			        <div class=" col-md-3 "> 
			        <input type="hidden" name="slide[]" value="{{$slide->image}}">
					<div class="images-div">
					<div class="img">
					<img src="{{asset($slide->image)}}" class="img img-thumbnail" ></div>
					<div class="image-action" onclick="removeImage(this)"><a class="btn btn-danger btn-sm"> X </a></div></div></div>
			        @endforeach
			        @endif
			        </div>
					 <div class="form-group">
					 <div class="col-md-2 pull-right text-right">
					 	<button class="btn btn-success" type="submit"> Save</button>
					 </div>
					 </div>
					{{Form::close()}}
				</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('/packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script> -->
	<script>
	var base_url="{{asset('/')}}";
	function processSelectedFile(e,t){$("#"+t).val(e)
		// $('#slides_div').append('<div><img src="'+base_url+'/'+e+'"></div>');
		$('#slides_div').append('<div class=" col-md-3 "> <input type="hidden" name="slide[]" value="'+e+'">'
							+'<div class="images-div">'
							+'<div class="img">'
							+'<img src="'+base_url+'/'+e+'" class="img img-thumbnail" >'+
							'</div><div class="image-action" onclick="removeImage(this)"><a  class="btn btn-danger btn-sm"> X </a></div></div></div>');
}
	$(document).on("click",".popup_selector",function(e){
	e.preventDefault();
	var t=$(this).attr("data-inputid");
	var n="/elfinder/popup/";
	var path=$(this).attr("data-path");
	if(path!=''){
	 n=path+n;
	}
	
	var r=n+t;
	$.colorbox(
		{href:r,fastIframe:true,iframe:true,width:"70%",height:"75%"}
		)

	})

	function removeImage(id){

		$(id).parent().parent().remove();

	}
	 

	</script>
</body>


</html>
