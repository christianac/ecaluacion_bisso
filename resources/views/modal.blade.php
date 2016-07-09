<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Crear Cuenta</h4>
			</div>
			<div class="modal-body">
					{!! Form::open(['route' => 'client.storeAjax', 	'method' => 'POST' , 'role' => 'form', 'id' => 'formCuenta']) !!}
						<div class="form-group">
							{!! Form::label('banco', 'Banco') !!}
							{!! Form::text('banco', null ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('sucursal', 'Sucursal') !!}
							{!! Form::text('sucursal', null ,['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('numero_cuenta', 'Numero de Cuenta Bancaria') !!}
							{!! Form::text('numero_cuenta', null ,['class' => 'form-control']) !!}
						</div>

			</div>
			<div class="modal-footer">
				<div class="box-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
				</div>	
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>