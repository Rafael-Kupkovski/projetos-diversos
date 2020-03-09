var listDeContatos = document.getElementById('listaDeContatos');

function salvarContato() {
    
    if(txtNome.value != '' && txtTelefone.value != ''){
        btnSalvar.disabled = true;
        fetch('contatos', {
            method: 'POST',
            body: `nome=${txtNome.value}&telefone=${txtTelefone.value}`,
            headers: new Headers({ 'Content-type': 'application/x-www-form-urlencoded'})
        }).then( req => req.json() )
          .then( dados => {
              console.log(dados);
              btnSalvar.disabled = false;

              txtNome.value = '';
              txtTelefone.value = '';

              location.reload();
            } )
    }else{
        alert('Preencha os campos!')
    }
}

function createList(){
    listDeContatos.innerHTML = '';

    fetch('contatos')
        .then(req => req.json())
        .then(data => {
            
            var selectContato = document.getElementById("selectContato");

            data.forEach(element => {
                var table = `
                <tr>
                    <td>${element.id}</td>
                    <td>${element.nome}</td>
                    <td>${element.telefone}</td>
                    <td><button onclick="setLigou(${element.id})" class="btn btn-${element.ligou == "S" ? 'success' : 'danger'}">${ligou(element.ligou)}</button></td>
                    <td><a href="https://api.whatsapp.com/send?phone=+55${element.telefone}&text=Teste123">Enviar Mensagem</a></td>
                    <td><a style="cursor: pointer" onclick="cadastrarMensagem(${element.id})">Cadastrar Mensagem</a></td>
                    <td><a style="cursor: pointer" onclick="excluirContato(${element.id})">Excluir Contato</a></td>
                    <td><a style="cursor: pointer" onclick="buscarContato(${element.id})">Alterar Contato</a></td>
                </tr>`;
                
                listDeContatos.innerHTML += table;

                selectContato.innerHTML += `
                    <option value="${element.id}">
                        ${element.nome}
                    </option>
                `;
            });
        });
}
function ligou(ligou){
    return ligou == 'N' ? "Não" : "Sim";
}

function setLigou(id){
    fetch('contatos/ligou/'+id)
    .then(req => {
        createList();
    });
}

function excluirContato(value) {
    fetch('contatos/'+value,
        {
            method: 'DELETE',
        }
        )
        .then(req => {
            location.reload();
        })
}

function buscarContato(value) {
    fetch('contatos/'+value,)
        .then(req => req.json())
        .then(data => {
            txtNome.value = data.nome;
            txtTelefone.value = data.telefone;

            btnSalvar.textContent = 'Alterar'
            btnSalvar.removeAttribute("onclick");
            btnSalvar.setAttribute( "onclick", `alterarContato(${data.id})` );
        })
}
function alterarContato(value) {
    
    if(txtNome.value != '' && txtTelefone.value != ''){
        btnSalvar.disabled = true;
        fetch('contatos/'+value, {
            method: 'PUT',
            body: `nome=${txtNome.value}&telefone=${txtTelefone.value}`,
            headers: new Headers({ 'Content-type': 'application/x-www-form-urlencoded'})
        }).then( req => req.json() )
            .then( dados => {
            console.log(dados);
            btnSalvar.disabled = false;
            btnSalvar.textContent = 'Novo'
            btnSalvar.removeAttribute("onclick");
            btnSalvar.setAttribute( "onclick", `salvaContato()` );

            txtNome.value = '';
            txtTelefone.value = '';

            location.reload();
        })
    }else{
        alert('Preencha os campos!')
    }
}

function cadastrarMensagem(value) {
    fetch('contatos/'+value,)
        .then(req => req.json())
        .then(data => {
            txtNome.value = data.nome;
            txtNome.disabled = true;

            txtTelefone.placeholder = 'Mensagem';
            txtTelefone.id = 'txtMensagem';
            btnSalvar.removeAttribute("onclick");
            btnSalvar.setAttribute( "onclick", `salvarMensagem(${data.id})` );
        })
}

function salvarMensagem(value) {    
    if(txtMensagem.value != ''){
        btnSalvar.disabled = true;
        fetch('contatosmsgs', {
            method: 'POST',
            body: `contato_id=${value}&msg=${txtMensagem.value}`,
            headers: new Headers({ 'Content-type': 'application/x-www-form-urlencoded'})
        }).then( req => req.json() )
            .then( dados => {
                console.log(dados);
                btnSalvar.disabled = false;

                txtNome.value = '';
                txtMensagem.value = '';

                txtNome.disabled = false;

                txtMensagem.placeholder = 'Telefone';
                txtMensagem.id = 'txtTelefone';
                btnSalvar.removeAttribute("onclick");
                btnSalvar.setAttribute( "onclick", 'salvarContato()' );

                getContatoMsgs();
            } )
    }else{
        alert('Preencha os campos!')
    }
}

function getContatoMsgs(value) {
    var listaDeMensagens = document.getElementById("listaDeMensagens");
    
    if(value == ''){
        listaDeMensagens.innerHTML = '';
    }else{
        fetch('contatosmsgs/contato/'+value)
        .then(req => req.json())
        .then(data => {
            listaDeMensagens.innerHTML = '';

            var e = document.getElementById("selectContato");
            var strContato = (e.options[e.selectedIndex].innerHTML).trim();

            data.forEach(element => {
                var table = `
                <tr>
                    <td>${element.id}</td>
                    <td>${strContato}</td>
                    <td>${element.msg}</td>
                    <td>${new Date(element.data_envio).toLocaleString()}</td>
                    <td><a style="cursor: pointer" onclick="excluirMensagem(${element.id})">Excluir Mensagem</a></td>
                    <td><a style="cursor: pointer" onclick="buscarMensagem(${element.id})">Alterar Mensagem</a></td>
                </tr>`;
                
                listaDeMensagens.innerHTML += table;

            });
        });
    }
}

function excluirMensagem(value) {
    fetch('contatosmsgs/'+value,
        {
            method: 'DELETE',
        }
        )
        .then(req => {
            location.reload();
        })
}

function buscarMensagem(value) {
    fetch('contatosmsgs/'+value,)
        .then(req => req.json())
        .then(data => {
            console.log(data);
            var e = document.getElementById("selectContato");
            var strContato = (e.options[e.selectedIndex].innerHTML).trim();

            txtNome.value = strContato;
            txtNome.disabled = true;

            txtTelefone.value = data.msg;

            txtTelefone.placeholder = 'Mensagem';
            txtTelefone.id = 'txtMensagem';

            btnSalvar.textContent = 'Alterar'
            btnSalvar.removeAttribute("onclick");
            btnSalvar.setAttribute( "onclick", `alterarMensagem(${data.id})` );
        })
}
function alterarMensagem(value) {
    
    if(txtMensagem.value != ''){
        btnSalvar.disabled = true;
        fetch('contatosmsgs/'+value, {
            method: 'PUT',
            body: `msg=${txtMensagem.value}`,
            headers: new Headers({ 'Content-type': 'application/x-www-form-urlencoded'})
        }).then( req => req.json() )
            .then( dados => {
            console.log(dados);
            btnSalvar.disabled = false;
            btnSalvar.textContent = 'Novo'
            btnSalvar.removeAttribute("onclick");
            btnSalvar.setAttribute( "onclick", `salvaContato()` );

            txtNome.disabled = false;

            txtMensagem.placeholder = 'Telefone';
            txtMensagem.id = 'txtTelefone';

            txtNome.value = '';
            txtTelefone.value = '';

            location.reload();
        })
    }else{
        alert('Preencha os campos!')
    }
}
