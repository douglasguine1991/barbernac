<!-- nossos serviços fixos em grid -->
<section id="service" class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ourheading">
                    <h2>Nossos<strong class="white_ll"> Serviços</strong></h2>
                    <span>Oferecemos serviços exclusivos para homens que valorizam qualidade e estilo</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row justify-content-center">

        <?php foreach($servicos as $servico): ?>
        
        <!-- Serviço (loop) -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="service_box text-center h-100">
                <figure>
                <?php
                                    $caminhoArquivo = BASE_URL . "uploads/servico/" . $servico['foto_galeria'];
                                    $img = BASE_URL . "uploads/servico/sem-foto-servico.png"; // Caminho padrão corrigido
                                    // $alt_foto = "imagem sem foto $index";

                                    if (!empty($servico['foto_galeria'])) {
                                        $headers = @get_headers($caminhoArquivo);
                                        if ($headers && strpos($headers[0], '200') !== false) {
                                            $img = $caminhoArquivo;
                                        }
                                    }

                                    ?>
                                    <img src="<?php echo $img; ?>" alt="Foto funcionario" >    </figure>
                <h3><?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars($servico['descricao_servico'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>

