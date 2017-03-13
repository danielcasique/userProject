@extends('layouts.admin')


@section('content')

	@include('usuario.modal')
	
	@if(Auth::check())
        @if(Auth::user()->type=='A')
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Operación</th>
				</thead>
		
				<tbody id="datos"></tbody>
		
			</table>



		@else
			Bienvenido {!! Auth::user()->name !!}
		@endif
	@endif

	

@endsection

@section('scripts')
	{!!Html::script('js/scriptListUser.js')!!}
@endsection