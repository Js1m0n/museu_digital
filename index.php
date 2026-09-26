<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museu Digital - Rota Missioneira</title>
    <style>
        /* Estilos do Carrossel */
        .carrossel { position: relative; max-width: 1000px; margin: 20px auto; overflow: hidden; border-radius: 8px; border: 2px solid #c8955a; box-shadow: 0 4px 15px rgba(0,0,0,0.6); }
        .slide { 
    display: none; 
    width: 100%; 
    height: 400px; 
    object-fit: contain; /* Mostra a imagem inteira sem cortes */
    background-color: #21150c; 
}
        .slide.ativo { display: block; }
        .botao-carrossel { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(33, 21, 12, 0.7); color: #e4b56c; border: none; padding: 15px; cursor: pointer; font-size: 24px; font-weight: bold; }
        .botao-carrossel:hover { background: #e4b56c; color: #21150c; }
        .prev { left: 10px; }
        .next { right: 10px; }

        /* Paleta de cores baseada no protótipo */
        body { 
            font-family: 'Georgia', serif; 
            background-color: #3b2818; 
            color: #fcebd5; 
            margin: 0; 
            padding: 0; 
        }
        header { 
            background-color: #21150c; 
            padding: 40px 20px; 
            text-align: center; 
            border-bottom: 4px solid #c8955a; 
        }
        header h1 { margin: 0; font-size: 2.5em; text-transform: uppercase; letter-spacing: 2px; color: #e4b56c; }
        header p { font-style: italic; color: #b59275; margin-top: 10px; }
        
        .container { max-width: 1000px; margin: 30px auto; padding: 20px; }
        
        .btn-add { 
            display: inline-block; padding: 10px 20px; background: #c8955a; color: #21150c; 
            text-decoration: none; font-weight: bold; border-radius: 4px; margin-bottom: 30px;
            text-transform: uppercase; font-family: sans-serif;
        }
        .btn-add:hover { background: #e4b56c; }
        
        .acervo-grid { display: flex; flex-direction: column; gap: 30px; }
        
        .item-acervo { 
            background: #4a3319; 
            border: 1px solid #634321; 
            border-radius: 8px; padding: 20px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.6);
            display: flex; gap: 25px; align-items: flex-start;
        }
        
        .item-img {
    width: 300px; 
    height: 220px; 
    object-fit: contain; /* Alterado de 'cover' para 'contain' para mostrar a imagem toda */
    background-color: #21150c;
    border-radius: 4px; 
    border: 2px solid #c8955a;
}
        
        .item-content { flex: 1; }
        .item-content h3 { color: #e4b56c; margin-top: 0; font-size: 1.8em; border-bottom: 1px solid #634321; padding-bottom: 10px; }
        .data { font-size: 1em; color: #c8955a; font-style: italic; font-weight: bold; }
        .texto-descricao { line-height: 1.6; text-align: justify; }
        
        @media (max-width: 768px) {
            .item-acervo { flex-direction: column; }
            .item-img { width: 100%; height: auto; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Museu Digital</h1>
        <p>Histórico | Cartografia | Lendas & Relatos</p>
    </header>
    
    <!-- Carrossel de Imagens -->
    <div class="carrossel">
        <!-- Apenas a primeira foto recebe o 'ativo' -->
        <img src="imagens/ruinas sm.jpg" class="slide ativo" alt="Imagem 1">
        <img src="imagens/praca slg.png" class="slide" alt="Imagem 2">
        <img src="imagens/praca pirapo.png" class="slide" alt="Imagem 3">
        <img src="imagens/igreja matriz slg.png" class="slide" alt="Imagem 4">
        <img src="imagens/igreja matriz pirapo.png" class="slide" alt="Imagem 5">
        <img src="imagens/frente prefeitura slg.png" class="slide" alt="Imagem 6">

        <button class="botao-carrossel prev" onclick="mudarSlide(-1)">&#10094;</button>
        <button class="botao-carrossel next" onclick="mudarSlide(1)">&#10095;</button>
    </div>

    <!--carrossel funcionar e rodar sozinho -->
    <script>
        let indexSlide = 0;
        let slides = document.querySelectorAll('.slide');

        function mudarSlide(n) {
            slides[indexSlide].classList.remove('ativo');
            indexSlide = (indexSlide + n + slides.length) % slides.length;
            slides[indexSlide].classList.add('ativo');
        }

        // carrossel sozinho a cada 3 segundos
        setInterval(() => mudarSlide(1), 3000);
    </script>
    
    <div class="container">
        <a href="cadastrar.php" class="btn-add">+ Adicionar ao Acervo</a>
        
        <div class="acervo-grid">
        <?php
        $sql = "SELECT * FROM acervo ORDER BY id DESC";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($linha = $resultado->fetch_assoc()) {
                echo "<div class='item-acervo'>";

                $img = !empty($linha["imagem_url"]) ? $linha["imagem_url"] : 'https://via.placeholder.com/300x220/21150c/e4b56c?text=Sem+Imagem';
                
                echo "<img src='" . htmlspecialchars($img) . "' class='item-img' alt='Imagem histórica'>";
                echo "<div class='item-content'>";
                echo "<h3><a href='cidade.php?id=" . $linha["id"] . "' style='color: #e4b56c; text-decoration: none;' onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">" . htmlspecialchars($linha["titulo"]) . "</a></h3>";
                echo "<p class='data'>Local/Período: " . htmlspecialchars($linha["data_historica"]) . "</p>";
                echo "<p class='texto-descricao'>" . nl2br(htmlspecialchars($linha["descricao"])) . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>O acervo ainda está vazio.</p>";
        }
        ?>
        </div>
    </div>
    <?php include 'rodape.php'; ?>
</body>
</html>