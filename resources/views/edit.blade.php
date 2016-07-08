@extends('app')

@section('htmlheader_title')
    Crear Cliente
@endsection

@section('main-content')
<div class="content">
	<div class="row">
		<div class="col-md-12 col-ms-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Nuevo Cliente
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['client.update', $cliente->id], 	'method' => 'PUT' , 'role' => 'form']) !!}
						<div class="form-group">
							{!! Form::label('nombre', 'Nombre') !!}
							{!! Form::text('nombre', $cliente->nombre ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('razon_social', 'Razon Social') !!}
							{!! Form::text('razon_social', $cliente->razon_social ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('rfc', 'RFC') !!}
							{!! Form::text('rfc', $cliente->rfc ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('calle', 'Calle') !!}
							{!! Form::text('calle', $cliente->address->calle,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('numero', 'Numero') !!}
							{!! Form::text('numero', $cliente->address->numero ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('estado', 'Estado') !!}
							{!! Form::text('estado', $cliente->address->estado ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('municipio', 'Municipio') !!}
							{!! Form::text('municipio', $cliente->address->municipio ,['class' => 'form-control']) !!}
						</div>

						<div class="box-footer">
							{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
						</div>	
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
