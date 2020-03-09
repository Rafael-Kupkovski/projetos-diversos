

// Armazenar no localstorage
// Listar tarefas
// Adicionar

var listTarefas = []; 

function addTarefa(){
    var txtTarefa = document.getElementById('txtTarefa').value;

    if( txtTarefa == '' ){
        alert('Campo tarefa obrigatorio');
    }else{


        listTarefas.push( {titulo : txtTarefa });

        if( localStorage.getItem('listaDeTarefas') == null ){
            console.log("Inserir -> lista vazia")
        }

        

        console.log( listTarefas );

        console.log(
            JSON.stringify( listTarefas )
        );

        listTarefasTexto = JSON.stringify( listTarefas )
        localStorage.setItem( "listaDeTarefas", listTarefasTexto )

        listar()
    }


}


getListaLocal()
function getListaLocal(){
    
    var listaLocalStorage = localStorage.getItem('listaDeTarefas');

    console.log("listaLocalStorage")
    console.log(listaLocalStorage )
    
    if( listaLocalStorage == null ){
        console.log("Nao possui dados no local storage")
    }else{
        listTarefas = JSON.parse( listaLocalStorage )
        listar();
    }

}


// listar()
function listar(){
    var trListaDeTarefas = document.getElementById('listaDeTarefas')
    var listaLocalStorage = localStorage.getItem('listaDeTarefas');
    
    listaLocalStorage = JSON.parse( listaLocalStorage )

    console.log("trListaDeTarefas");
    console.log(trListaDeTarefas);

    console.log("listar()")
    console.log("listaLocalStorage");
    console.log(listaLocalStorage);
    
    trListaDeTarefas.innerHTML = "";
    

    listaLocalStorage.forEach(function(tarefa, key) {        
        trListaDeTarefas.innerHTML += `
            <tr>
                <td>${tarefa.titulo} - Key: ${key}</td>
            </tr>
        `;    
    });
}


function remover(){

    var listStorage = localStorage.getItem("listaDeTarefas");
    var objStorage = JSON.parse( listStorage )
    console.log("Remover");
    console.log( listStorage )
    console.log( objStorage )

    objStorage.splice(0,1);

    localStorage.setItem("listaDeTarefas", JSON.stringify( objStorage ) )
    listar()
    //listaLocalStorage.splice(0,1)
}
