<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/colorbox.css') }}">
<style type="text/css">
	#cboxLoadedContent iframe{
		width: 100%;
		height: 100%;
	}
	#slides_div{border: 2px solid #ccc; min-height: 200px;}
	#slides_div>div{
		margin-top: 15px !important;
	}
	.images-div{
		/*margin: 2px;
		/*height:180px;
		
		width: 160px;
		background: #eee;
		float: left;
		text-align: center;*/
	}

	.images-div .images-thumg{
		/*padding: 2px;*/
		/*height:156px;*/
		/*border: px solid #ccc;*/
		/*width: 156px;*/
		float: left;
		background: #fff;
		text-align: center;
		width: 100%;
		height: 100%;
	}
	.images-div .images-thumg img{
		width: 100%;
		height: 100%;
	}
	.images-div .image-action{
		 
		text-align: right;
		position: absolute;
		z-index: 2;
		margin-right: 20px;
		margin-top: 5px;

		top: 0px;
		right: 0;
	}
</style>
</head>
<body>



	<div class="container">
 
			<div class="row">
				<div class="col-md-12">
					{{ Form::open(['url' => 'slider/store', 'data-toggle'=>"validator" ,'role'=>"form",'method'=>'post','class'=>'form-horizontal']) }}
				
					 <div class="form-group">
			        <div class="col-md-6">
			          {!! Form::label('Slider Title','Slider Title', ["class"=>"control-label"]) !!}
			          {{Form::text('title',Input::old('title'),['placeholder'=>"Slider Title" ,'class'=>"form-control",'id'=>'helpTitle','data-error'=>"Enter Slider Title", 'required'=>'required'])}}
			          <span class="text-danger" id="helpTitle">{{ $errors->first('title') }}</span>    
			        </div>
			        <div class="col-md-6">
			           {!! Form::label('Slider Type','Slider Type', ["class"=>"control-label"]) !!}
			          {{Form::select('slider_type',['1'=>'Page Banner','2'=>'Image Slider'],Input::old('slider_type'),['placeholder'=>"Slider Title" ,'class'=>"form-control",'id'=>'help_slider_type','data-error'=>"Enter Slider Title", 'required'=>'required'])}}
			          <span class="text-danger"  id="help_slider_type">{{ $errors->first('slider_type') }}</span>    
			          </div>
			        </div>			        		        
			        <div class="form-group">
			         <div class="col-md-6">
			         	<input type="hidden" id="feature_image" name="feature_image" value="">
						<a href="" class="btn btn-success popup_selector" id="elfinder_button" data-path="{{url('/')}}" data-inputid="feature_image"> + New Image</a>
			         </div>
			        </div>
			        <div class="form-group" id="slides_div">
			        <span class="text-danger" id="helpTitle">{{ $errors->first('slide') }}</span>    
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


	




	<script src="{{asset('vendor/pratik/slider/plugins/jquery.min.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/js/jquery.colorbox-min.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('/packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script> -->
	<script>
	var base_url="{{url('public')}}";
	function processSelectedFile(e,t){$("#"+t).val(e)
		// $('#slides_div').append('<div><img src="'+base_url+'/'+e+'"></div>');
		$('#slides_div').append('<div class=" col-md-3 "> <input type="hidden" name="slide[]" value="'+e+'">'
							+'<div class="images-div">'
							+'<div class="img">'
							+'<img src="'+base_url+'/'+e+'" class="img img-thumbnail" >'+
							'</div><div class="image-action"><a href="" class="btn btn-danger btn-sm"> X </a></div></div></div>');
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
		{href:r,fastIframe:true,iframe:true,width:"70%",height:"50%"}
		)

	})

	$('#feature_image').change(function(){
		
	});
 
// $('#feature_image').elfinder({
//             // set your elFinder options here
//             customData: {
//                 _token: '<?= csrf_token() ?>'
//             },
//             url: ' URL::action('Barryvdh\Elfinder\ElfinderController@showConnector') ?>',  // connector URL
//             dialog: {width: 900, modal: true, title: 'Select a file'},
//             resizable: false,
//             commandsOptions: {
//                 getfile: {
//                     oncomplete: 'destroy',
//                     folders  : true
//                 }
//             },
//             getFileCallback: function (file) {
//               //  window.parent.processSelectedFile(file.path, ' ');
//                 parent.jQuery.colorbox.close();
//             }
//         }).elfinder('instance');


	</script>
</body>


</html>
