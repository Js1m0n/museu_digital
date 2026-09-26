# Museu Digital - Projeto Acadêmico

## Descrição
Aplicação web desenvolvida para a apresentação do acervo e história de municípios e peças históricas.

## Tecnologias Utilizadas
- PHP
- MySQL / MariaDB (via phpMyAdmin / XAMPP)
- HTML5 / CSS3
- Google Maps Embed API

## Estrutura do Projeto
- `index.php`: Página principal com a listagem do acervo.
- `detalhes.php`: Página de detalhes de cada item/município (galeria, mapa e histórico).
- `conexao.php`: Script de ligação à base de dados.
- `rodape.php`: Componente de rodapé.
- `imagens/`: Ficheiros de imagem e galeria.
- `museu_digital.sql`: Script SQL para importação da base de dados.

## Instruções de Instalação e Execução
1. Abra o phpMyAdmin e crie a base de dados `museu_digital`.
2. Importe o ficheiro `museu_digital.sql` para a base de dados criada.
3. Mova a pasta `museu` para o diretório `htdocs` do XAMPP.
4. Certifique-se de que os serviços Apache e MySQL estão em execução.
5. Aceda no navegador a: `http://localhost/museu/index.php`.
