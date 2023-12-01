<h1>Listar contatos</h1>

<?php
    $sql = "SELECT * FROM contatos";

    $response = $conn->query($sql);

    $quantidade = $response->num_rows;

    if ($quantidade > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOME</th>";
        echo "<th>SOBRENOME</th>";
        echo "<th>TELEFONE</th>";
        echo "<th>E-MAIL</th>";
        echo "<th>EDITAR</th>";
        echo "<th>EXCLUIR</th>";
        echo "</tr>";

        while ($row = $response->fetch_object()) {
            echo "<tr>";
            echo "<td>" . $row->id . "</td>";
            echo "<td>" . $row->nome . "</td>";
            echo "<td>" . $row->sobrenome . "</td>";
            echo "<td>" . $row->telefone . "</td>";
            echo "<td>" . $row->email . "</td>";

            echo "<td><button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" 
                style='background-color:green' type='button'>Editar</button></td>";

            echo "<td><button 
                onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=utils&acao=excluir&id=" . $row->id . "';}
                else{false;}\"
                style='background-color:red' type='button'>Excluir</button></td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<script>alert('Não foi possível encontrar resultados');</script>";
    }
?>
