<?php
    function redirecionar($mensagem, $pagina = '?page=listar') {
        echo "<script>alert('$mensagem');</script>";
        echo "<script>location.href='$pagina';</script>";
        exit;
    }

    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];

            $sql = "INSERT INTO contatos (nome, sobrenome, telefone, email) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nome, $sobrenome, $telefone, $email);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                redirecionar('Cadastro realizado com sucesso');
            } else {
                redirecionar('Não foi possível cadastrar', '?page=index');
            }
            break;

        case 'editar':
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];

            $sql = "UPDATE contatos SET nome=?, sobrenome=?, telefone=?, email=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nome, $sobrenome, $telefone, $email, $_REQUEST["id"]);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                redirecionar('Edição realizada com sucesso');
            } else {
                redirecionar('Não foi possível editar');
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM contatos WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_REQUEST["id"]);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                redirecionar('Excluído com sucesso');
            } else {
                redirecionar('Não foi possível excluir');
            }
            break;

        case 'buscar':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM contatos WHERE id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h1>Usuário obtido com sucesso</h1>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>NOME</th>";
                    echo "<th>SOBRENOME</th>";
                    echo "<th>TELEFONE</th>";
                    echo "<th>EMAIL</th>";
                    echo "<th>EDITAR</th>";
                    echo "<th>EXCLUIR</th>";
                    echo "</tr>";
                    while ($row = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td>" . $row->nome . "</td>";
                        echo "<td>" . $row->sobrenome . "</td>";
                        echo "<td>" . $row->telefone . "</td>";
                        echo "<td>" . $row->email . "</td>";

                        echo "<td><button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" 
                            style='background-color:green' type='button'>Editar</button></td>";

                        echo "<td><button 
                            onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "';}
                            else{false;}\"
                            style='background-color:red' type='button'>Excluir</button></td>";

                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h1>Nenhum contato encontrado</h1>";
                }

                $stmt->close();
            }
            break;
    }
?>
