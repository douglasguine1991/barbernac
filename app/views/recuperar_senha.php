<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once('template/head.php');
?>
<body class="page-recuperar">
    <div class="container">
        <h1>
            <span class="title-line">RECUPERAR</span>
            <span class="title-line">SENHA</span>
        </h1>
        
        <form action="<?php echo BASE_URL; ?>index.php?url=login/enviarRecuperacao" method="POST" class="form-recuperar">
            <div class="input-group">
                <label for="email">E-MAIL CADASTRADO:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu e-mail cadastrado">
            </div>
            
            <button type="submit" class="btn">ENVIAR LINK</button>
        </form>
        
        <a href="<?php echo BASE_URL; ?>index.php?url=login" class="btn btn-secondary">VOLTAR AO LOGIN</a>
    </div>
</body>
</html>