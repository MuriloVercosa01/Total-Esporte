    var categoria = document.getElementById('cate');
    var subcategoria = document.getElementById('sub');
    var inputsublabel = document.getElementsByClassName('classeinput')[0];
    var inputsub = document.getElementsByClassName('classeinput')[1];

    subcategoria.addEventListener('change', function(){
        if(subcategoria.checked){
            inputsublabel.style.display = "block";
            inputsub.style.display = "block";
        }
    })
    categoria.addEventListener('change', function(){
        if(categoria.checked){
            inputsub.style.display = "none";
            inputsublabel.style.display = "none";
            inputsub.value = "";
        }
    })
