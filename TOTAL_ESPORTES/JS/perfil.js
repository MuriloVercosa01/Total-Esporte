
console.log("Arquivo JS carregado com sucesso!");
console.log("conexao com arquivo js");
function editarPerfil(button){

    const container = button.closest('div');
    const text = container.querySelectorAll('h4');

    if(button.innerText == "Edt"){
        
        const input = document.createElement('input');
        input.innerText = text.innerText;

        container.replacechild(input, h4);

        button.innerText = "Salvar";
        console.log("o função editarPerfil foi executadaa!");
    }else{

    }
}

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener("click" , function(){
        editarPerfil(this);
    })
})