<?php
get_header();
?>


        <?php if (have_posts()) : ?>
         
           <!-- TITULO -->
 <div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: #F5F5F5; padding:15px 0;">
        <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif; color:#E5CC26;" >PODCASTS</h1>
        <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-3.png" alt="">
    </div>
    <!-- FINTITULO -->
            <?php
            while (have_posts()) :
                the_post();
                // Aquí puedes mostrar el contenido de cada entrada de podcast
                get_template_part('template-parts/content', 'podcast');
            endwhile;
            ?>
        <?php else : ?>
            <p>No se encontraron podcasts.</p>
        <?php endif; ?>

   

<?php
get_footer();
?>