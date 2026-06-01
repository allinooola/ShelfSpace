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


// =========================
// DADOS DA PÁGINA LIDOS - LIVROS
// =========================
const livros = {
    hp1: {
        titulo: "Harry Potter e a Pedra Filosofal",
        autor: "J.K. Rowling",
        nota: "★★★★☆ 4,47/5",
        capa: "images/hp1.jpg",
        sinopse: "Harry Potter é um garoto órfão que vive uma vida triste com seus tios. No dia de seu aniversário de 11 anos, descobre que é um bruxo e é levado para Hogwarts, onde faz amigos, aprende feitiços e começa a entender seu passado. Porém, um mistério envolvendo uma pedra poderosa e o retorno de Voldemort ameaça tudo."
    },
    hp2: {
        titulo: "Harry Potter e a Câmara Secreta",
        autor: "J.K. Rowling",
        nota: "★★★★☆ 4,43/5",
        capa: "images/hp2.jpg",
        sinopse: "No segundo ano em Hogwarts, alunos aparecem petrificados e mensagens misteriosas surgem nas paredes. Harry, Rony e Hermione tentam descobrir quem está por trás dos ataques, enquanto Harry lida com uma ligação cada vez mais sombria com o passado de Hogwarts."
    },
    hp3: {
        titulo: "Harry Potter e o Prisioneiro de Azkaban",
        autor: "J.K. Rowling",
        nota: "★★★★★ 4,58/5",
        capa: "images/hp3.jpg",
        sinopse: "O mundo bruxo fica em alerta quando Sirius Black foge de Azkaban. Harry precisa enfrentar os dementadores e descobre segredos importantes sobre sua família e sobre a noite em que seus pais morreram."
    },
    hp4: {
        titulo: "Harry Potter e o Cálice de Fogo",
        autor: "J.K. Rowling",
        nota: "★★★★★ 4,57/5",
        capa: "images/hp4.jpg",
        sinopse: "Hogwarts recebe o Torneio Tribruxo e Harry é misteriosamente escolhido para participar. Enquanto enfrenta provas perigosas, descobre que o retorno de Voldemort pode estar mais próximo do que todos imaginam."
    },
    hp5: {
        titulo: "Harry Potter e a Ordem da Fênix",
        autor: "J.K. Rowling",
        nota: "★★★★★ 4,50/5",
        capa: "images/hp5.jpg",
        sinopse: "Harry tenta avisar o mundo bruxo de que Voldemort voltou, mas o Ministério se recusa a acreditar. Sentindo-se isolado, ele decide ensinar Defesa Contra as Artes das Trevas em segredo enquanto a Ordem da Fênix se organiza."
    },
    hp6: {
        titulo: "Harry Potter e o Enigma do Príncipe",
        autor: "J.K. Rowling",
        nota: "★★★★★ 4,58/5",
        capa: "images/hp6.jpg",
        sinopse: "Com Voldemort de volta, Dumbledore revela a Harry detalhes sobre o passado do inimigo e como ele pode ser derrotado. O livro aprofunda os segredos das Horcruxes e prepara Harry para uma missão muito maior."
    },
    hp7: {
        titulo: "Harry Potter e as Relíquias da Morte",
        autor: "J.K. Rowling",
        nota: "★★★★★ 4,62/5",
        capa: "images/hp7.jpg",
        sinopse: "Harry, Rony e Hermione deixam Hogwarts para encontrar e destruir as Horcruxes de Voldemort. A história leva ao confronto final, revelando verdades sobre sacrifício, amizade e o verdadeiro significado da coragem."
    },
    jantarsec: {
        titulo: "Jantar Secreto",
        autor: "Raphael Montes",
        nota: "★★★★☆ 4,10/5",
        capa: "images/jantarsec.jpg",
        sinopse: "Um grupo de jovens decide organizar jantares secretos para uma clientela rica e exclusiva. O que começa como uma saída desesperada para ganhar dinheiro se transforma em uma sequência de crimes e escolhas cada vez mais grotescas."
    },
    eros1: {
        titulo: "Eros: À Primeira Vista",
        autor: "Ruth Oliveira",
        nota: "★★★★★ 4,50/5",
        capa: "images/eros1.jpg",
        sinopse: "Juno King conhece Haru Goo em uma noite caótica e conclui que ele é exatamente o tipo de pessoa de quem deveria manter distância. Mesmo assim, Haru desperta nele sentimentos inesperados e faz Juno encarar desejos e inseguranças que nunca havia considerado antes."
    },
    eros2: {
        titulo: "Eros: Em Todas as Nuances",
        autor: "Ruth Oliveira",
        nota: "★★★★★ 4,60/5",
        capa: "images/eros2.jpg",
        sinopse: "Juno e Haru estão cada vez mais próximos. As inseguranças que antes impediam os dois de se entregarem começam a enfraquecer, e a relação se aprofunda mostrando o amor em suas várias nuances."
    },
    cc1: {
        titulo: "Cem Chances: Posição Inicial",
        autor: "Ruth Oliveira",
        nota: "★★★★★ 4,65/5",
        capa: "images/cc1.jpg",
        sinopse: "Killian Pascal acredita ser completamente diferente de Dominic Himalia. Depois que esse desafeto leva a um acidente fatal, o arrependimento muda tudo. Uma história marcada por dor, redenção e segundas chances."
    },
    cc2: {
        titulo: "Cem Chances: Tempo Regressivo",
        autor: "Ruth Oliveira",
        nota: "★★★★★ 4,62/5",
        capa: "images/cc2.jpg",
        sinopse: "A vida de Killian parece ganhar um novo ritmo após o estranho 21 de outubro. Mas o tempo está acabando e ele precisa lidar com as consequências das escolhas feitas e com os sentimentos por Dominic."
    },
    cc3: {
        titulo: "Cem Chances: Frequência Final",
        autor: "Ruth Oliveira",
        nota: "★★★★★ 4,70/5",
        capa: "images/cc3.jpg",
        sinopse: "Killian e Dominic finalmente descobrem parte do mistério que cerca suas vidas. Agora precisam encarar as consequências das decisões tomadas em uma história marcada por amor, dor, tempo e recomeços."
    },
    croack: {
        titulo: "Croack!: Um Eco de Resistência",
        autor: "Mel Ikus",
        nota: "★★★★☆ 4,30/5",
        capa: "images/croack.jpg",
        sinopse: "Gustavo Gusmão trabalha em uma ONG pelos direitos dos híbridos. Tudo muda quando ele descobre que será responsável por Vítor, um híbrido de sapo. A história mistura romance, ativismo, preconceito e resistência."
    },
    comoeraantes: {
        titulo: "Como Eu Era Antes de Você",
        autor: "Jojo Moyes",
        nota: "★★★★☆ 4,27/5",
        capa: "images/comoeraantes.jpg",
        sinopse: "Louisa Clark aceita trabalhar como cuidadora de Will Traynor, um homem rico e tetraplégico. A convivência difícil se transforma em uma relação que muda profundamente a forma como os dois enxergam o mundo."
    },
    eassimqueacaba: {
        titulo: "É Assim que Acaba",
        autor: "Colleen Hoover",
        nota: "★★★★☆ 4,07/5",
        capa: "images/eassimqueacaba.jpg",
        sinopse: "Lily Bloom conhece Ryle Kincaid e acredita ter encontrado alguém especial. Porém, conforme o relacionamento avança, ela percebe sinais dolorosos de abuso. Quando seu primeiro amor reaparece, Lily precisa tomar decisões difíceis."
    },
    "eassimquecomeça": {
        titulo: "É Assim que Começa",
        autor: "Colleen Hoover",
        nota: "★★★★☆ 3,89/5",
        capa: "images/eassimquecomeça.jpg",
        sinopse: "Lily tenta reconstruir sua vida enquanto divide a guarda da filha com Ryle. Quando reencontra Atlas, ela vê a chance de viver um relacionamento mais leve, mas Ryle não aceita facilmente essa reaproximação."
    },
    umasegundachance: {
        titulo: "Uma Segunda Chance",
        autor: "Colleen Hoover",
        nota: "★★★★★ 4,56/5",
        capa: "images/umasegundachance.jpg",
        sinopse: "Kenna Rowan passa cinco anos na prisão por um acidente trágico. Ao ser libertada, volta com um único desejo: reencontrar a filha. Em meio à culpa e rejeição, conhece Ledger Ward, alguém ligado ao passado que ela tenta enfrentar."
    },
    assassinato: {
        titulo: "Assassinato no Expresso do Oriente",
        autor: "Agatha Christie",
        nota: "★★★★☆ 4,20/5",
        capa: "images/assassinato.jpg",
        sinopse: "Hercule Poirot embarca no Expresso do Oriente. Durante a viagem, o trem fica preso na neve e um passageiro é encontrado morto. Poirot inicia uma investigação cheia de pistas e contradições para descobrir o assassino."
    },
    enaosobrou: {
        titulo: "E Não Sobrou Nenhum",
        autor: "Agatha Christie",
        nota: "★★★★☆ 4,28/5",
        capa: "images/enaosobrou.jpg",
        sinopse: "Dez pessoas são convidadas para uma ilha isolada e começam a morrer uma por uma, seguindo a lógica de um poema infantil. Presas e sem saber em quem confiar, precisam descobrir o assassino antes que não sobre ninguém."
    },
    letargia: {
        titulo: "Letargia",
        autor: "Triz Parizotto",
        nota: "★★★★★ 5/5",
        capa: "images/letargia.jpg",
        sinopse: "Uma coletânea de quatro contos de terror que exploram horror corporal, psicológico, sobrenatural e existencial. A obra une horror, filosofia e humor, costurando a beleza e o bizarro, a vida e a morte."
    },
    hipotese: {
        titulo: "A Hipótese do Amor",
        autor: "Ali Hazelwood",
        nota: "★★★★★ 5/5",
        capa: "images/hipotese.jpg",
        sinopse: "Olive Smith inventa um namoro de mentira e acaba beijando Adam Carlsen, um professor temido pelos alunos. Para surpresa de Olive, Adam aceita participar da farsa. O que começa como um experimento logo se torna algo muito mais intenso."
    },
    amorteoricamente: {
        titulo: "Amor, Teoricamente",
        autor: "Ali Hazelwood",
        nota: "★★★★★ 5/5",
        capa: "images/amorteoricamente.jpg",
        sinopse: "Elsie Hannaway vive tentando se adaptar ao que as pessoas esperam dela. Sua vida parece sob controle até Jack Smith aparecer — o irmão de um de seus clientes e um obstáculo para o emprego dos sonhos de Elsie."
    },
    principecruel: {
        titulo: "O Príncipe Cruel",
        autor: "Holly Black",
        nota: "★★★★★ 5/5",
        capa: "images/principecruel.jpg",
        sinopse: "Jude tinha sete anos quando foi levada para viver no Reino das Fadas. Dez anos depois, ela deseja conquistar seu lugar naquele mundo, mas o príncipe Cardan se opõe a ela. Uma história de intrigas, traições e disputas de poder."
    }
};

// =========================
// FUNÇÕES DO MODAL PÁGINA LIDOS
// =========================
function abrirModal(id) {
    const livro = livros[id];
    if (!livro) return;

    // Preenche o modal com os dados do livro usando getElementById + innerHTML
    document.getElementById("modal-capa").src = livro.capa;
    document.getElementById("modal-capa").alt = livro.titulo;
    document.getElementById("modal-titulo").innerHTML = livro.titulo;
    document.getElementById("modal-autor").innerHTML = livro.autor;
    document.getElementById("modal-nota").innerHTML = livro.nota;
    document.getElementById("modal-sinopse").innerHTML = livro.sinopse;

    // Exibe o modal
    document.getElementById("modal-livro").style.display = "flex";
}

function fecharModal(event) {
    const overlay = document.getElementById("modal-livro");
    // Fecha se clicar no fundo escuro ou no botão X
    if (!event || event.target === overlay) {
        overlay.style.display = "none";
    }
}