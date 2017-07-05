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
			<div class="col-md-6">
			<a href="{{ url('slider/create') }}" class="btn btn-info">Create New Slider</a>
			</div>
			
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						{{-- <th>Short Code</th> --}}
						<th>Slides</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sliders as $slider)
						<tr>
							<td>{{$slider->name}}</td>
							<td>number of slides</td>
							<td><a href="{{url('slider/'.$slider->id)}}" class="btn btn-info"> View All</td>
						</tr>	
					@endforeach
				</tbody>
				</table>
			</div>
			
		</div>
		</div>
		</div>
		
	 
	




	<script src="{{asset('vendor/pratik/slider/plugins/jquery.min.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('vendor/pratik/slider/plugins/bootstrap/js/bootstrap-tooltip.js')}}"></script>

	<script>


		$(document).ready(function() {
			$.ajaxSetup(
			{
				headers:
				{
					'X-CSRF-Token': $('input[name="_token"]').val()
				}
			});

			{{--
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'timelineYear,listYear,month,agendaWeek,agendaDay'
					// prevYear, nextYear,listMonth,
				}, 
				buttonText: {
            listYear: "year",
        	},
	        viewDisplay: function(view) {
	        },
				timezone: 'Asia/Kolkata',
				defaultDate: '{{date("Y-m-d")}}',
				editable: true,
				weekends:false,
			eventLimit: true, // allow "more" link when too many events
			events: function(start, end, timezone, callback) {
				$.ajax({
					url: '{{url('/calender/getcalender')}}',
					dataType: 'json',
					data: {
		                // our hypothetical feed requires UNIX timestamps
		                start: start.unix(),
		                end: end.unix()
		            },
		            success: function(obj) {
		            	var events = [];
		            	$.each(obj, function(index, value) {
		            		events.push({
		            			id: value['id'],
		            			start: value['start'],
		            			title: value['title'],
		            			end: value['end'],
		            			description: value['description'],
			              //all data
			          });
			            // console.log(value)
			        });
		            	callback(events);

		            }
		        });
			}
			,
			eventRender: function(event, element) {
		 //      $(element).tooltip({title: event.title});       
		 // element.find("div.fc-content").prepend("<i class='pull-right' onclick='deleteEvent("+event.id+")'>X</i>");      
		},
		 // eventClick: function(data, event, view) {
   //         alert(data.start);
   //      },
   eventClick:  function(event, jsEvent, view) {
	   	// $('#modalTitle').html(event.title);
	   	// $('#modalBody').html(event.description);
	   	// $('#eventUrl').attr('href',event.url);
	   	// $('#calendarModal').modal();

	   	$('#modalTitle').html('Update Event ');
	   	$.ajax({
	   		method: "POST",
	   		url: "{{url('/calender/getfrm')}}",
	   		data:{
	   			_token: "{{ csrf_token() }}",
	   			id:event.id
	   		}
	   	}).done(function( data ) {

	   		if(data.status == 1){

	   			$('#calender_frm').html(data.frm);
		            // $('#eventUrl').attr('href',event.url);
		            $('input[name="daterange"]').daterangepicker({
		            	timePicker: true,
		            	timePickerIncrement: 30,
		            	locale: {
		            		format: 'DD/MM/YYYY h:mm A'
		            	}
		            });
		            $('#calendarModal').modal();

		        }else{
		        	alert(data.message);
	            //$('.error-favourite-message').html(msg.message);
	        }
	    });
	   },

	   dayClick:  function(date,event, jsEvent, view) {

	//    				alert(date);
	//    				alert(convert(date));

 //   // dt=date.toString(); 
 date_o=  new Date(date)
 // alert(date.getTime());
 dt=date.toString("Y/m/d hh:mm.ss");
// alert(dt);


$('#modalTitle').html('New Event Form');
$.ajax({
	method: "POST",
	url: "{{url('/calender/getfrm')}}",
	data:{
		_token: "{{ csrf_token() }}",
		cal_date:dt,
		dat:date_o.getFullYear()+"-"+(date_o.getMonth()+1)+"-"+date_o.getDate(),
	        	  // tm:date.getTime()
	        	}
	        }).done(function( data ) {

	        	if(data.status == 1){

	        		$('#calender_frm').html(data.frm);
			            // $('#eventUrl').attr('href',event.url);
			            $('input[name="daterange"]').daterangepicker({
			            	timePicker: true,
			            	timePickerIncrement: 30,
			            	locale: {
			            		format: 'DD/MM/YYYY h:mm A'
			            	}
			            });
			            $('#calendarModal').modal();

			        }else{
			        	alert(data.message);
	            //$('.error-favourite-message').html(msg.message);
	        }
	    });
	    },
	    eventResize: function(event, delta, revertFunc) {

        // alert(event.title +event.start.format()+ " end is now " + event.end.format());

        // if (confirm("is this okay?")) {
        	$.ajax({
        		method: "POST",
        		url: "{{url('/calender/resize')}}",
        		data:{
        			_token: "{{ csrf_token() }}",
        			id:event.id,
        			start_dt:event.start.format(),
        			end_dt:event.end.format(),
				        	  // tm:date.getTime()
				        	},
				        	success: function (data) {
				        		if(data.status){
				        			$('#calendar').fullCalendar( 'refetchEvents' )

				        		} 
				        	}
				        });
        // }

    },
    eventDrop: function(event, delta, revertFunc) {

        // alert(event.title + " was dropped on " + event.start.format()+' to '+event.end.format());

        $.ajax({
        	method: "POST",
        	url: "{{url('/calender/resize')}}",
        	data:{
        		_token: "{{ csrf_token() }}",
        		id:event.id,
        		start_dt:event.start.format(),
        		end_dt:event.end.format(),
				        	  // tm:date.getTime()
				        	},
				        	success: function (data) {
				        		if(data.status){
				        			$('#calendar').fullCalendar( 'refetchEvents' )

				        		} 
				        	}
				        });

    }
});


$("#calender_frm").validate({
	rules: {
		title: {
			required: true,
		},
		daterange: {
			required: true,
		},          

	},
	messages: {
		title: {
			required: "Please enter Todo Title",
		},
		daterange: {
			required: "Please enter Select Date and Time",
		},          

	},
	submitHandler: function(form) {
		$.ajax({
			method: "POST",
			url: "{{url('/calender/save')}}",
			data:$(form).serialize(),
			success: function (data) {
				if(data.status){
					alert(data.msg);
								 	// make_calender();
								 	$('#calendar').fullCalendar( 'refetchEvents' )
								 	$('#calendarModal').modal('hide');
									// make_calender();
								}else{
									alert(data.msg);

								}
							}
						});



	},
});
--}}

});

function deleteEvent(id) {
	
	if(confirm("Do you want to Delete event")){
		$.ajax({
			method: "POST",
			url: "{{url('/calender/delete')}}",
			data:{_token: "{{ csrf_token() }}",id:id},
			success: function (data) {
				if(data.status){
					// alert(data.msg);
					 	// make_calender();
					 	$('#calendar').fullCalendar( 'refetchEvents' )
					 	$('#calendarModal').modal('hide');
						// make_calender();
					}else{
						alert(data.msg);

					}
				}
			});



	}


}



</script>
</body>


</html>
