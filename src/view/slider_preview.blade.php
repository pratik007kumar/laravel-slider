<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/bootstrap.min.css') }}">
	 <link rel="stylesheet" type="text/css" href="{{ asset('vendor/pratik/slider/plugins/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/pratik/slider/plugins/slick/slick-theme.css') }}">
	<style type="text/css">
		 .image-text{
		 	position: absolute;
			top: 0;			 
			height: 100%;
		 }
	</style>
	</head>
	<body>
	<div class="container">
 
			<div class="row" style="margin: 10px 0px">
				<div class="col-md-12">
				 <a href="{{ url('slider/view/'.$slider->id) }}" class="btn btn-success pull-left" ><< Back </a>
				 <a href="{{ url('slider') }}" class="btn btn-success pull-right" > All Slider </a>
				</div>
	
			</div>
	<section class="regular slider">
	@foreach($slider->slides as $slide)
    <div>
      <img src="{{url('public/'.$slide->image)}}" style="width:100%;" >
      {{-- <div class="image-text"> the some text</div> --}}
    </div>
    @endforeach
   {{--  <div>
      <img src="http://placehold.it/350x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=6">
    </div> --}}
  </section>
  	</div>

	{{-- <script src="{{asset('vendor/pratik/slider/plugins/jquery.min.js')}}"></script> --}}

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/slick/slick.js')}}" ></script>
	<script type="text/javascript">
	    $(document).on('ready', function() {
	    	 
	      $(".regular").slick(
	      	{!! str_replace('"','',json_encode($slider->settings))!!}
	      	  
	      );
	      });
	      

	    // $(".regular").slick({
	    //   	  autoplay:true,
		   //    autoplaySpeed:1500,
			  // arrows:true,
			  // prevArrow:'<button type="button" class="slick-prev"></button>',
			  // nextArrow:'<button type="button" class="slick-next"></button>',
			  // centerMode:true,
		   //    dots: true,
		   //    infinite: true,
		   //    slidesToShow: 2,
		   //    slidesToScroll: 1
	    //   });
	  </script>
	 
</body>


</html>
