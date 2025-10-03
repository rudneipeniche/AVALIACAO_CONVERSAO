<!-- Criar um algoritmo em php que permita três tipos de conversão:
- Conversão de Real para Dólar
- Conversão de Real para Euro
- Conversão de Real para qualquer moeda que vocês escolherem
 
O usuário deverá informar o valor em real e escolher em qual moeda deseja ver a
conversão. Importante realizar todas as validações e impedir que erros ocorram.
 
Usar o conceito de function para validar as entradas, exibir as mensagens, e para
realizar a conversão.
 
Importante
- Entrega feita no GitHub
- O repositório deverá ter os seguintes commits
     - estruturação do html e estilização com css
     - criação da página php sem functions mas funcional
     - criação da função que valida entradas
     - criação da função que exibe a mensagem
     - criação da função que converte para dólar
     - criação da função que converte para euro
     - criação da função que converte para a moeda de sua escolha  -->

     

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valor = $_GET['valor'];
    $moeda = $_GET['moeda'];

    // Validação simples
    if (!is_numeric($valor) || $valor <= 0) {
        $mensagem = "Por favor, insira um valor válido em Reais.";
    } elseif (!in_array($moeda, ['dolar', 'euro', 'iene'])) {
        $mensagem = "Escolha uma moeda válida para conversão.";
    } else {
        // Conversão sem funções
        if ($moeda == 'dolar') {
            $resultado = $valor / 5.2;
            $mensagem = "R$ $valor equivalem a US$ " . number_format($resultado, 2);
        } elseif ($moeda == 'euro') {
            $resultado = $valor / 5.8;
            $mensagem = "R$ $valor equivalem a € " . number_format($resultado, 2);
        } elseif ($moeda == 'iene') {
            $resultado = $valor / 0.038;
            $mensagem = "R$ $valor equivalem a ¥ " . number_format($resultado, 2);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Conversão</title>
    <style>
        body { font-family: Arial; background-color: #f4f4f4; padding: 50px; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; }
        .resultado { background-color: #e2e3e5; padding: 10px; border-radius: 4px; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <h2>Resultado da Conversão</h2>
    <div class="resultado">
        <?php echo isset($mensagem) ? $mensagem : "Nenhuma conversão realizada."; ?>
    </div>
    <a href="index.html">Voltar</a>
</div>
</body>
</html>
