function validarForm() {
    var nome = document.getElementById("nome").value;
    var sobrenome = document.getElementById("sobrenome").value;
    var telefone = document.getElementById("telefone").value;
    var email = document.getElementById("email").value;

    if (nome === "" || sobrenome === "" || telefone === "" || email === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    return true;
}