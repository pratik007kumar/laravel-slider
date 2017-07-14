	<!DOCTYPE html>
	<html>
	<head>
		<meta charset='utf-8' />
		<link rel="stylesheet" href="{{ asset('vendor/pratik/slider/plugins/bootstrap/css/bootstrap.min.css') }}">

	</head>
	<body>
			
			<div class="container">
			<div class="well" style="margin:50px 0px;">
			<div class="row">
				
				
				<div class="col-md-6">
				<h3>All Sliders</h3>

				</div>
				<div class="col-md-6 text-right">
				<a href="{{ url(config('slider.slider_route_prefix').'/slider/create') }}" class="btn btn-info">Create New Slider</a>
				</div>
				
				<div class="col-md-12">
				@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							{{-- <th>Short Code</th> --}}
							<th>Slider Type</th>
							<th>Slides</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($sliders as $slider)
							<tr>
								<td>{{$slider->title}}</td>
								<td>{{$slider->slider_type==1?'Page Banner':'Image Slider'}}</td>
								<td>{{$slider->slides->count()}}</td>
								<td>
								<a href="{{url(config('slider.slider_route_prefix').'/slider/view/'.$slider->id)}}" class="btn btn-info"> View All</a>
								<a href="{{url(config('slider.slider_route_prefix').'/slider/delete/'.$slider->id)}}" class="btn btn-danger"> Delete</a>
								<a href="{{url(config('slider.slider_route_prefix').'/slider/preview/'.$slider->id)}}" class="btn btn-success"> Preview</a>
								</td>
							</tr>	
						@endforeach
					</tbody>
					</table>
				</div>
				
			</div>
			</div>
			</div>
			
		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
		 
	</body>


	</html>
