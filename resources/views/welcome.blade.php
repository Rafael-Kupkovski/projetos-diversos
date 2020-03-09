<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Contatos</title>
    </head>
    <body onload="createList()">
	<div class="container">        
		<div class="container">
		    <div class="col-md-12">
		        <h3>Controle de Contatos</h3>                
		    </div>
		</div>
		<br>
		<div class="row">            
		    <div class="col-md-6">
		        <div class="form-group">
		            <input type="text" class="form-control" placeholder="Nome" id="txtNome">
		        </div>
		    </div>
		    <div class="col-md-6">
		        <div class="form-group">
		            <input type="text" class="form-control" placeholder="Telefone" id="txtTelefone">
		        </div>
		    </div>    
		</div>
		<div class="row">
		    <div class="col-md-12">
		        <button id="btnSalvar" class="btn btn-primary col-md-2 float-right" onclick="salvarContato()">Novo</button>
		    </div>            
		</div>
		<br>
		<table class="table table-hover">
		    <thead>
		        <tr>
		            <th scope="col">ID</th>
		            <th scope="col">Nome</th>
		            <th scope="col">Telefone</th>
		            <th scope="col">Ligou</th>
		            <th scope="col" colspan="4">Ação</th>
		        </tr>
		    </thead>
		    <tbody id="listaDeContatos">
		    </tbody>
		</table>
		<hr>
		<div class="row">
		    <div class="col-md-12">
		        <label style="font-weight: bold;">Selecione o contato para ver suas mensagens:</label>
		        <select id="selectContato" class="form-control" onchange="getContatoMsgs(value)">
		            <option value="" selected>
		                Selecione o contato
		            </option>
		        </select>
		    </div>
		</div>
		<br>
		<table class="table table-striped table-dark">
		    <thead>
		        <tr>
		        <th scope="col">#</th>
		        <th scope="col">Contato</th>
		        <th scope="col">Mensagem</th>
		        <th scope="col">Data de Envio</th>
		        <th scope="col" colspan="2">Ação</th>
		        </tr>
		    </thead>
		    <tbody id="listaDeMensagens">
		    </tbody>
		</table>
	    </div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ URL::asset('js/contatos.js') }}"></script>
    </body>
</html>
