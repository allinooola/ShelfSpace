function scrollCarousel(direcao) {
    const carousel = document.getElementById("carousel");
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;

    if (direcao > 0 && carousel.scrollLeft >= maxScroll - 5) {
        carousel.scrollLeft = 0;
    } else if (direcao < 0 && carousel.scrollLeft <= 5) {
        carousel.scrollLeft = maxScroll;
    } else {
        carousel.scrollBy({ left: direcao * 300, behavior: "smooth" });
    }
}

// =========================
// VALIDAÇÃO DO FORMULÁRIO HTML
// =========================

// Seleciona o fomulário
const formulario = document.getElementById("reviewForm");

if (formulario) {
    formulario.addEventListener("submit", function(evento) {
        
        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const livro = document.getElementById("livro").value.trim();
        const autor = document.getElementById("autor").value.trim();
        const genero = document.getElementById("genero").value;
        const nota = document.getElementById("nota").value;
        const review = document.getElementById("review").value.trim();
        const confirmacao = document.getElementById("confirmacao").checked;
        const mensagemErro = document.getElementById("mensagemErro");

        mensagemErro.textContent = "";

        if (
            nome === "" &&
            email === "" &&
            livro === "" &&
            autor === "" &&
            genero === "" &&
            nota === "" &&
            review === "" &&
            !confirmacao
        ) {
            mensagemErro.textContent = "Por favor, preencha todas as informações acima!";
            evento.preventDefault();
            return;
        }

        if (nome === "") {
            mensagemErro.textContent = "Por favor, preencha seu nome.";
            evento.preventDefault();
            return;
        }

        if (nome.length < 3) {
            mensagemErro.textContent = "O nome deve ter pelo menos 3 caracteres.";
            evento.preventDefault();
            return;
        }

        if (email === "") {
            mensagemErro.textContent = "Por favor, preencha seu e-mail.";
            evento.preventDefault();
            return;
        }

        if (!email.includes("@") || !email.includes(".")) {
            mensagemErro.textContent = "Digite um e-mail válido.";
            evento.preventDefault();
            return;
        }

        if (livro === "") {
            mensagemErro.textContent = "Por favor, informe o título do livro.";
            evento.preventDefault();
            return;
        }

        if (autor === "") {
            mensagemErro.textContent = "Por favor, informe o nome do autor.";
            evento.preventDefault();
            return;
        }

        if (genero === "") {
            mensagemErro.textContent = "Por favor, selecione um gênero.";
            evento.preventDefault();
            return;
        }

        if (nota === "") {
            mensagemErro.textContent = "Por favor, selecione uma nota.";
            evento.preventDefault();
            return;
        }

        if (review === "") {
            mensagemErro.textContent = "Por favor, escreva sua review.";
            evento.preventDefault();
            return;
        }

        if (review.length < 20) {
            mensagemErro.textContent = "A review deve ter pelo menos 20 caracteres.";
            evento.preventDefault();
            return;
        }

        if (!confirmacao) {
            mensagemErro.textContent = "Você precisa confirmar o envio da review.";
            evento.preventDefault();
            return;
        }
    });
}


// =========================
// FORM ACTION - RECUPERAÇÃO DOS DADOS VIA GET
// =========================

// Seleciona o card de resultado — só executa se estiver na página formAction.html
const resultadoCard = document.querySelector('.resultado-card');

if (resultadoCard) {

    document.addEventListener('DOMContentLoaded', function() {

        // URLSearchParams lê tudo que veio depois do "?" na URL
        const params = new URLSearchParams(window.location.search);

        // params.get() pega o valor de cada campo pelo name do formulário
        const nome   = params.get("nome");
        const email  = params.get("email");
        const livro  = params.get("livro");
        const autor  = params.get("autor");
        const genero = params.get("genero");
        const nota   = params.get("nota");
        const review = params.get("review");

        // Segurança: se não veio nenhum dado, avisa o usuário
        if (!nome && !livro) {
            resultadoCard.innerHTML =
                '<div class="aviso-erro">' +
                '<p>Nenhum dado encontrado.</p>' +
                '<p><a href="form.html">Voltar ao formulário</a></p>' +
                '</div>';
            return;
        }

        // getElementById + innerHTML 
        document.getElementById("resultado-nome").innerHTML   = nome;
        document.getElementById("resultado-email").innerHTML  = email;
        document.getElementById("resultado-livro").innerHTML  = livro;
        document.getElementById("resultado-autor").innerHTML  = autor;
        document.getElementById("resultado-genero").innerHTML = genero;
        document.getElementById("resultado-review").innerHTML = review;

        // Transforma a nota em estrelinhas usando laço for
        const notaNumero = parseInt(nota);
        let estrelas = "";
        for (let i = 1; i <= 5; i++) {
            if (i <= notaNumero) {
                estrelas += "★";
            } else {
                estrelas += "☆";
            }
        }
        document.getElementById("resultado-nota").innerHTML = estrelas + " (" + notaNumero + "/5)";

    });
}