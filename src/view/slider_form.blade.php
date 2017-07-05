<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/colorbox.css') }}">

</head>
<body>



	<div class="container">
 
			<div class="row">
				<div class="col-md-12">
					{{ Form::open(['url' => 'slider/store', 'data-toggle'=>"validator" ,'role'=>"form",'method'=>'post','class'=>'form-horizontal']) }}
				
					 <div class="form-group">
			        <div class="col-md-12">
			          {!! Form::label('Slider Title','Slider Title', ["class"=>"control-label"]) !!}
			          {{Form::text('title',Input::old('title'),['placeholder'=>"Slider Title" ,'class'=>"form-control",'id'=>'helpTitle','data-error'=>"Enter Slider Title", 'required'=>'required'])}}
			          <span class="text-danger" id="helpTitle">{{ $errors->first('title') }}</span>    
			        </div>
			        </div>
			        		        
			        <div class="form-group">
			         <div class="col-md-6">
			         <label for="feature_image">Feature Image</label>
						<input type="text" id="feature_image" name="feature_image" value="">
						<a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
			         </div>
			         <div class="col-md-6">
			           {!! Form::label('Slider Type','Slider Type', ["class"=>"control-label"]) !!}
			          {{Form::select('slider_type',['1'=>'Page Banner','2'=>'Image Slider'],Input::old('slider_type'),['placeholder'=>"Slider Title" ,'class'=>"form-control",'id'=>'help_slider_type','data-error'=>"Enter Slider Title", 'required'=>'required'])}}
			          <span class="text-danger"  id="help_slider_type">{{ $errors->first('slider_type') }}</span>    
			          </div>
			        </div>
					{{Form::close()}}
				</div>
		</div>
	</div>


	




	<script src="{{asset('vendor/pratik/slider/plugins/jquery.min.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/js/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
	<script>





	</script>
</body>


</html>
