<div id="cadastro">
  <h1>Novo contato</h1>
  <form class="form" action="?page=utils" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <br>
    <div class="form_grupo">
      <label for="nome" class="form_label">Nome: </label>
      <input type="text" name="nome" class="form_input" id="nome" placeholder="ex.: Ana" required>
    </div>
    <br>
    <div class="form_grupo">
      <label for="sobrenome" class="form_label">Sobrenome: </label>
      <input type="text" name="sobrenome" class="form_input" id="sobrenome" placeholder="ex.: Silva" required>
    </div>
    <br>
    <div class="form_grupo">
      <label for="telefone" class="form_label">Telefone: </label>
      <input type="text" name="telefone" class="form_input" id="telefone" placeholder="(xx)xxxxxxxxx" required>
    </div>
    <br>
    <div class="form_grupo">
      <label for="e-mail" class="form_label">E-mail: </label>
      <input type="email" name="email" class="form_input" id="email" placeholder="ex.: anasilva33@gmail.com" required>
    </div>
    <br>
    <p>
      <input type="submit" value="Cadastrar" />
    </p>

  </form>
</div>