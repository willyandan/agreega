@extends('templates.admin')

@section('title', 'Escola - Admin')
@push('script')
	<script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endpush
@section('content')
<main class="container content">
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
			<form action="" method="POST" class="form-horizontal">
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
									<input type="text" name="name" id="name" class="form-control input-agreega" placeholder="Nome da Escola" value="{{$admin->person->school->name}}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="cep" class="col-xs-12">CEP</label>
							<div class="col-xs-12">
								<div class="iconInput">
									<i class="fa fa-address-card"></i>
									<input type="text" id="cep" name="cep" class="form-control input-agreega" placeholder="CEP da Escola" value="{{$address->cep or ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="state" class="col-xs-12">Estado</label>
									<div class="col-xs-12">
										<select name="state" id="state" class="form-control input-agreega" data-selected="{{$city->state_id}}">
											<option value="00">UF</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<label for="city" class="col-xs-12">Cidade</label>
									<div class="col-xs-12">
										<select name="city" id="city" class="form-control input-agreega" data-selected="{{$city->id}}">
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
											<input type="text" name="street" id="street" class="form-control input-agreega" value="{{$address->street or ''}}" placeholder="Rua">
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
											 value="{{$address->number or ''}}" placeholder="Número">
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
									<input type="text" id="neighborhood" name="neighborhood" class="form-control input-agreega" value="{{$address->neighborhood or ''}}" placeholder="Bairro">
								</div>
							</div>
						</div>
					</section>
					<section role="tabpanel" class="tab-pane" id="materias">
						<div class="form-group">
							<label for="" class="col-xs-12">Matéria</label>
							<div class="col-xs-5">
								<div class="iconInput">
									<i class="fa fa-book"></i>
									<input type="text" id="matter" class="form-control input-agreega" placeholder="Matéria">
								</div>
							</div>
							<div class="col-xs-5">
								<select name="teacher[]" class="form-control input-agreega teacher">
									<option value="00">Professor</option>
								</select>
							</div>
							<div class="col-xs-2 text-center">
								<button class="btn btn-danger">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
					</section>
					<section role="tabpanel" class="tab-pane" id="contrato">
						{{-- COLOCAR DOCUMENTO DE CONTRATO E DURAÇÂO DE DIAS --}}
					</section>
				</div>
			</form>
		</div>
	</section>
</main>
@endsection