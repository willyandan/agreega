@extends('templates.admin')
@section('title', 'Cadastrar aluno - Admin')
@push('script')
	<script src="{{asset('js/aluno-cadastro.js')}}" type="text/javascript"></script>
@endpush
@section('content')
<main class="container content">
	<form action="{{$route}}" method="post" class="form-horizontal" id="form">
		<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
		@if(isset($student) && $student)
			<input type="hidden" name="id" value="{{$student->id}}">
		@endif
		<div class="row">
			<div class="col-xs-12">	
				<div class="page-header">
					<h1>Cadastro de alunos
						<div class="pull-right">
							<a href="{{route('admin.aluno.index')}}" class="btn btn-default">	<i class="fa fa-times"></i>
							</a>
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
						</div>
					</h1>
				</div>
			</div>
		</div>

		@if(session('status'))
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-danger">
						{{session('status')}}
					</div>
				</div>
			</div>
		@endif
		
		<div class="form-group">
			<label for="login" class="col-xs-12">Login</label>
			<div class="col-xs-12">
				<input type="text" name="login" value="{{$student->user->login or old('login')}}" placeholder="Login" id="login" class="form-control input-agreega" data-selected="{{$student->user->login or ''}}" required>
				<span class="help-text">Nome ponto sobrenome pode ser uma boa opção, e o aluno poderá mudar depois</span>
			</div>
		</div>
		@php
			$required = "required";
			if(isset($student) && $student){
				$required = "";
			}
		@endphp
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					<label for="password" class="col-xs-12">Senha</label>
					<div class="col-xs-12">
						<input type="password" name="password" id="password" value="{{old('password')}}" placeholder="Senha" class="form-control input-agreega" {{$required}}>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					<label for="repeassword" class="col-xs-12">Confirmar Senha</label>
					<div class="col-xs-12">
						<input type="password" id="repassword" value="" placeholder="Confirmar Senha" class="form-control input-agreega" {{$required}}>
					</div>
				</div>
			</div>
				
		</div>

		<div class="form-group">
			<label for="email" class="col-xs-12">Email</label>
			<div class="col-xs-12">
				<input type="email" name="email" value="{{$student->user->email or old('email')}}" placeholder="Email" id="email" class="form-control input-agreega" data-selected="{{$student->user->email or ''}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-xs-12">Nome Completo</label>
			<div class="col-xs-12">
				<input type="text" name="name" value="{{$student->name or old('name')}}" placeholder="Nome Completo" class="form-control input-agreega" required>
			</div>
		</div>

		<div class="form-group">
			<label for="ra" class="col-xs-12">R.A</label>
			<div class="col-xs-12">
				<input type="text" name="ra" value="{{$student->user->ra or old('ra')}}" placeholder="R.A" class="form-control input-agreega" id="ra">
			</div>
		</div>

		<div class="form-group">
			<label for="birthday" class="col-xs-12">Data de nascimento</label>
			<div class="col-xs-12">
				<input type="date" name="birthday" value="{{$student->birthday or old('birthday')}}" placeholder="Data de nascimento" class="form-control input-agreega" min="1900-01-01" max="2100-12-31" required>
			</div>
		</div>

		<div class="form-group">
			<label for="cep" class="col-xs-12">CEP</label>
			<div class="col-xs-12">
				<input type="text" name="cep" value="{{$student->address->cep or old('cep')}}" placeholder="CEP" id="cep" class="form-control input-agreega" required>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-4 col-sm-3 col-md-2">
				<div class="form-group">
					<label for="state" class="col-xs-12">Estado</label>
					<div class="col-xs-12">
						<select name="state" id="state" class="form-control input-agreega" required data-selected="{{$student->address->city->state->id or old('state')}}">
							<option value="">UF</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-xs-8 col-sm-9 col-md-10">
				<div class="form-group">
					<label for="city" class="col-xs-12">Cidade</label>
					<div class="col-xs-12">
						<select name="city" id="city" class="form-control input-agreega" required data-selected="{{$student->address->city->id or old('city')}}">
							<option value="">Cidade</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-8 col-sm-9 col-md-10">
				<div class="form-group">
					<label for="street" class="col-xs-12">Rua</label>
					<div class="col-xs-12">
						<input type="text" name="street" value="{{$student->address->street or old('street')}}" placeholder="Rua" id="street" class="form-control input-agreega" required>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-3 col-md-2">
				<div class="form-group">
					<label for="number" class="col-xs-12">Nº</label>
					<div class="col-xs-12">
						<input type="text" name="number" value="{{$student->address->number or old('number')}}" placeholder="Número" id="number" class="form-control input-agreega" required>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="complement" class="col-xs-12">Complemento</label>
			<div class="col-xs-12">
				<input type="text" name="complement" value="{{$student->address->complement or old('complement')}}" placeholder="Complemento" class="form-control input-agreega">
			</div>
		</div>

		<div class="form-group">
			<label for="neighborhood" class="col-xs-12">Bairro</label>
			<div class="col-xs-12">
				<input type="text" name="neighborhood" value="{{$student->address->neighborhood or old('neighborhood')}}" placeholder="Bairro" id="neighborhood" class="form-control input-agreega" required>
			</div>
		</div>
	</form>	
</main>
@endsection

@section('modal')
<div class="modal fade" id="modalError" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="erroTitle"></h4>
      </div>
      <div class="modal-body">
        <p id="erroMsg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Entendi</button>
      </div>
    </div>
  </div>
</div>
@endsection