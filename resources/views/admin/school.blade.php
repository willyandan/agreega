@extends('templates.admin')

@section('title', 'Escola - Admin')

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
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#escola" aria-controls="escola" role="tab" data-toggle="tab">Escola</a>
				</li>
				<li role="presentation">
					<a href="#horarios" aria-controls="horarios" role="tab" data-toggle="tab">Hórarios</a>
				</li>
				<li role="presentation">
					<a href="#materias" aria-controls="materias" role="tab" data-toggle="tab">Matérias</a>
				</li>
				<li role="presentation">
					<a href="#contrato" aria-controls="contrato" role="tab" data-toggle="tab">Contrato</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<section role="tabpanel" class="tab-pane active" id="escola">
					
				</section>
				<section role="tabpanel" class="tab-pane" id="horarios">
					
				</section>
				<section role="tabpanel" class="tab-pane" id="materias">
					
				</section>
				<section role="tabpanel" class="tab-pane" id="contrato">
					
				</section>
			</div>
		</div>
	</section>
</main>
@endsection