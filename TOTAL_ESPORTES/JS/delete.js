// função para que ao clicar em delete seja deletada a linha na página: "painelDeProdutos.php"

function deleteColum(button){

    const tr = button.closest('tr');
    const td = tr.querySelector("td:nth-child(1)");
    const id = td.querySelector('p').textContent.trim();

    const requi = tr.classList.contains('subcategoria') //verifica se é categoria ou subcategoria
            ? `id_subcategoria=${encodeURIComponent(id)}`
            : `id_categoria=${encodeURIComponent(id)}`;

            fetch('Conexao/editDelete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: requi
            })
            .then(response => {
                return response.text(); // Lê a resposta como texto
            })
            .then(data => {
                console.log(data); // Exibe a resposta para depuração
                try {
                    const parsedData = JSON.parse(data); // Tenta converter em JSON
                    if (parsedData.success) {
                        console.log("linha removida com sucesso!");
                        tr.remove();  // Remove a linha da tabela
                        
                    } else {
                        console.error("Erro ao salvar texto:", parsedData.message);
                    }
                } catch (error) {
                    console.error("Erro ao parsear o JSON:", error);
                    console.log("Resposta do servidor:", data);
                }
            })
            .catch(error => console.error('Erro de rede:', error));                   

        
        
     
}
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click',function(){
        deleteColum(this);
    })
});