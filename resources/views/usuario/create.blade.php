@extends('layouts.admin')

@section('content')

	{!!Form::open()!!}

				
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

		@include('usuario.forms.user')
			
		{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registroUsuario', 'class'=>'btn btn-primary'], $secure = null)!!}
	{!! Form::close() !!}
	
@endsection


