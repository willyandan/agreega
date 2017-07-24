@extends('templates.admin')
@section('title', $student->name."- Admin")
@push('script')
	<script src="{{asset('js/aluno-view.js')}}" type="text/javascript"></script>
@endpush
@section('content')
<main class="content container">
	<div class="page-header">
		<h1>
			Ficha do Aluno
			<span class="pull-right"><a href="{{route('admin.aluno.index')}}" class="btn-default btn"><i class="fa fa-times"></i></a></span>
		</h1>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				Ficha do aluno: {{$student->name}}
			</h3>
		</div>
		<div class="panel-body">
			<h4 class="strong">Dados Pessoais</h4>
			<hr>
			<dl class="dl-horizontal">
				<dt>Nome:</dt>
				<dd>{{$student->name}}</dd>

				<dt>Aniversário:</dt>
				<dd>{{$student->birthday}}</dd>
			</dl>
			<h4 class="strong">Dados da Conta</h4>
			<hr>
			<dl class="dl-horizontal">
				<dt>Login:</dt>
				<dd>{{$student->user->login}}</dd>

				<dt>Email:</dt>
				<dd>{{$student->user->email}}</dd>

				<dt>Ra:</dt>
				<dd>{{$student->user->ra}}</dd>
			</dl>
			<h4>Endereço</h4>
			<hr>
			<dl class="dl-horizontal">
				<dt>Cep:</dt>
				<dd class="dd-cep">{{$student->address->cep}}</dd>

				<dt>Endereço:</dt>
				<dd>{{$student->address->street}}</dd>
				
				<dt>Número:</dt>
				<dd>{{$student->address->number}}</dd>
				
				@if($student->address->complement)
					<dt>Complemento:</dt>
					<dd>{{$student->address->complement}}</dd>
				@endif	
				
				<dt>Bairro:</dt>
				<dd>{{$student->address->neighborhood}}</dd>
				
				<dt>Cidade:</dt>
				<dd>{{$student->address->city->name}}</dd>
				
				<dt>Estado:</dt>
				<dd>{{$student->address->city->state->name}}</dd>
			</dl>
		</div>
	</div>
</main>
@endsection