{% extends 'layouts/index.volt' %}

{% block content %}

	<div id="cadastro_ticket" class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp;Cadatrar Notícia
				</div>
				{{ form('noticias/salvar', 'method': 'post', 'enctype' : 'multipart/form-data', 'name':'cadastrar') }}
					{{ form.render('csrf', ['value': security.getToken()]) }}
					<div class="panel-body">
						<div class="col-md-12" id="conteudo">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="form-group col-sm-12">
											<label for="Titulo">Título
												<span class="error">(*)<span></label>
													{{ form.render('titulo',['value':session.get('titulo')]) }}
													{{ session.remove('titulo') }}
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-12">
													<label for="Texto">Texto</label>
													{{ form.render('texto',['value':session.get('texto')]) }}
													{{ session.remove('texto') }}
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-12">
													<label for="exampleFormControlSelect2">Categoria</label>
													{{ form.render('categorias[]') }}
												</div>
											</div>

											<div class="row">

												<div class="form-check col-sm-12">
													{{ form.render('publicado') }}

													<label class="form-check-label" for="publicado">
														Publicar?
													</label>
												</div>

											</div>

											<div class="row" id="data" style="display:none">

												<div class="form-group col-sm-12">
													<label for="data-pagamento">Data da publicação</label>
													<div class="input-group date" id="datetimepicker1">
														{{ form.render('data') }}
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
														</span>
													</div>
												</div>

											</div>

										</div>
										{#/.panel-body#}
									</div>
									{#/.panel#}
									<div class="row" style="text-align:right;">
										<div id="buttons-cadastro" class="col-md-12">
											<a href="{{ url(['for':'noticia.lista']) }}" class="btn btn-default">Cancelar</a>
											{{ submit_button('Gravar', "class": 'btn btn-primary') }}
										</div>
									</div>
								</div>
								{#/.conteudo#}
							</div>
							{#/.panel-body#}
							{{ end_form() }}
						</div>
						{#/.panel#}
					</div>
					{#/.col-md-12#}
				</div>
				<!-- row -->

			{% endblock %}

			{%  block extrafooter %}

				<script>

					$('#publicado').on('change', function () {
if ($(this).is(':checked')) {
$('#data').css('display', 'block');
} else {
$("#data").css('display', 'none');
$('#data2').datetimepicker('hide');
}
});


 $('#data2').datetimepicker({
format: "dd-MM-yyyy hh:mm:ss",
language: "pt-BR",
orientation: 'auto',
});

				</script>

			{% endblock %}
