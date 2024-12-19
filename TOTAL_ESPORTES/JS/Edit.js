

// função para que ao clicar em edit o texto se torne um input na página: "painelDeProdutos.php"

     async function EditText(button){

        const tr = button.closest('tr');
        const td = tr.querySelector("td:nth-child(2)");
        const p = td.querySelector('.edit_text');
        const id = tr.querySelector('td').innerText;

        if (button.innerText === "Editar"){
            
            if ( tr.classList.contains('produto') ){
                function redirecionar(url) {
                    window.location.href = url;
                }
                redirecionar("http://localhost/Total-Esporte/TOTAL_ESPORTES/addprodutos.php?id=" + id);
                console.log("redirecionou");
            }

            const input = document.createElement('input');
            input.value = p.innerText;

            td.replaceChild(input, p);

            button.innerText = "Salvar";

        } else{ //caso o conteudo do botão não seja "editar".
            const novop = document.createElement('p');
            novop.classList.add('edit_text');
            novop.innerText = td.querySelector('input').value

            td.replaceChild(novop, td.querySelector('input'));

            button.innerText = "Editar"

            const categoria = novop.innerText;

                let requi;
                if (tr.classList.contains('categoria')) {
                    requi = `categoria=${encodeURIComponent(categoria)}&id_categoria=${encodeURIComponent(id)}`;
                } else if (tr.classList.contains('subcategoria')) {
                    requi = `subcategoria=${encodeURIComponent(categoria)}&id_subcategoria=${encodeURIComponent(id)}`;
                } else {
                    throw new Error('Condição desconhecida');
                }

                try{
                    const response = await                 fetch('Conexao/salvarEdit.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: requi
                    });
                    const data = await response.json();

                    if( data.success){
                        console.log("texto editado e salvo com sucesso");
                    }else{
                        console.error('Erro para salvar edicao:' , data.message);
                    }
                    
                } catch(error){
                    console.erro('erro ao salvar edição:', error);
                }
            }
            
         
    }
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click',function(){
            EditText(this);
        })
    });