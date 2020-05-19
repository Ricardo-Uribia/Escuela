{!!Form::open(array('url'=>'utp/buscar/conceptoCobro', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Buscar..." value="{{$searchText}}" name="searchText">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

{!!Form::close()!!}