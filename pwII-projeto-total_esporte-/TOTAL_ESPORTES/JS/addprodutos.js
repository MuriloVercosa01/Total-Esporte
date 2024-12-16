//função para alterar a preview conforme inserção do input

function alterarPreview( inputId , elementoId ){
    var inputValor = document.getElementById(inputId).value;

    switch( inputId ){
        case "img":
            document.getElementById(elementoId).src = inputValor;
        break;

        case "subcategoria":
            var selectElement = document.getElementById("subcategoria"); // Obtém o <select> pelo ID
            var textoSelecionado = selectElement.options[selectElement.selectedIndex].text;
            document.getElementById(elementoId).innerText = textoSelecionado;
        break;
        default:
            document.getElementById(elementoId).textContent = inputValor;        
    }



}