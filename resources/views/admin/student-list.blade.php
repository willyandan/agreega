@extends('templates.admin')
@push('meta-tags')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('title', 'Alunos - Admin')

@push('script')
	<script src="{{asset('js/aluno-lista.js')}}" type="text/javascript"></script>
@endpush

@section('content')
<main class="content">
	<header class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header">
					<h1>
						Alunos
						<span class="pull-right">
							<a href="{{route('admin.index')}}" class="btn btn-default">
								<i class="fa fa-times"></i>
							</a> 
							<button class="btn btn-danger" id="btn-delete">
								<i class="fa fa-trash"></i>
							</button>
							<a href="{{route('admin.aluno.create')}}" class="btn btn-primary">
								<i class="fa fa-plus"></i>
							</a>
						</span>
					</h1>
				</div>
				<hr>
			</div>
		</div>
		
		@if(session('status'))
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success">
						{{session('status')}}
					</div>
				</div>
			</div>
		@endif

		@if(session()->has('error'))
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
				</div>
			</div>
		@endif
	</header>
	<section class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-list"></i> Listando Alunos</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="well">
							<form action="{{route('admin.aluno.index')}}" method="GET" class="form-horizontal">
								<div class="row">
									<div class="col-xs-12 col-sm-3">
										<div class="form-group">
											<div class="col-xs-12">
												<input type="search" id="search" name="search" class="input-agreega form-control" placeholder="Nome do aluno" value="{{$input['search'] or ''}}">
											</div>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" name="ra" value="{{$input['ra'] or ''}}" placeholder="R.A do aluno" class="input-agreega form-control">
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group">
											<div class="col-xs-6">
												<input type="number" name="minIdade" placeholder="Idade minima" min="1" max="100" class="form-control input-agreega" value="{{$input['minIdade'] or ''}}">
											</div>
											<div class="col-xs-6">
												<input type="number" name="maxIdade" placeholder="Idade maxima" min="1" max="100" class="form-control input-agreega" value="{{$input['maxIdade'] or ''}}">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 text-right">
										<button class="btn btn-primary"><i class="fa fa-filter"></i> Filtrar</button>	
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="text-center">
										<input type="checkbox" id="chkall" value="">
									</th>
									<th>Nome</th>
									<th>R.A</th>
									<th>Idade</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach($students as $student)
									<tr>
										<td class="text-center">
											<input type="checkbox" value="{{$student->id}}">
										</td>
										<td>{{$student->name}}</td>
										<td>{{$student->user->ra}}</td>
										<td>{{$student->birthday}}</td>
										<td>
											<a href="{{route('admin.aluno.edit', $student->id)}}" class="btn btn-warning">
												<i class="fa fa-pencil"></i>
											</a>
											<a href="{{route('admin.aluno.view', $student->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
										</td>
									</tr>
								@endforeach;
							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>
		{{ $students->links() }}
		<form action="{{route('admin.aluno.delete')}}" method="post" id="delete-form">
			{{method_field('DELETE')}}
			{{csrf_field()}}
			<input type="hidden" name="id" id="delete-ids" value="">
		</form>
	</section>
</main>
@endsection