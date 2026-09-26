<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Cidade - Museu Digital</title>
    <style>
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
        
        .container { 
            max-width: 800px; 
            margin: 40px auto; 
            padding: 30px; 
            background: #4a3319; 
            border: 1px solid #634321; 
            border-radius: 8px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.6); 
        }
        
        .btn-voltar { 
            display: inline-block; padding: 10px 20px; background: #c8955a; color: #21150c; 
            text-decoration: none; font-weight: bold; border-radius: 4px; margin-bottom: 30px;
            text-transform: uppercase; font-family: sans-serif;
        }
        .btn-voltar:hover { background: #e4b56c; }
        
        .img-destaque {
            width: 100%; 
            height: 400px; 
            object-fit: contain; 
            background-color: #21150c; 
            border-radius: 8px; 
            border: 2px solid #c8955a;
            margin-bottom: 20px;
        }
        
        h2 { color: #e4b56c; font-size: 2.5em; border-bottom: 1px solid #634321; padding-bottom: 15px; margin-top: 0; }
        .data { font-size: 1.2em; color: #c8955a; font-style: italic; font-weight: bold; }
        .texto-descricao { line-height: 1.8; text-align: justify; font-size: 1.1em; }

        /* Estilos do Bloco HISTÓRICO */
        .sessao-historico {
            margin-top: 40px;
        }

        .historico-card {
            background-color: #21150c;
            border: 2px solid #c8955a;
            border-radius: 12px;
            padding: 25px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .historico-card h2 {
            color: #ffffff;
            font-size: 2.2em;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 2px solid #c8955a;
            padding-bottom: 10px;
        }

        .historico-lista {
            list-style-type: disc;
            padding-left: 20px;
            margin: 0;
            color: #fcebd5;
            line-height: 1.8;
            font-size: 1.05em;
        }

        .historico-lista li {
            margin-bottom: 12px;
        }

        .historico-lista strong {
            color: #e4b56c;
            text-transform: uppercase;
        }

        /* Estilos do Mapa */
        .sessao-mapa {
            margin-top: 40px;
        }

        .sessao-mapa h2 {
            color: #e4b56c;
            font-size: 2em;
            margin-bottom: 15px;
            border-bottom: 1px solid #634321;
            padding-bottom: 10px;
        }

        .mapa-card {
            background-color: #21150c;
            border: 2px solid #c8955a;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .mapa-card iframe {
            width: 100%;
            height: 350px;
            border: 0;
            border-radius: 8px;
        }

        /* Estilos da Galeria de Imagens */
        .sessao-galeria {
            margin-top: 50px;
            padding-top: 20px;
        }

        .sessao-galeria h2 {
            text-align: center;
            color: #ffffff;
            font-size: 2.5em;
            margin-bottom: 30px;
            border-bottom: none;
        }

        .container-mosaico {
            border-left: 2px solid #e4b56c; 
            padding-left: 15px;
        }

        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr); 
            grid-auto-rows: 200px; 
            gap: 10px;
        }

        .galeria-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
            background-color: #21150c;
        }

        .span-2 { grid-column: span 2; }
        .span-4 { grid-column: span 4; }
        .span-3 { grid-column: span 3; }
        .span-1 { grid-column: span 1; }

        @media (max-width: 768px) {
            .galeria-grid { grid-template-columns: 1fr; }
            .span-2, .span-4, .span-3, .span-1 { grid-column: span 1; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Museu Digital</h1>
    </header>
    
    <div class="container">
        <a href="index.php" class="btn-voltar">&larr; Voltar ao Acervo</a>
        
        <?php
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            
            $sql = "SELECT * FROM acervo WHERE id = $id";
            $resultado = $conn->query($sql);
            
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                
                $img = !empty($linha["imagem_url"]) ? $linha["imagem_url"] : 'https://via.placeholder.com/800x400/21150c/e4b56c?text=Sem+Imagem';
                
                // 1. Exibe as informações principais
                echo "<img src='" . htmlspecialchars($img) . "' class='img-destaque' alt='Imagem histórica'>";
                echo "<h2>" . htmlspecialchars($linha["titulo"]) . "</h2>";
                echo "<p class='data'>Local/Período: " . htmlspecialchars($linha["data_historica"]) . "</p>";
                echo "<div class='texto-descricao'>" . nl2br(htmlspecialchars($linha["descricao"])) . "</div>";
                
                // 2. Exibe o Bloco de HISTÓRICO (Tópicos)
                if (!empty($linha["historico"])) {
                    echo "<div class='sessao-historico'>";
                    echo "<div class='historico-card'>";
                    echo "<h2>HISTÓRICO</h2>";
                    echo "<ul class='historico-lista'>";
                    
                    // Divide o texto linha a linha e formata como tópicos
                    $linhas_historico = explode("\n", $linha["historico"]);
                    foreach ($linhas_historico as $item) {
                        $item = trim($item);
                        if (!empty($item)) {
                            if (strpos($item, ':') !== false) {
                                $partes = explode(':', $item, 2);
                                echo "<li><strong>" . htmlspecialchars(trim($partes[0])) . ":</strong> " . htmlspecialchars(trim($partes[1])) . "</li>";
                            } else {
                                echo "<li>" . htmlspecialchars($item) . "</li>";
                            }
                        }
                    }
                    
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                }

                // 3. Exibe o Mapa
                echo "<div class='sessao-mapa'>";
                echo "<h2>Localização</h2>";
                echo "<div class='mapa-card'>";
                $cidade_busca = urlencode($linha["titulo"] . ", RS, Brasil");
                echo "<iframe loading='lazy' allowfullscreen src='https://maps.google.com/maps?q=" . $cidade_busca . "&t=&z=12&ie=UTF8&iwloc=&output=embed'></iframe>";
                echo "</div>";
                echo "</div>";

                // 4. Exibe a Galeria Mosaico
                echo "<div class='sessao-galeria'>";
                echo "<h2>Imagens</h2>";
                echo "<div class='container-mosaico'>";
                echo "<div class='galeria-grid'>";
                
                $padrao_mosaico = ['span-2', 'span-2', 'span-2', 'span-2', 'span-4', 'span-2', 'span-3', 'span-1'];
                $pasta_galeria = "imagens/galeria/" . $linha["id"] . "/";
                
                if (is_dir($pasta_galeria)) {
                    $fotos = glob($pasta_galeria . "*.{jpg,jpeg,png}", GLOB_BRACE);
                    $i = 0;
                    
                    if (count($fotos) > 0) {
                        foreach ($fotos as $foto) {
                            $classe = $padrao_mosaico[$i % count($padrao_mosaico)];
                            echo "<img src='" . htmlspecialchars($foto) . "' class='" . $classe . "' alt='Foto de " . htmlspecialchars($linha["titulo"]) . "'>";
                            $i++;
                        }
                    } else {
                        echo "<p style='color:#e4b56c;'>A pasta existe, mas não tem fotos.</p>";
                    }
                } else {
                    echo "<p style='color:#e4b56c;'>Para exibir a galeria, crie a pasta <b>" . $pasta_galeria . "</b> e adicione as fotos lá dentro.</p>";
                }
                
                echo "</div>";
                echo "</div>";
                echo "</div>";

            } else {
                echo "<h2>Registo não encontrado.</h2>";
                echo "<p>A cidade que procura não existe no acervo ou foi apagada.</p>";
            }
        } else {
            echo "<h2>Nenhuma cidade selecionada.</h2>";
            echo "<p>Por favor, regresse ao acervo e clique numa cidade válida.</p>";
        }
        ?>
    </div>

    <?php include 'rodape.php'; ?>
</body>
</html>