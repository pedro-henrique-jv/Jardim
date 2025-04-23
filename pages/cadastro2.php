<?php
// cadastro.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $nome = $_POST["nome"];
    $confirmar = $_POST["confirm-password"];

    if ($senha !== $confirmar) {
        echo "As senhas não coincidem.";
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "jardim_botanico");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (email, nome, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $nome, $senha_hash);

    if ($stmt->execute()) {
        header("Location: login.php?cadastro=sucesso");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
