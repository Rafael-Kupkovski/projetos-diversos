

function pesquisarCep() {
    var txtCep = document.getElementById('txtCep').value;
    var url = `https://viacep.com.br/ws/${txtCep}`;

    // console.log("Buscar os dados do cep "+txtCep);

    // console.log( `Buscar os dados do cep ${txtCep}` );
    console.log("URL");
    console.log( url );

    //Fazer uma requisicao http
    fetch(url)
        // .then( req => console.log( req ) )
        .then( req => req.json() )
        .then( dados => {
            console.log( dados )
            console.log( typeof(dados) )
            console.log( dados.localidade )
            console.log( dados.logradouro )
        })
        .catch( erro => console.log( "Erro ao realizar a req") )
}

function getProdutos(){
    let url = 'http://localhost:8000/produtos';
    
    fetch(url)
        .then(req => req.json())
        .then(dados => {
            console.log(dados);
            let listaDeProdutos = document.querySelector('.listaDeProdutos');
            listaDeProdutos.innerHTML = '';

            dados.forEach(element => {
                listaDeProdutos.innerHTML += `
                    <tr>
                        <td>${element.nome}</td>
                        <td>${element.valor}</td>
                    </tr>
                `;  
            });
        });
}

function addProduto(){
    var txtProduto = document.getElementById('txtProduto').value;
    var txtValor = document.getElementById('numValor').value;
    var txtQtd = document.getElementById('numQtd').value;

    let url = "http://localhost:8000/produtos";

    fetch( url, {
        method: 'POST',
        body: `nome=${txtProduto}&valor=${txtValor}&qtd=${txtQtd}&codfabricante=1`,
        headers: new Headers({ 'Content-type': 'application/x-www-form-urlencoded'})
    }).then( req => req.json() )
      .then( dados => console.log(dados) )

    getProdutos();

}

