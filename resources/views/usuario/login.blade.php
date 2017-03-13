@extends('layouts.admin')

@section('content')

	
	@if(Auth::check())
		{!! Form::label('Bienvenido ') !!}
		{{ Auth::user()!= null ? Auth::user()->name : '' }}
	

	{!! Form::close() !!}
	@else

		<div class="row">
				<div class="col-sm-6 col-sm-offset-3 form-box">
			
						{!! Form::open(['route'=>'log.store','method'=>'POST','class'=>'form-signin']) !!}
							<h2 class="form-signin-heading">Inicio de sesión</h2>
							<div class="form-group">
								{!! Form::label('Correo: ',null,['class'=>'sr-only']) !!}
								{!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Ingrese el correo del usuario']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('password: ', null,['class'=>'sr-only']) !!}
								{!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese el password del usuario']) !!}
							</div>	

							{!! Form::submit('Iniciar',['class'=>'btn btn-lg btn-primary btn-block']) !!}
							
							{!! link_to('/usuario/create', $title = 'Registrarse', $attributes = [], $secure = null) !!}
						{!!Form::close()!!}

				</div>
		</div>

		<!--   -->
		

	@endif
	

@endsection


