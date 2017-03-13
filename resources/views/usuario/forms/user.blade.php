<div class="form-group">
	{!! Form::label('Nombre: ') !!}
	{!! Form::text('name', null, ['id'=>'name','class'=>'form-control','placeholder'=>'Ingrese el nombre del usuario']) !!}
</div>

@if(Auth::check())
    @if(Auth::user()->type=='A')
		<div class="form-group">
			{!! Form::label('Correo: ') !!}
			{!! Form::text('email', null, ['id'=>'email','class'=>'form-control','placeholder'=>'Ingrese el Correo del usuario']) !!}
		</div>
	@else
		<div class="form-group">
			{!! Form::label('Correo: ') !!}
			{!! Form::text('email', null, ['id'=>'email','class'=>'form-control','placeholder'=>'Ingrese el Correo del usuario','readonly']) !!}
		</div>
	@endif
@else
	<div class="form-group">
		{!! Form::label('Correo: ') !!}
		{!! Form::text('email', null, ['id'=>'email','class'=>'form-control','placeholder'=>'Ingrese el Correo del usuario']) !!}
	</div>
@endif

		
<div class="form-group">
	{!! Form::label('password: ') !!}
	{!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Ingrese el password del usuario']) !!}
</div>	
		

<div class="form-group">
	{!! Form::label('Dirección: ') !!}
	{!! Form::text('address', null, ['id'=>'address','class'=>'form-control','placeholder'=>'Ingrese su dirección']) !!}
</div>	

@if(Auth::check())
    @if(Auth::user()->type=='A')
		<div class="form-group">
			{!! Form::label('Estado del usuario: ') !!}
			{!! Form::select('state', ['A' => 'Activo', 'I' => 'Inactivo'], null, ['id'=>'state','class'=>'form-control','placeholder' => 'Seleccion']); !!}
		</div>
		<div  class="form-group">
			{!! Form::label('Tipo de usuario: ') !!}
			{!! Form::select('type', ['A' => 'Administrador', 'U' => 'Usuario'], null, ['id'=>'type','class'=>'form-control','placeholder' => 'Seleccion']); !!}
		</div>
	@endif
@endif