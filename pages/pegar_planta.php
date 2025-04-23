<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION["usuario_id"])) {
    echo json_encode(["mensagem" => "Você precisa estar logado para pegar esta planta."]);
    exit;
}

$dados = json_decode(file_get_contents("php://input"), true);
$especie_id = $dados["especie_id"];
$usuario_id = $_SESSION["usuario_id"];

$conn = new mysqli("localhost", "root", "", "jardim_botanico");
if ($conn->connect_error) {
    echo json_encode(["mensagem" => "Erro ao conectar ao banco."]);
    exit;
}

// Já pegou?
$check = $conn->prepare("SELECT id FROM plantas_pegas WHERE usuario_id = ? AND especie_id = ?");
$check->bind_param("is", $usuario_id, $especie_id);
$check->execute();
$resultado = $check->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(["mensagem" => "Você já pegou essa planta!"]);
    exit;
}

// Inserir com 10 pontos
$stmt = $conn->prepare("INSERT INTO plantas_pegas (usuario_id, especie_id, pontos) VALUES (?, ?, 10)");
$stmt->bind_param("is", $usuario_id, $especie_id);

if ($stmt->execute()) {
    echo json_encode(["mensagem" => "Planta coletada com sucesso! +10 pontos"]);
} else {
    echo json_encode(["mensagem" => "Erro ao salvar a planta."]);
}

$stmt->close();
$conn->close();
?>
