<?php
/* Inclui o arquivo de conexão com o banco.
   Esse arquivo normalmente cria a variável $conexao com mysqli_connect() */
include "conexao.php";

/* Monta o comando SQL:
   - SELECT = buscar dados
   - id, nome, email, idade = colunas que vamos trazer
   - FROM usuarios = tabela
   - ORDER BY id DESC = ordena do maior id para o menor (últimos cadastrados primeiro) */
$sql = "SELECT id, nome, email, senha FROM usuario ORDER BY id DESC";

/* Executa a consulta no MySQL:
   - mysqli_query recebe ($conexao, $sql)
   - retorna um "resultado" (uma lista de linhas) ou false se der erro */
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Define o conjunto de caracteres (evita quebrar acentos) -->
  <meta charset="UTF-8">

  <!-- Título da aba do navegador -->
  <title>Lista de Usuários</title>

  <!-- Liga este HTML ao seu arquivo CSS -->
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

  <!-- Container para centralizar e dar aparência bonita (vem do seu CSS) -->
  <div class="container">

    <!-- Título da página -->
    <h1>Usuários cadastrados</h1>

    <!-- Link para voltar ao cadastro (index.php) -->
    <a href="index.php">+ Novo cadastro</a>

    <!-- Quebra de linha para dar espaço -->
    <br><br>

    <!-- Começo da tabela -->
    <table class="tabela">

      <!-- Cabeçalho da tabela (linha do topo com os títulos das colunas) -->
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
           <th>Ações</th>
        </tr>
      </thead>  

      <!-- Corpo da tabela (onde entram os dados do banco) -->
      <tbody>

        <?php
        /* Primeiro: vamos checar se a consulta deu certo E se tem linhas.
           - $resultado precisa existir (não ser false)
           - mysqli_num_rows($resultado) conta quantas linhas vieram do banco */
        if ($resultado && mysqli_num_rows($resultado) > 0) {

          /* while = repete enquanto existir uma próxima linha no resultado
             - mysqli_fetch_assoc pega uma linha e devolve como array associativo:
               $linha["id"], $linha["nome"], etc. */
          while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>

            <!-- Aqui é HTML normal, mas dentro do while (vai repetir para cada usuário) -->
            <tr>
              <!-- Mostra o ID do usuário -->
              <td><?php echo $linha["id"]; ?></td>

              <!-- Mostra o nome do usuário -->
              <td><?php echo $linha["nome"]; ?></td>

              <!-- Mostra o email do usuário -->
              <td><?php echo $linha["email"]; ?></td>


              <!-- Coluna de ações: Editar e Excluir (podem não funcionar ainda) -->
              <td class="col-acoes">
                <!-- Link de editar: manda para editar.php e passa o id pela URL -->
                <a class="btn editar" href="editar.php?id=<?php echo $linha["id"]; ?>">Editar</a>

                <!-- Link de excluir: manda para excluir.php e passa o id pela URL -->
                <a class="btn excluir" href="excluir.php?id=<?php echo $linha["id"]; ?>">Excluir</a>
              </td>
            </tr>

        <?php
          } // fim do while
        } else {
          /* Se não tiver nenhum usuário, mostra uma linha dizendo isso.
             colspan="5" faz a célula ocupar 5 colunas (a tabela toda). */
          echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
        }
        ?>

      </tbody>
    </table>
  </div>

</body>
</html>

<?php
/* Fecha a conexão com o banco (boa prática, principalmente para aula) */
mysqli_close($conexao);
?>
