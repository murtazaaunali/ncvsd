@extends('admin.layout.master')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
                <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" >Records Added Successfully</div>
                    
                    <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title">Volunteers Submitted Forms</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    </div>
                    
                    <form class="search-form formspace">
                        <div class="row">
                        <div class="col-md-3 col-sm-6">
                            
                            <div class="input-group space-bottom">
	                            <label>Name</label>
	                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Name" />
                            </div>

                            <div class="input-group pull-right" style="margin-top: 20px;">
                                <span class="input-group-btn">
                                	<button type="button" id="clear_search" class="btn waves-effect waves-light btn-custom" style="margin-right: 10px;">Clear Filter</button>
                                    <button type="button" id="searchbtn" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search m-r-5"></i> Search</button>
                                </span>
                            </div>
                        </div>


						<div class="col-sm-3">
							<div class="input-group space-bottom">
								<label>Year Attending Standown</label>
								<select class="form-control" name="attend_year">
									<option value="">Year Attending Standown</option>
								@foreach($years as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
								</select> 
							</div>

							<div class="input-group space-bottom">
								<label>Time Slot 2019</label>
								<select class="form-control" name="timeslot">
									<option>-- Select --</option>
									<option value="wednesdayam">Wednesday AM (2/6/2019) 7am-12pm</option>
									<option value="wednesdaypm">Wednesday PM (2/6/2019) 12pm-5pm</option>
									<option value="thursdayam">Thursday AM (2/7/2019) 7am-12pm </option>
									<option value="thursdaypm">Thursday PM ( 2/7/2019)12pm-5pm</option>
									<option value="fridayam">Friday AM (2/8/2019) 7am-12pm</option>
									<option value="fridaypm">Friday PM (2/8/2019) 12pm-5pm</option>
									<option value="saturdayam">Saturday AM (2/9/2019) 7am-12pm</option>
									<option value="saturdaypm">Saturday PM (2/9/2019) 12pm-5pm</option>
									<option value="sundayam">Sunday AM (2/10/2019) 7am-12pm</option>
								</select> 
							</div>

                        </div>

                    	<div class="col-sm-3">
	                		<h4 class="filter_veteran_head">Are you a Veteran:</h4>
	                		<div class="input-group">
	                			<label><input type="radio" name="veteran" value="Veteran"/> Veteran</label>
	                		</div>
	                		<div class="input-group">
	                			<label><input type="radio" name="veteran" value="Veteran family member"/> Veteran family member</label>
	                		</div>
	                		<div class="input-group">
	                			<label><input type="radio" name="veteran" value="Active duty"/> Active duty</label>
	                		</div>
	                		<div class="input-group">
	                			<label><input type="radio" name="veteran" value="Active duty family member"/> Active duty family member</label>
	                		</div>
                    	</div>
                        </div><!--row-->
                        
                    </form>
                    
                </div>
                </div><!--row-->

                @if(Session::has('success'))
                	{!! Session('success') !!}
                @endif
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <!--<button type="button" class="btn btn-success waves-effect w-md waves-light pull-right add-employee-btn" data-toggle="modal" data-target="#con-close-modal">Add Employer</button>-->

                            <table id="volunteerlist" class="table table-striped dataTable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%" valign="middle"></th>
                                        <th width="16%" valign="middle">Name</th>
                                        <th width="14%" valign="middle">Phone</th>
                                        <th width="14%" valign="middle">Email</th>
                                        <th width="15%" valign="middle" style="display:none;">Availability</th>
                                        <th width="15%" valign="middle">Year Registered for Standdown</th>
                                        <th width="15%" valign="middle" class="text-center">View Details / Download PDF</th>
                                        <th style="display:none;" width="15%">First Name</th>
                                        <th style="display:none;" width="15%">Middle Name</th>
                                        <th style="display:none;" width="15%">Last Name</th>
                                        <th style="display:none;" width="15%">Phone</th>
                                        <th style="display:none;" width="15%">Emails</th>
                                        <th style="display:none;" width="15%">Occupation</th>
                                        <th style="display:none;" width="15%">Active Duty Military</th>
                                        <th style="display:none;" width="15%">Individual Group</th>
                                        <th style="display:none;" width="15%">Group Name</th>
                                        <th style="display:none;" width="15%">Group Participants</th>
                                        <th style="display:none;" width="15%">Wednesday Am</th>
                                        <th style="display:none;" width="15%">Wednesday Pm</th>
                                        <th style="display:none;" width="15%">Thursday Am</th>
                                        <th style="display:none;" width="15%">Thursday  Pm</th>
                                        <th style="display:none;" width="15%">Friday  Am</th>
                                        <th style="display:none;" width="15%">Friday Pm</th>
                                        <th style="display:none;" width="15%">Saturday Am</th>
                                        <th style="display:none;" width="15%">Saturday Pm</th>
                                        <th style="display:none;" width="15%">Sunday Am</th>
                                        <th style="display:none;" width="15%">Sunday Pm</th>
                                        <th style="display:none;" width="15%">Wednesday (1/24/18) 12pm-4pm</th>
                                        <th style="display:none;" width="15%">Comments</th>
                                        <th style="display:none;" width="15%">May We Contact</th>
                                        <th style="display:none;" width="15%">Emergency Name</th>
                                        <th style="display:none;" width="15%">Emergency number</th>
                                        <th style="display:none;" width="15%">Medical Information</th>
                                        <th style="display:none;" width="15%">Full Name</th>
                                        <th style="display:none;" width="15%">Address</th>
                                        <th style="display:none;" width="15%">Agree</th>
                                        <th style="display:none;" width="15%">Timestamp</th>
                                        
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('footer')
<script type="text/javascript" src='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js'></script>
<script>
	$('.formspace input[type=text]').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	        //alert('You pressed a "enter" key in textbox'); 
	        $('#searchbtn').click();
	    }
	});
	
    var table = $('#volunteerlist').DataTable({
        processing: true,
        serverSide: true,
		//"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
        ajax: '{!! route('volunteerlist') !!}',
       columns: [
        	{ data: 'id', name: 'id', searchable: true },
        	{ data: 'fullname', name: 'fullname', searchable: true },
        	{ data: 'phone', name: 'phone', searchable: true },
        	{ data: 'email', name: 'email', searchable: true },
        	{ data: 'created_at', name: 'created_at', searchable: true, visible:false },
        	{ data: 'attended_year', name: 'attended_year', searchable: true },
			{ data: 'action', name: 'action', searchable: true, orderable: false },
		    { data: 'firstname', name: 'firstname', searchable: true, visible:false},
			{ data: 'middlename', name: 'middlename', searchable: true, visible:false},
			{ data: 'lastname', name: 'lastname', searchable: true, visible:false},
			{ data: 'phone', name: 'lastname', searchable: true, visible:false},
			{ data: 'email', name: 'email', searchable: true, visible:false},
			{ data: 'occupation', name: 'occupation', searchable: true, visible:false},
			{ data: 'activedutymilitary', name: 'activedutymilitary', searchable: true, visible:false},
			{ data: 'individual_group', name: 'individual_group', searchable: true, visible:false},
			{ data: 'group_name', name: 'group_name', searchable: true, visible:false},
			{ data: 'group_participants', name: 'group_participants', searchable: true, visible:false},
			{ data: 'wednesdayam', name: 'wednesdayam', searchable: true, visible:false},
			{ data: 'wednesdaypm', name: 'wednesdaypm', searchable: true, visible:false},
			{ data: 'thursdayam', name: 'thursdayam', searchable: true, visible:false},
			{ data: 'thursdaypm', name: 'thursdaypm', searchable: true, visible:false},
			{ data: 'fridayam', name: 'fridayam', searchable: true, visible:false},
			{ data: 'fridaypm', name: 'fridaypm', searchable: true, visible:false},
			{ data: 'saturdayam', name: 'saturdayam', searchable: true, visible:false},
			{ data: 'saturdaypm', name: 'saturdaypm', searchable: true, visible:false},
			{ data: 'sundayam', name: 'sundayam', searchable: true, visible:false},
			{ data: 'sundaypm', name: 'sundaypm', searchable: true, visible:false},
			{ data: 'comments', name: 'comments', searchable: true, visible:false},
			{ data: 'wednesday', name: 'wednesday', searchable: true, visible:false},
			{ data: 'maywecontact', name: 'maywecontact', searchable: true, visible:false},
			{ data: 'emergencycname', name: 'emergencycname', searchable: true, visible:false},
			{ data: 'emergencycnumber', name: 'emergencycnumber', searchable: true, visible:false},
			{ data: 'medicalinformation', name: 'medicalinformation', searchable: true, visible:false},
			{ data: 'fullname', name: 'fullname', searchable: true, visible:false},
			{ data: 'address', name: 'address', searchable: true, visible:false},
			{ data: 'agree', name: 'agree', searchable: true, visible:false},
			{ data: 'created_at', name: 'timestamp', searchable: true, visible:false },
			{ data: 'demographic_id', name: 'demographic_id', searchable: true, visible:false },
			{ data: 'activedutymilitary', name: 'activedutymilitary', searchable: true, visible:false },
			{ data: 'timeslot', name: 'timeslot', searchable: true, visible:false },
			
			/*{ data : function(data){
            	return data.created_at;
            }, "orderable": false, "searchable":true, "name":"signup_date", visible:false }*/
            ],
            "order": [[ 37, 'desc' ]],
			"createdRow": function ( row, data, index ) {
	            $('td', row).eq(5).addClass('text-center');
	        },
            'columnDefs': [
                 {
                    'targets': 0,
                    'checkboxes': {
                       'selectRow': true
                    }
                 }
              ],
              'select': {
			     'style': 'multi',
			     selector: 'td:first-child'
              },
        dom: 'Blfrtip',
		lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
                {
    	            extend: 'csv',
    	            text: 'Export All',
					exportOptions: {
                       columns: [36,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35] //Your Colume value those you want
                    }
    	        },
    	        {
					extend: 'csv',
					text: 'Export Selected',
					exportOptions: {
						rows: { selected: true },
                       columns: [36,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35] //Your Colume value those you want
                    }
				}
            ],
        });


   
    $('#searchbtn').on( 'click', function () {
        table.columns(1).search( $('#firstname').val() ).draw();
        table.columns(38).search( $('input[name=veteran]:checked').val() ).draw();
        table.columns(39).search( $('select[name=timeslot]').val() ).draw();
        table.columns(5).search( $('select[name=attend_year]').val() ).draw();
    });

    $('#clear_search').on('click',function(){
    	$('.search-form').trigger("reset");
    	$('input[name=veteran]').prop('checked', false);
    	var radioVal = '';
        table.columns(1).search( $('#firstname').val() ).draw();
        table.columns(38).search( radioVal ).draw();
        table.columns(39).search( $('select[name=timeslot]').val() ).draw();
        table.columns(5).search( $('select[name=attend_year]').val() ).draw();
    });

	function deletevolunteer(id){
		if(confirm('Are you sure to want delete this record ?')){
			document.location.href = 'deletevolunteer/'+id;
		}
	}
    
    </script>
@endsection