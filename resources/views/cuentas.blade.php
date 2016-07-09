<div class="col-md-12 col-ms-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Cuentas
		</div>
		<div class="panel-body" id="baseCuenta">
  		  	@forelse($cliente->accounts as $cuenta)
			<div class="col-md-6">
				<div class="box box-danger box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">Cuenta</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool deleteCuenta" data-cuenta="{{ $cuenta->id }}"><i class="fa fa-times"></i>
						</button>
					</div>
					</div>
					<div class="box-body">
						<ol>
							<li>{{ $cuenta->banco }}</li>
							<li>{{ $cuenta->sucursal }}</li>
							<li>{{ $cuenta->numero_cuenta }}</li>
						</ol>
					</div>
				</div>
			</div>
       		@empty

			@endforelse
		</div>
	</div>
</div>