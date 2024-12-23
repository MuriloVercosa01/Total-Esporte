// função para que ao clicar em delete seja deletada a linha na página: "painelDeProdutos.php"

async function deleteColum(button) {

    const tr = button.closest('tr');
    const td = tr.querySelector("td:nth-child(1)");
    const id = td.querySelector('p').textContent.trim();

    let requi;

    if (tr.classList.contains('categoria')) {
        requi = `id_categoria=${encodeURIComponent(id)}`;
    } else if (tr.classList.contains('subcategoria')) {
        requi = `id_subcategoria=${encodeURIComponent(id)}`;
    } else if (tr.classList.contains('produto')) {
        requi = `id_produto=${encodeURIComponent(id)}`
    } else {
        requi = console.error("nenhum categoria válida encontrada");
        return;
    }

    /*const requi = tr.classList.contains('subcategoria') //verifica se é categoria ou subcategoria
            ? `id_subcategoria=${encodeURIComponent(id)}`
            : `id_categoria=${encodeURIComponent(id)}`;*/

    if (requi) {
        try{
            const response = await fetch('Conexao/editDelete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: requi
            });
            if(!response.ok){
                throw new Error(`Erro ao realizar requisição: ${response.status} `);
            }
            const data = await response.json();

            console.log(data);

            window.location.reload();

            return data;
        } catch(error){
            console.error("erro ao deletar:", error);
        }
    }
}
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
        deleteColum(this);
    })
});