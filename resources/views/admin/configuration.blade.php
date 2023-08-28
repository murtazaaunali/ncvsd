@extends('admin.layout.master')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">

	             @if(Session::has('updateConfiguration'))
	             	{!! session('updateConfiguration') !!}
	             @endif
                
                <div class="row">

                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title">Configuration Settings</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                     
				</div>                     
                     		
                     <form class="formspace" method="POST" action="{{ route('updateconfiguraiton') }}">
                        {{ csrf_field() }}

                     <div class="row">
                     	<div class="col-sm-6">
                        <div class="form-group{{ $errors->has('volemails') ? ' has-error' : '' }}">
                            <label for="volemails" class="control-label">Recipients Volunteer Emails (Comma Seperated Email)</label>
                            <textarea id="volemails" class="form-control" name="volemails" required autofocus>{{ $volemails }}</textarea>

                            @if ($errors->has('volemails'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('volemails') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('vetemails') ? ' has-error' : '' }}">
                            <label for="vetemails" class="control-label">Recipients Veteran Emails (Comma Seperated Email)</label>
                            <textarea id="vetemails" class="form-control" name="vetemails" required>{{ $vetemails }}</textarea>

                            @if ($errors->has('vetemails'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vetemails') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        </div>
                	</div>


                     <div class="row">
                     	<div class="col-sm-6">
	                        <div class="form-group{{ $errors->has('volemailsender') ? ' has-error' : '' }}">
	                            <label for="volemailsender" class="control-label">Volunteer Email Forms Sender</label>
	                            <input type="email" class="form-control" name="volemailsender" value="{{ $volemailsender }}" required>

	                            @if ($errors->has('volemailsender'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('volemailsender') }}</strong>
	                                </span>
	                            @endif
	                        </div>
                        </div>
                        
                        <div class="col-sm-6">
	                        <div class="form-group">
	                            <label for="vetemailsender" class="control-label">Veteran Email Forms Sender</label>
	                            <input id="vetemailsender" type="email" class="form-control" value="{{ $vetemailsender }}" name="vetemailsender" required>
	                            @if ($errors->has('vetemailsender'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('vetemailsender') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
                    </div>


                     <div class="row">
                     	<div class="col-sm-6">
	                        <div class="form-group{{ $errors->has('volemailsender') ? ' has-error' : '' }}">
	                            <label for="volemailsender" class="control-label">Volunteer Email Subject</label>
	                            <input type="text" class="form-control" name="volemailsubject" value="{{ $volemailsubject }}" required>

	                            @if ($errors->has('volemailsubject'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('volemailsubject') }}</strong>
	                                </span>
	                            @endif
	                        </div>
                        </div>
                        
                        <div class="col-sm-6">
	                        <div class="form-group">
	                            <label for="vetemailsender" class="control-label">Veteran Email Subject</label>
	                            <input id="vetemailsender" type="text" class="form-control" value="{{ $vetemailsubject }}" name="vetemailsubject" required>
	                            @if ($errors->has('vetemailsubject'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('vetemailsubject') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
                    </div>


	                     <div class="row">

	                     	<div class="col-sm-6">
		                        <div class="form-group{{ $errors->has('systemesendername') ? ' has-error' : '' }}">
		                            <label for="systemesendername" class="control-label">System Email Sender Name</label>
		                            <input type="text" class="form-control" name="systemesendername" value="{{ $systemesendername }}" required>

		                            @if ($errors->has('systemesendername'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('systemesendername') }}</strong>
		                                </span>
		                            @endif
		                        </div>
	                        </div>

	                     	<div class="col-sm-6">
		                        <div class="form-group{{ $errors->has('systemesenderemail') ? ' has-error' : '' }}">
		                            <label for="systemesenderemail" class="control-label">System Email Sender</label>
		                            <input type="email" class="form-control" name="systemesenderemail" value="{{ $systemesenderemail }}" required>

		                            @if ($errors->has('systemesenderemail'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('systemesenderemail') }}</strong>
		                                </span>
		                            @endif
		                        </div>
	                        </div>
	                     </div>   

	                     <div class="row">
	                     	<div class="col-sm-6">
	                     		<div class="form-group">
	                     			<label>Google Analytics</label>
	                     			<textarea class="form-control" name="analytics" rows="9">{{ $analytics }}</textarea>
		                            @if ($errors->has('systemesenderemail'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('systemesenderemail') }}</strong>
		                                </span>
		                            @endif
	                     		</div>
	                     	</div>
	                     </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>

                    </form>
                    

                    
                
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
   
    
</script>
@endsection