<?php
    switch($_REQUEST["acao"]){
        case 'cadastrar':
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];

            $sql = "INSERT INTO contatos (nome, sobrenome, telefone, email) VALUES ('{$nome}', '{$sobrenome}', '{$telefone}', '{$email}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar contato');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        
        case 'editar':
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];

            $sql = "UPDATE contatos SET nome='{$nome}, sobrenome='{$sobrenome}', telefone='{$telefone}', email='{$email}' WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Não foi possível editar contato');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        
        case 'excluir':
            $sql = "DELETE FROM contatos WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Não foi possível excluir contato');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            
            break;
    }