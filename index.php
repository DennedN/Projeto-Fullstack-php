<?php 
session_start();
require 'conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  </head>

  <body>

    <?php include('navbar.php'); ?>

    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header">
              <h4>Lista de usuários
                <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
              </h4>
            </div>

            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Nascimento</th>
                    <th>Ações</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $sql = 'SELECT * FROM usuarios';
                  $usuarios = mysqli_query($conexao, $sql);
                  if (mysqli_num_rows($usuarios) > 0) {
                    foreach($usuarios as $usuario) {
                  ?>
                  <tr>
                    <td><?=$usuario['id']?></td>
                    <td><?=$usuario['nome']?></td>
                    <td><?=$usuario['email']?></td>
                    <td><?=date('d/m/Y', strtotime($usuario['data_nascimento']))?></td>
                    <td>
                      <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp; Vizualizar</a>
                      <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp; Editar</a>
                      <form action="acoes.php" method="post" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp; Exluir</button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                  } else {
                    echo '<h5>Nenhum usuário encontrado</h5>';
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

  </body>
</html>