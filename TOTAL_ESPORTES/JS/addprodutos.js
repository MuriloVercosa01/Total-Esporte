//função para alterar a preview conforme inserção do input

function iniciarpreview(){
    /*
    const elementos = document.querySelectorAll('[oninput]');
    
    elementos.forEach((elemento)=> {
        
        const idElemento = elemento.id;
        const vlrElemento = elemento.value;
        
        alterarPreview(vlrElemento , idElemento);
    });*/
    console.log("chama");
    alterarPreview( 'img' , 'preview_img' );
    alterarPreview( 'modelo' , 'preview_modelo' );
    alterarPreview( 'categoria' , 'preview_categoria' );
    alterarPreview( 'subcategoria' , 'preview_subcategoria' );
    alterarPreview( 'desc' , 'preview_desc' );
    alterarPreview( 'valor' , 'preview_valor' );
}

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

//window.onload = iniciarpreview;
document.addEventListener("DOMContentLoaded", iniciarpreview);