<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "jardim_botanico");

    $stmt = $conn->prepare("SELECT id, senha, nome FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $senha_hash, $nome);
        $stmt->fetch();

        if (password_verify($senha, $senha_hash)) {
            $_SESSION["usuario_id"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $nome;
            header("Location: ../index.php"); // redireciona para a página principal
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
