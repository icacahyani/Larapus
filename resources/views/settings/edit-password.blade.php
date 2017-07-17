<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	{!! Form::label('password', 'Password lama', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::password('password', ['class'=>'form-control']) !!}
		{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
	{!! Form::label('new_password', 'Password baru', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::password('new_password', ['class'=>'form-control']) !!}
		{!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error': '' }}">
	{!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['class'=>'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
		{!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>