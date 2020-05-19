{!!Form::open(array('url'=>'configuracion/cuenta', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Buscar..." value="{{$searchText}}" name="searchText">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
		</span>
	</div>
</div>

{!!Form::close()!!}