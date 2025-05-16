 <section id="home">
     <div class="home-container">
         <div class="swiper mySwiper">
             <div class="swiper-wrapper">

                 <!-- Slide 1 -->
                 <div class="swiper-slide" style="background-image: url('<?= BASE_URL ?>assets/img/bg2.png');">
                     <div class="overlay-gradient"></div>
                     <div class="slide-txt" data-swiper-parallax="-300">
                         <img src="<?= BASE_URL ?>assets/img/logo_white.png" alt="Logo" class="logo-parallax"
                             data-swiper-parallax-opacity="0">
                         <div class="title" data-swiper-parallax="-300">Transforme seu Visual</div>
                         <div class="subtitle" data-swiper-parallax="-200">Corte com Estilo</div>
                         <div class="text" data-swiper-parallax="-100">
                             <p>Experimente um corte moderno e único, feito sob medida para você.</p>
                         </div>
                     </div>
                 </div>

                 <!-- Slide 2 -->
                 <div class="swiper-slide"
                     style="background-image: url('<?= BASE_URL ?>assets/img/bg3.png'); filter: brightness(0.8);">
                     <div class="overlay-gradient"></div>
                     <div class="slide-txt" data-swiper-parallax="-300">
                         <img src="<?= BASE_URL ?>assets/img/logo_white.png" alt="Logo" class="logo-parallax">
                         <div class="title" data-swiper-parallax="-250">Conforto e Estilo</div>
                         <div class="subtitle" data-swiper-parallax="-200">Ambiente Aconchegante</div>
                         <div class="text" data-swiper-parallax="-100">
                             <p>Desfrute de um atendimento exclusivo em um ambiente moderno e relaxante.</p>
                         </div>
                     </div>
                 </div>

                 <!-- Slide 3 -->
                 <div class="swiper-slide" style="background-image: url('<?= BASE_URL ?>assets/img/banner.jpg'); filter: sepia(0.3);">
                     <div class="overlay-gradient"></div>
                     <div class="slide-txt" data-swiper-parallax="-300">
                         <img src="<?= BASE_URL ?>assets/img/logo_white.png" alt="Logo" class="logo-parallax">
                         <div class="title" data-swiper-parallax="-250">A Arte da Barbearia</div>
                         <div class="subtitle" data-swiper-parallax="-200">Sinta-se como um Rei</div>
                         <div class="text" data-swiper-parallax="-100">
                             <p>Profissionais qualificados para proporcionar o melhor serviço para você.</p>
                         </div>
                     </div>
                 </div>

                 <!-- Slide 4 -->
                 <div class="swiper-slide"
                     style="background-image: url('<?= BASE_URL ?>assets/img/bg4.png'); transform: scale(1.02);">
                     <div class="overlay-gradient"></div>
                     <div class="slide-txt" data-swiper-parallax="-300">
                         <img src="<?= BASE_URL ?>assets/img/logo_white.png" alt="Logo" class="logo-parallax">
                         <div class="title" data-swiper-parallax="-250">Corte Personalizado</div>
                         <div class="subtitle" data-swiper-parallax="-200">Do Seu Jeito</div>
                         <div class="text" data-swiper-parallax="-100">
                             <p>Nosso diferencial é entender o seu estilo e trazer o melhor corte para você.
                             </p>
                         </div>
                     </div>
                 </div>

                 <!-- Slide 5 -->
                 <div class="swiper-slide"
                     style="background-image: url('<?= BASE_URL ?>assets/img/bg5.png'); filter: contrast(1.2);">
                     <div class="overlay-gradient"></div>
                     <div class="slide-txt" data-swiper-parallax="-300">
                         <img src="<?= BASE_URL ?>assets/img/logo_white.png" alt="Logo" class="logo-parallax">
                         <div class="title" data-swiper-parallax="-250">Promoções Especiais</div>
                         <div class="subtitle" data-swiper-parallax="-200">Agende Agora!</div>
                         <div class="text" data-swiper-parallax="-100">
                             <p>Aproveite nossas ofertas e marque seu horário online com facilidade.</p>
                         </div>
                     </div>
                 </div>

             </div>

             <!-- Paginação -->
             <div class="swiper-pagination"></div>
         </div>
     </div>
 </section>



 <script>
     document.addEventListener("DOMContentLoaded", function() {
         var swiper = new Swiper(".mySwiper", {
             speed: 1000,
             parallax: true,
             loop: true,
             autoplay: {
                 delay: 6000,
                 disableOnInteraction: false,
             },
             pagination: {
                 el: ".swiper-pagination",
                 clickable: true,
             },
         });
     });
 </script>