<?php
include 'conexao.php';

// Capturar os dados do formulário
$titulo = $_POST['title'];
$preco = $_POST['price'];
$descricao = $_POST['description'];
$unico_dono = $_POST['unique_owner'];
$marca = $_POST['brand'];
$modelo = $_POST['model'];
$quilometragem = $_POST['mileage'];
$data_compra = $_POST['purchase_date'];
$tipo_cambio = $_POST['gear'];
$opcionais = isset($_POST['optional']) ? implode(", ", $_POST['optional']) : "";
$imagens = [];

// Salvar imagens no servidor
foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $file_name = basename($_FILES['images']['name'][$key]);
    $target_path = "uploads/" . $file_name;
    move_uploaded_file($tmp_name, $target_path);
    $imagens[] = $target_path;
}

// Converter imagens para string
$imagens_str = implode(", ", $imagens);

// Inserir no banco
$sql = "INSERT INTO veiculos (titulo, preco, descricao, unico_dono, marca, modelo, quilometragem, data_compra, tipo_cambio, opcionais, imagens) 
        VALUES ('$titulo', '$preco', '$descricao', '$unico_dono', '$marca', '$modelo', '$quilometragem', '$data_compra', '$tipo_cambio', '$opcionais', '$imagens_str')";

if ($conexao->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}

$conexao->close();
?>