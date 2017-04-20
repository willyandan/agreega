@extends('templates.admin')

@section('title', 'Administração - Login')
@push('link')
	<link rel="stylesheet" href="{{asset('css/admLogin.css')}}">
@endpush
@section('content')
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Coordenador - Login</h4>
					</div>
					<div class="panel-body">
						<form method="POST" accept-charset="utf-8" class="form-horizontal" id="formLogin">
							<input type="hidden" name="_token" id="token" value="{!!csrf_token()!!}">
							<div class="form-group">
								<label for="escola" class="col-xs-12">Escola</label>
								<div class="col-xs-12">
									<div class="iconInput">
										<i class="fa fa-fw fa-graduation-cap"></i>
										<input type="text" class="form-control input-agreega" id="escola" placeholder="Escola" required>
									</div>
								</div>
							</div>

							<hr>

							<div class="form-group">
								<label for="user" class="col-xs-12">Usuário</label>
								<div class="col-xs-12">
									<div class="iconInput">
										<i class="fa fa-fw fa-user"></i>
										<input type="text" class="form-control input-agreega" id="user" placeholder="Nome do usuário" required>
									</div>
								</div>
							</div>

							<hr>
							
							<div class="form-group">
								<label for="password" class="col-xs-12">Senha</label>
								<div class="col-xs-12">
									<div class="iconInput">
										<i class="fa fa-fw fa-lock"></i>
										<input type="password" class="form-control input-agreega" id="password" placeholder="Senha" required>
									</div>
									<span class="help-block">
										<a href="#" class="link-vermelho">Esqueceu a senha?</a>
									</span>
								</div>							
							</div>

							<div class="form-group">
								<div class="col-xs-12">
									<div class="text-right">
										<button type="submit" class="btn btn-vermelho">Entrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('script')
<script src="{{asset('js/admLogin.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush