<?php
include("conecta.php");

$matricula = $_POST["matricula"];
$nome = $_POST["nome"];

$comando = $pdo->prepare("INSERT INTO usuario(nome,matricula) VALUES ('$nome', '$matricula')");
$resultado = $comando->execute();


// O trecho abaixo pode estar dentro de um WHILE para guardar a resposta de um SELECT por exemplo
// Neste exemplo estamos apenas devolvendo o que o usuário digitou no formulário

$empregados = [];  // Variável usada para guardar os dados acima no formato JSON.

$resposta = 
      [
            "matricula" => $matricula,
            "nome"  => $nome
      ];

array_push($empregados, $resposta);
// Até aqui ficaria dentro do WHILE.

// Ao sair do WHILE enviamos de volta para a função JavaScript no formato JSON:
$json_texto = json_encode(["empregados" => $empregados]);

echo($json_texto);  // Será retornado para dentro do "success" do arquivo index.html

?>