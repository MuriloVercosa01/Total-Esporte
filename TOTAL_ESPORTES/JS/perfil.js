
console.log("Arquivo JS carregado com sucesso!");
console.log("conexao com arquivo js");
console.log(email_user);

 async function editarPerfil(button){

    const container = button.closest('div');
    const coluna = container.className;
    const texto = container.querySelector('.text');
    const input = document.createElement('input');
    const txtSalvo = document.createElement('h4');
    

    if(button.innerText == "Edt"){
        
        input.value = texto.innerText;
        input.className = "text";

        container.replaceChild(input, texto);

        button.innerText = "Salvar";
        console.log("o if Edt funcionou com sucesso!");
    }else if(button.innerText == "Salvar"){
        txtSalvo.innerText = texto.value;
        txtSalvo.className = "text";
        container.replaceChild(txtSalvo , texto);
        
        button.innerText = "Edt"
        console.log("o else if Salvar funcionou com sucesso!");
        requi = `coluna=${encodeURIComponent(coluna)}&dado=${txtSalvo.innerText}&emailuser=${email_user}`;
        try{
            const response = await fetch('Conexao/perfilSalvar.php',{
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: requi
            });
            const data = await response.json();
            // window.location = "Conexao/perfilSalvar.php";
            if(data.sucess){
                console.log("Edição salva com sucesso", data.message);
            }else{
                
                console.log("Erro ao salvar edicao, dentro de try", data.message);
            }
        } catch(error){
            console.error("erro ao salvar edicao no banco de dados", error);
        }
    }
}

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener("click" , function(){
        editarPerfil(this);
    })
})