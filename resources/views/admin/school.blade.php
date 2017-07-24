@extends('templates.admin')

@section('title', 'Escola - Admin')
@push('script')
	<script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endpush
@section('content')
<main class="container content">
	<form action="{{route('admin.escola.update')}}" method="POST" class="form-horizontal">
		<header class="row">
			<div class="col-xs-12">
				<p>
					<srtong class="h3">Escola</srtong> 
					<span class="pull-right">
						<a href="{{route("admin.index")}}" class="btn btn-default"><i class="fa fa-times"></i></a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
					</span>
				</p>
				<hr>
			</div>
		</header>
		<section class="row">
			<div class="col-xs-12">
				<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#escola" aria-controls="escola" role="tab" data-toggle="tab">Escola</a>
					</li>
					<li role="presentation">
						<a href="#materias" aria-controls="materias" role="tab" data-toggle="tab" id="tabMaterias">Matérias</a>
					</li>
					<li role="presentation">
						<a href="#contrato" aria-controls="contrato" role="tab" data-toggle="tab">Contrato</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<section role="tabpanel" class="tab-pane active" id="escola">
						<div class="form-group">
							<label for="name" class="col-xs-12">Nome</label>
							<div class="col-xs-12">
								<div class="iconInput">
									<i class="fa fa-building"></i>
									<input type="text" name="name" id="name" class="form-control input-agreega" placeholder="Nome da Escola" value="{{$admin->person->school->name}}" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="cep" class="col-xs-12">CEP</label>
							<div class="col-xs-12">
								<div class="iconInput">
									<i class="fa fa-address-card"></i>
									<input type="text" id="cep" name="cep" class="form-control input-agreega" placeholder="CEP da Escola" value="{{$address->cep or ''}}" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="state" class="col-xs-12">Estado</label>
									<div class="col-xs-12">
										<select name="state" id="state" class="form-control input-agreega" data-selected="{{$city->state_id}}" required>
											<option value="00">UF</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<label for="city" class="col-xs-12">Cidade</label>
									<div class="col-xs-12">
										<select name="city" id="city" class="form-control input-agreega" data-selected="{{$city->id}}" required>
											<option value="00">Cidade</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-8">
								<div class="form-group">
									<label for="street" class="col-xs-12">Rua</label>
									<div class="col-xs-12">
										<div class="iconInput">
											<i class="fa fa-road"></i>
											<input type="text" name="street" id="street" class="form-control input-agreega" value="{{$address->street or ''}}" placeholder="Rua" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="number" class="col-xs-12">Número</label>
									<div class="col-xs-12">
										<div class="iconInput">
											<i class="fa fa-sort-numeric-asc"></i>
											<input type="text" id="number" name="number" class="form-control input-agreega"
											 value="{{$address->number or ''}}" placeholder="Número" required>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="complement" class="col-xs-12">Complemento</label>
							<div class="col-xs-12">
								<div class="iconInput">
									<i class="fa fa-pencil"></i>
									<input type="text" id="complement" name="complement" class="form-control input-agreega" value="{{$address->complement or ''}}" placeholder="Complemento">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="neighborhood" class="col-xs-12">Bairro</label>
							<div class="col-xs-12">
								<div class="iconInput">
									<i class="fa fa-map-marker"></i>
									<input type="text" id="neighborhood" name="neighborhood" class="form-control input-agreega" value="{{$address->neighborhood or ''}}" placeholder="Bairro" required>
								</div>
							</div>
						</div>
					</section>
					<section role="tabpanel" class="tab-pane" id="materias">
						<table class="table table-striped" id="tableMatter">
							<thead>
								<tr>
									<th>Matéria</th>
									<th>Professor</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse($matters as $matter)
									<tr>
										<td>
											<div class="iconInput">
												<i class="fa fa-book"></i>
												<input type="text" id="matter" name="matter[]" class="form-control input-agreega" placeholder="Matéria" value="{{$matter->matter}}">
											</div>
										</td>
										<td>
											<select name="teacher[]" class="form-control input-agreega teacher" data-selected="{{$matter->id_person}}" value={{$matter->id_person}}>
												<option value="{{$matter->id_person}}">Professor</option>
											</select>		
										</td>
										<td>
											<button type="button" class="btn btn-danger btnMatterMinus">
												<i class="fa fa-times"></i>
											</button>
										</td>
									</tr>
								@empty
									<tr>
										<td>
											<div class="iconInput">
												<i class="fa fa-book"></i>
												<input type="text" id="matter" name="matter[]" class="form-control input-agreega" placeholder="Matéria">
											</div>
										</td>
										<td>
											<select name="teacher[]" class="form-control input-agreega teacher">
												<option value="00">Professor</option>
											</select>		
										</td>
										<td>
											<button type="button" class="btn btn-danger btnMatterMinus">
												<i class="fa fa-times"></i>
											</button>
										</td>
									</tr>
								@endforelse
							</tbody>
						</table>
						<button class="btn btn-primary" id="btnMatterPlus" type="button">
							<i class="fa fa-plus"></i>
						</button>
					</section>
					<section role="tabpanel" class="tab-pane" id="contrato">
						{{-- COLOCAR DOCUMENTO DE CONTRATO E DURAÇÂO DE DIAS --}}
					</section>
				</div>	
			</div>
		</section>
	</form>
</main>
@endsection