<!-- our barbers -->
<section class="resip_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ourheading">
                    <h2>Nossos<strong class="white"> Barbeiros</strong></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <?php if ($funcionario['cargo'] == 'Barbeiro'): ?>
                            <div class="item">
                                <div class="product_blog_img">
                                    <?php
                                    $caminhoArquivo = BASE_URL . "uploads/" . $funcionario['foto_funcionario'];
                                    $img = BASE_URL . "uploads/sem-foto.jpg"; // Caminho padrão corrigido
                                    // $alt_foto = "imagem sem foto $index";

                                    if (!empty($funcionario['foto_funcionario'])) {
                                        $headers = @get_headers($caminhoArquivo);
                                        if ($headers && strpos($headers[0], '200') !== false) {
                                            $img = $caminhoArquivo;
                                        }
                                    }

                                    ?>
                                    <img src="<?php echo $img; ?>" alt="Foto funcionario" class="rounded-circle" style="width: 50px; height: 50px;">
                                </div>
                                <div class="product_blog_cont">
                                    <h3><?php echo htmlspecialchars($funcionario['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <h4><?php echo htmlspecialchars($funcionario['cargo'], ENT_QUOTES, 'UTF-8'); ?></h4>
                                    <p>Especialista em cortes modernos</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end our barbers -->