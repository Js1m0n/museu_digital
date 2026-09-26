<!-- Importação dos ícones do Font Awesome (Instagram, Facebook, E-mail, WhatsApp) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Estilos do Rodapé */
    .footer-site {
        background-color: #382112; /* Tom de castanho escuro idêntico à imagem */
        color: #ffffff;
        padding: 30px 40px;
        margin-top: 50px;
        border-radius: 12px 12px 0 0; /* Cantos superiores arredondados */
        font-family: sans-serif;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Coluna Esquerda: Logótipo, Ícones e Descrição */
    .footer-col-esq {
        flex: 2;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
    }

    .footer-logo i.fa-cross, .footer-logo span.cross-icon {
        font-size: 1.8em;
        border: 2px solid #fff;
        border-radius: 50%;
        padding: 4px 8px;
    }

    .footer-logo h3 {
        margin: 0;
        font-size: 1.5em;
        font-weight: bold;
        font-family: 'Georgia', serif;
    }

    .footer-sociais {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
    }

    .footer-sociais a {
        color: #ffffff;
        font-size: 1.3em;
        text-decoration: none;
        transition: opacity 0.2s;
    }

    .footer-sociais a:hover {
        opacity: 0.8;
    }

    .footer-descricao {
        font-size: 0.9em;
        line-height: 1.6;
        color: #e0e0e0;
        margin: 0;
        text-align: justify;
    }

    /* Coluna Direita: Links de Navegação */
    .footer-col-dir {
        flex: 1;
        display: flex;
        justify-content: flex-end;
    }

    .footer-links {
        list-style-type: disc;
        padding-left: 20px;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 8px;
        color: #ffffff;
    }

    .footer-links a {
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
        font-size: 1em;
    }

    .footer-links a:hover {
        text-decoration: underline;
    }

    /* Responsividade para ecrãs mais pequenos */
    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
        }
        .footer-col-dir {
            justify-content: flex-start;
        }
    }
</style>

<footer class="footer-site">
    <div class="footer-container">
        <!-- Coluna da Esquerda -->
        <div class="footer-col-esq">
            <div class="footer-logo">
                <span class="cross-icon">&#x271d;</span>
                <h3>Museu Digital Missioneiro</h3>
            </div>
            
            <div class="footer-sociais">
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" title="E-mail"><i class="fas fa-envelope"></i></a>
                <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>

            <p class="footer-descricao">
                O Museu Digital Missioneiro é uma plataforma interativa criada para preservar e divulgar a história e o patrimônio cultural da região missioneira. O site reúne documentos, imagens e informações organizadas em um espaço acessível, moderno e seguro, garantindo que o conhecimento histórico seja valorizado e compartilhado com diferentes gerações.
            </p>
        </div>

        <!-- Coluna da Direita -->
        <div class="footer-col-dir">
            <ul class="footer-links">
                <li><a href="#">mapa</a></li>
                <li><a href="#">Fotografias</a></li>
                <li><a href="#">Fontes</a></li>
                <li><a href="#">Cidades</a></li>
                <li><a href="index.php">home</a></li>
            </ul>
        </div>
    </div>
</footer>