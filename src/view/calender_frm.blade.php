 	<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
							<h4 id="modalTitle" class="modal-title"></h4>
						</div>
						<div id="modalBody" class="modal-body">

						 <div class="form-group">
						 <input type="hidden" name=" _token" value="{{ csrf_token() }}">
						 
						 @if(isset($event))
						 <input type="hidden" name="id" value="{{ $event->id }}">


						<lable class="label">Title</lable> 
						 <input type="text" id="title" name="title" value="{{ $event->title }}"  class="form-control" required />
						 </div> 
						 <div class="form-group"><lable class="label">Start and End Date Time</lable> 
						 <input type="text" name="daterange" id="daterange" required value="
						  {{date("d/m/Y H:i A",strtotime($event->start_dt))}} - {{date("d/m/Y H:i A",strtotime($event->end_dt))}} " class="form-control" />
						 </div>
						 <div class="form-group">
						 <lable class="label">Description</lable> 
						 <textarea  name="description" id="description" class="form-control">{{$event->description}}</textarea>
						 </div>

						 @else

						 <lable class="label">Title</lable> 
						 <input type="text" id="title" name="title" value=""  class="form-control" required />
						 </div> 
						 <div class="form-group"><lable class="label">Start and End Date Time</lable> 
						 <input type="text" name="daterange" id="daterange" required value="
						  {{date("d/m/Y H:i A",strtotime($dt))}} - {{date("d/m/Y H:i A",strtotime($dt."+30 minutes"))}} " class="form-control" />
						 </div>
						 <div class="form-group">
						 <lable class="label">Description</lable> 
						 <textarea  name="description" id="description" class="form-control"/>
						 </div> 
						 
						 @endif
						  </div>
						<div class="modal-footer">
						 @if(isset($event))
							<button type="button" class="btn btn-danger pull-left" id="delete_btn" onclick="deleteEvent({{$event->id}})" >Remove</button>
							@endif
							<button type="submit" class="btn btn-success" id="submit_btn" >Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>