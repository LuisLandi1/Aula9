<?php
session_start();
include('bd.php'); // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    // Verifica qual tipo de dado está sendo atualizado (time, produto ou livro)
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'] ?? null;
        $ano_fundacao = $_POST['ano_fundacao'] ?? null;
        
        // Atualiza os dados do time
        $sql = "UPDATE times SET nome = :nome, cidade = :cidade, ano_fundacao = :ano_fundacao WHERE id = :id";
        $comando = $conn->prepare($sql);
        $comando->bindParam(':nome', $nome);
        $comando->bindParam(':cidade', $cidade);
        $comando->bindParam(':ano_fundacao', $ano_fundacao);
        $comando->bindParam(':id', $id, PDO::PARAM_INT);
      }  $comando->execute();
    }

    if (isset($_POST['preco'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        // Atualiza os dados do produto
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
        $comando = $conn->prepare($sql);
        $comando->bindParam(':nome', $nome);
        $comando->bindParam(':preco', $preco);
        $comando->bindParam(':quantidade', $quantidade);
        $comando->bindParam(':id', $id, PDO::PARAM_INT);
        $comando->execute();
    }

    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano_publicacao = $_POST['ano_publicacao'];

    }