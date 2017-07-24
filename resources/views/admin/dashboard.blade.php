@extends('templates.admin')
@section('title', 'Dashboard - Admin')
@push('link')
	<link rel="stylesheet" href="{{asset('css/admDashboard.css')}}">
@endpush
@push('script')
	<script type="text/javascript" src="{{asset("js/chart.min.js")}}"></script>
	<script type="text/javascript" src="{{asset("js/graficos.js")}}"></script>
@endpush
@section('content')
<main class="content">
	<nav class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-4 col-md-3">
				<a href="{{route("admin.escola.register")}}" class="link-box link-box-red">
					<span class="link-box-text">
						Escola
					</span>
					<div class="link-box-i">
						<i class="fa fa-building"></i>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3">
				<a href="{{route('admin.aluno.index')}}" class="link-box link-box-green">
					<span class="link-box-text">
						Alunos
					</span>
					<div class="link-box-i">
						<i class="fa fa-user"></i>
					</div>
				</a>
			</div>
			<!--CLEARFIX-->
			<div class="visible-xs-block clearfix"></div>
			<div class="col-xs-6 col-sm-4 col-md-3">
				<a href="" class="link-box link-box-purple">
					<span class="link-box-text">
						Professores
					</span>
					<div class="link-box-i">
						<i class="fa fa-graduation-cap"></i>
					</div>
				</a>
			</div>
			<!--CLEARFIX-->
			<div class="visible-sm-block clearfix"></div>
			<div class="col-xs-6 col-sm-4 col-md-3">
				<a href="" class="link-box link-box-blue">
					<span class="link-box-text">
						Classes
					</span>
					<div class="link-box-i">
						<i class="fa fa-users"></i>
					</div>
				</a>
			</div>
			<!--CLEARFIX-->
			<div class="hidden-sm clearfix"></div>
			<div class="col-xs-6 col-sm-4 col-md-3">
				<a href="" class="link-box link-box-yellow">
					<span class="link-box-text">
						Estatistica
					</span>
					<div class="link-box-i">
						<i class="fa fa-line-chart"></i>
					</div>
				</a>
			</div>
		</div>
	</nav>
	<article class="container">
		<section class="row">
			<div class="col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<h1 class="text-center">Desempenho geral</h1>
						<canvas id="graficoDesenpenhoEscolar" style="width:100%;"></canvas>
						<div id="graficoDesenpenhoEscolarLegenda">
							<ul class="list-inline">
								<li>
									<i class="fa fa-square ano-passado"></i> Ano Passado
								</li>
								<li>
									<i class="fa fa-square ano-atual"></i> Ano Atual
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</article>
	<article class="container">
		<div class="row">
			<section class="col-xs-12 col-sm-6">
				<div class="panel">
					<div class="panel-body">
						<h3>Ranking de professores</h3>
						<hr>
						<div class="media">
							<div class="media-left">
		      					<img class="media-object" src="http://placehold.it/64x64" alt="...">
		  					</div>
							<div class="media-body">
								<h4 class="media-heading">Media heading</h4>
								<p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="col-xs-12 col-sm-6">
				<div class="panel">
					<div class="panel-body">
						<h3>Alunos em situação critica</h3>
						<hr>
						<div class="media">
							<div class="media-left">
		      					<img class="media-object" src="http://placehold.it/64x64" alt="">
		  					</div>
							<div class="media-body">
								<h4 class="media-heading">Media heading</h4>
								<p>
									10 <i class="fa fa-thumbs-down"></i>
									&bull; 24 faltas
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</article>
</main>
@endsection