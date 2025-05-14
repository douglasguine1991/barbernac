<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 
    if(isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])){
        $mensagem = $_SESSION['mensagem'];
        $tipo = $_SESSION['tipo-msg'];
 
        // EXIBIR MENSAGEM
        if($tipo == 'sucesso'){
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }elseif($tipo == 'erro'){
            echo '<div class="alert alert-warning" role="alert">' . $mensagem . '</div>';
        }
 
        // LIMPE AS VARIAVEIS DE SESSAO
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo-msg']);
    }
 
?>
 
 
 
<a href="depoimento/adicionar/"><button>Adicionar</button></a>
 
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Depoimento</th>
            <th scope="col">Data e hora</th>
       
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($depoimento as $linha): ?>
 
            <tr>
                <td><?php echo $linha['nome_cliente'] ?></td>
                <td><?php echo $linha['descricao_depoimento'] ?></td>
                <td><?php echo $linha['data_depoimento'] ?></td>
            </tr>
 
        <?php endforeach; ?>
 
    </tbody>
</table>