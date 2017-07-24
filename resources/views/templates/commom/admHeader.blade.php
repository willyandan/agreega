<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    	@if(isset($admin) && $admin)
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	    	</button>
    	@endif
    	<a class="navbar-brand" href="{{route('admin.index')}}">Agreega</a>
    </div>
    @if(isset($admin) && $admin)
	    <div class="collapse navbar-collapse" id="collapse-navbar">
	    	<ul class="nav navbar-nav">
				<li><a href="{{route("admin.escola.register")}}">Escola</a></li>
				<li><a href="{{route('admin.aluno.index')}}">Alunos</a></li>
				<li><a href="#">Professores</a></li>
				<li><a href="#">Classes</a></li>
				<li><a href="#">Estatistica</a></li>
				<li class="visible-xs"><a href="#">Configurações da escola</a></li>
				<li class="visible-xs"><a href="#">Configurações da conta</a></li>
				<li class="visible-xs"><a href="{{route('admin.logout')}}">Sair</a></li>
	    	</ul>
	    	<ul class="nav navbar-nav navbar-right">
				<li class="dropdown hidden-xs">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort-desc"></i></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Configurações da escola</a></li>
						<li><a href="#">Configurações da conta</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{route('admin.logout')}}">Sair</a></li>
					</ul>
	        	</li>
	    	</ul>
	  </div>
  @endif
</nav>