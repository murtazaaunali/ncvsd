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
                    <div class="alert alert-success" style="display:none;margin-top:10px;" >Records Added Successfully</div>
                    
                    <div class="row">
	                    <div class="col-xs-12">
	                        <div class="page-title-box inner-page">
	                            <h4 class="page-title">Users</h4>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
                    </div>
                    
                     @if(session()->has('message'))
	                	<div class="alert alert-success alert-dismissible fade in" role="alert">
		                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                	{{ session()->get('message') }}
		                </div>
					@endif
					
					@if(session()->has('errormessage'))
	                	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                	{{ session()->get('errormessage') }}
		                </div>
					@endif


                    <form class="search-form formspace">
                        <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" />
                        </div>
                        
                        <div class="col-md-3 col-sm-6">
                            <input type="text" class="form-control signup_email" name="signup_email" placeholder="Email" id="signup_email">
                        </div>
                        <div class="col-md-3 col-md-offset-3 col-sm-6">
                            <div class="input-group pull-right text-right">
                                <a href="javascript:;" id="clear_search" class="m-t-10" style="display: inline-block; margin-right: 10px;">Clear Filter</a>
                                <span class="input-group-btn">
                                    <button type="button" id="searchbtn" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search m-r-5"></i> Search</button>
                                </span>
                            </div>
                        </div>
                        </div>
                    </form>


					@if (Session::has('success'))
						{!! session('success') !!}
					@endif
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive table-box datatable-box">
                            <!--<button type="button" class="btn btn-success waves-effect w-md waves-light pull-right add-employee-btn" data-toggle="modal" data-target="#con-close-modal">Add Employer</button>-->

                            <table id="userslist" class="datatable table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="12%">ID</th>
                                        <th width="16%">Full Name</th>
                                        <th width="16%">Email Address</th>
                                        <th width="16%">User Type</th>
                                        <th width="14%">SignUp/Creation Date</th>
                                        <!--<th width="15%">Subscription Status</th>-->
                                        <th width="15%">Action</th>
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
<script>
	function deleteuser(id){
		if(confirm('Are you sure to want delete user ?')){
			document.location.href = 'deleteuser/'+id;
		}
	}

	$('.formspace input[type=text], .formspace input[type=email]').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	        $('#searchbtn').click();
	    }
	});

    var table = $('#userslist').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('userslist') !!}',
        columns: [
        	{ data: 'id', name: 'id', searchable: true },
        	{ data: 'fullname', name: 'fullname', searchable: true },
        	{ data: 'email', name: 'email', searchable: true, orderable: false },
        	{ data: 'user_type', name: 'usertype', searchable: false },
        	{ data: 'signup_on', name: 'signup_on', searchable: false },
        	//{ data: 'created_at', name: 'created_at', searchable: true },
        	{ data: 'action', name: 'action', searchable: false, orderable: false },
        	{ data: 'singup_from', name: 'singup_from', searchable: true, visible:false },
        	{ data: 'singup_to', name: 'singup_to', searchable: true, visible:false },
        	/*{ data : function(data){
            	return data.created_at;
            }, "orderable": false, "searchable":true, "name":"signup_date", visible:false }*/
        ]
    });
    
    $('#searchbtn').on( 'click', function () {
        table.columns(1).search( $('#fullname').val() ).draw();
        table.columns(2).search( $('#signup_email').val() ).draw();
    });

    $('#clear_search').on('click',function(){
        $('#fullname').val("");
        $('.signup_start').val("");
        $('.signup_email').val("");
        table.columns(1).search( $('#fullname').val() ).draw();
        table.columns(2).search( $('#signup_email').val() ).draw();
    });
    
    </script>
@endsection