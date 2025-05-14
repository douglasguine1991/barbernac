

<style>
  button {
    border: none;
    background-color: transparent;
  }

  .pg_produto {
    width: 230px;
    height: 230px;
    border-radius: 5px;
  }
</style>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>

      <th scope="col">Nome do contato</th>
      <th scope="col">Telefone contato</th>
      <th scope="col">Email contato</th>
      <th scope="col">Mensagem contato</th>
      <th scope="col">Data de envio</th>


    </tr>
  </thead>
  <tbody>
    <?php foreach ($listarEmails as $linha): ?>
      <tr>
        <th scope="row"><?php echo $linha['id_contato']; ?></th>

        <td><?php echo htmlspecialchars($linha['nome_contato']); ?></td>
        <td><?php echo htmlspecialchars($linha['telefone_contato']); ?></td>
        <td><?php echo htmlspecialchars($linha['email_contato']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($linha['mensagem_contato'], ENT_NOQUOTES, 'UTF-8')); ?></td>
        <td>
          <?php
          // Cria um objeto DateTime a partir da data do banco
          $dataEnvio = new DateTime($linha['data_envio_contato']);

          // Formata a data no padrão brasileiro
          echo htmlspecialchars($dataEnvio->format('d/m/Y H:i:s'));
          ?>
        </td>



        <!-- <td>
     //     <?php echo ($linha['status_galeria'] == 'Ativo') ? 'Ativo' : 'Inativo'; ?>//
        </td> -->



        </td>


      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script src="http://localhost/guloseimas_do_olimpophp/public/vendors/dash/js/adminlte.js"></script>

</html>