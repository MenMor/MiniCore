<!DOCTYPE html>
<html>
<head>
	<title>Contratos</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 20px;
		}

		h1 {
			margin-bottom: 20px;
		}

		form {
			margin-bottom: 20px;
		}

		label {
			display: inline-block;
			margin-right: 10px;
		}

		input[type="date"] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-right: 10px;
		}

		button[type="submit"] {
			background-color: #0074D9;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}

		th, td {
			text-align: left;
			padding: 10px;
			border: 1px solid #ddd;
		}

		th {
			background-color: #0074D9;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Contratos</h1>

	<form action="{{ route('contratos.filtrar') }}" method="post">
		@csrf
		<label for="fecha_inicio">Fecha inicio:</label>
		<input type="date" name="fecha_inicio">
		<label for="fecha_fin">Fecha fin:</label>
		<input type="date" name="fecha_fin">
		<button type="submit">Filtrar</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Monto</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
            @php
				$total = 0;
			@endphp
			@foreach($contratos as $contrato)
				<tr>
					<td>{{ $contrato->id }}</td>
					<td>{{ $contrato->fecha }}</td>
					<td>{{ $contrato->cliente->name }}</td>
					<td style="text-align: right;">{{ $contrato->monto }}</td>
					<td>{{ $contrato->descripcion }}</td>
				</tr>
                @php
					$total += $contrato->monto;
				@endphp
                @endforeach
			<tr>
				<th colspan="3" style="text-align: right;">Total:</th>
				<td>{{ $total }}</td>
				<td></td>
			</tr>
		</tbody>
	</table>

	@if(isset($totalFiltrado))
		<p>Total filtrado: {{ $totalFiltrado }}</p>
	@endif
</body>
</html>
