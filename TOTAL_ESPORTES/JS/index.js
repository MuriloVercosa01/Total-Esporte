// JavaScript para exibir/ocultar o menu suspenso
document.addEventListener('DOMContentLoaded', () => {
    const botaoPerfil = document.getElementById('botao-perfil');
    const perfil = document.querySelector('.perfil');

    botaoPerfil.addEventListener('click', () => {
        perfil.classList.toggle('mostrar');
    });

    // Fechar o menu ao clicar fora dele
    window.addEventListener('click', (evento) => {
        if (!perfil.contains(evento.target)) {
            perfil.classList.remove('mostrar');
        }
    });
});
