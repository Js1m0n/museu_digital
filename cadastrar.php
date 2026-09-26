<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $data_historica = $conn->real_escape_string($_POST['data_historica']);
    $imagem_url = $conn->real_escape_string($_POST['imagem_url']);

    $sql = "INSERT INTO acervo (titulo, descricao, data_historica, imagem_url) VALUES ('$titulo', '$descricao', '$data_historica', '$imagem_url')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registar - Museu Digital</title>
    <style>
        body { font-family: 'Georgia', serif; background-color: #3b2818; color: #fcebd5; padding: 20px; }
        .container { max-width: 600px; margin: 40px auto; background: #4a3319; padding: 30px; border-radius: 8px; border: 1px solid #634321; }
        h2 { text-align: center; color: #e4b56c; border-bottom: 1px solid #634321; padding-bottom: 10px; }
        label { font-weight: bold; margin-top: 15px; display: block; color: #c8955a; }
        input, textarea { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; background: #fcebd5; border: none; border-radius: 4px; }
        button { width: 100%; padding: 15px; background: #c8955a; color: #21150c; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 20px; }
        button:hover { background: #e4b56c; }
        .voltar { display: block; text-align: center; margin-top: 20px; color: #c8955a; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adicionar ao Acervo</h2>
        <form method="POST" action="">
            <label>Título (Ex: Igreja Matriz, Ruínas):</label>
            <input type="text" name="titulo" required>

            <label>Local / Período Histórico:</label>
            <input type="text" name="data_historica" required>
            
            <label>Link da Imagem (URL da internet):</label>
            <input type="text" name="imagem_url" placeholder="http://...">

            <label>Histórico / Lendas / Relatos:</label>
            <textarea name="descricao" rows="6" required></textarea>

            <button type="submit">Guardar Registros</button>
        </form>
        <a href="index.php" class="voltar">← Voltar ao Museu</a>
    </div>
</body>
</html>