<?php


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args_lunes_a_viernes = array(
    'category_name' => 'lunes-a-viernes',
     // Cambia esto al slug de tu categoría
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 6, // Cambia el número de noticias por página según la preferencia :)
);
$args_sabados = array(
    'category_name' => 'sabados',
     // Cambia esto al slug de tu categoría
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 3, // Cambia el número de noticias por página según la preferencia :)
);
/*
Template Name: Plantilla de Podcasts
*/

get_header();
$the_query_lunes_a_viernes = new WP_Query($args_lunes_a_viernes);
$the_query_sabados = new WP_Query($args_sabados);
?>
<!-- TITULO -->
<div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: #F5F5F5; padding:15px 0;">
    <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif; color:#07376A;">PROGRAMACIÓN</h1>
    <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-4.png" alt="">
</div>
<!-- FINTITULO -->
<div>
    <img class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-2.png" alt="">
</div>
<div class="flex justify-center p-8 bg-white">
    <div class="max-w-screen-xl w-full">


    <!-- ACORDION -->
    
<div id="accordion-collapse" data-accordion="collapse">
  <h2 id="accordion-collapse-heading-1">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
      <span  style="color:#07376A;" class="font-bold">Lunes a Viernes</span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
     

    <!-- SECCIONPROGRAMACION -->
    <div class="grid md:grid-cols-3 gap-8" style="padding-bottom: 35px;">


<?php if ($the_query_lunes_a_viernes->have_posts()) : while ($the_query_lunes_a_viernes->have_posts()) :


        $the_query_lunes_a_viernes->the_post();
        $content = get_the_content();
        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        $image_url = isset($matches[1]) ? $matches[1] : '';
        // Obtener título y etiquetas
        $entry_title = get_the_title();

        $categories = get_the_category();
        $entry_date = get_the_date('d/m/Y');


?>
        <div class="grid grid-rows-2 w-full my-6 h-full">
            <div style="height:175px;" class="h-full">
                <a href="<?php the_permalink(); ?>">
                    <img class="w-full h-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="">

                </a>
            </div>
            <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50 ">
                <a href="<?php the_permalink(); ?>">
                    <h3 style="color: #07376A;" class="font-bold"><?php echo esc_html($entry_title); ?></h3>
                    <p style="color:#1476B3;">
                        <?php
                        foreach ($categories as $index => $category) {

                            if ($category->slug !== "sin-categoria" && $category->slug !== "programacion") {
                                echo esc_html($category->name);
                                if ($index !== count($categories) - 1) {
                                    echo ' '; // Agregar coma y espacio entre las categorías
                                }
                            }
                        }
                        ?></p>
                    <div class="flex justify-between font-bold">
                        <?php
                        preg_match_all('/<p[^>]+id="horario"[^>]*>(.*?)<\/p>/is', $content, $matches);
                        // Mostrar los párrafos encontrados
                        if (!empty($matches[0])) {
                            foreach ($matches[0] as $paragraph) {
                                echo $paragraph;
                            }
                        }
                        ?>
                        <p>></p>
                    </div>
                </a>
            </div>

        </div>



<?php endwhile;
endif; ?>
</div>

<!-- FINSECCIONPROGRAMACION -->


    </div>
  </div>
  <h2 id="accordion-collapse-heading-2">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
      <span   style="color:#07376A;" class="font-bold">Sábados</span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
      



    <!-- SECCIONPROGRAMACION -->
    <div class="grid md:grid-cols-3 gap-8" style="padding-bottom: 35px;">


<?php if ($the_query_sabados->have_posts()) : while ($the_query_sabados->have_posts()) :


        $the_query_sabados->the_post();
        $content = get_the_content();
        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        $image_url = isset($matches[1]) ? $matches[1] : '';
        // Obtener título y etiquetas
        $entry_title = get_the_title();

        $categories = get_the_category();
        $entry_date = get_the_date('d/m/Y');


?>
        <div class="grid grid-rows-2 w-full my-6 h-full">
            <div style="height:175px;" class="h-full">
                <a href="<?php the_permalink(); ?>">
                    <img class="w-full h-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="">

                </a>
            </div>
            <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50 ">
                <a href="<?php the_permalink(); ?>">
                    <h3 style="color: #07376A;" class="font-bold"><?php echo esc_html($entry_title); ?></h3>
                    <p style="color:#1476B3;">
                        <?php
                        foreach ($categories as $index => $category) {

                            if ($category->slug !== "sin-categoria" && $category->slug !== "programacion") {
                                echo esc_html($category->name);
                                if ($index !== count($categories) - 1) {
                                    echo ' '; // Agregar coma y espacio entre las categorías
                                }
                            }
                        }
                        ?></p>
                    <div class="flex justify-between font-bold">
                        <?php
                        preg_match_all('/<p[^>]+id="horario"[^>]*>(.*?)<\/p>/is', $content, $matches);
                        // Mostrar los párrafos encontrados
                        if (!empty($matches[0])) {
                            foreach ($matches[0] as $paragraph) {
                                echo $paragraph;
                            }
                        }
                        ?>
                        <p>></p>
                    </div>
                </a>
            </div>

        </div>



<?php endwhile;
endif; ?>
</div>

<!-- FINSECCIONPROGRAMACION -->




</div>
  </div>
</div>

    <!-- FINACORDION -->



    </div>
</div>
<style>
    .next,
    .prev {
        color: #07376A;
        font-weight: 700;

    }

    .current {
        background-color: #A9A9A9;
        padding: 5px 15px;
        border-radius: 4px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Encuentra el elemento del subtítulo por su id
        var fecha = document.getElementById('horario');
        var otraUbicacionContainer_3 = document.querySelector('.horarios');
        // Mueve el subtítulo al nuevo contenedor
        fecha.appendChild(otraUbicacionContainer_3);
    });
</script>
<?php wp_reset_postdata(); // Restaurar datos originales de la consulta 
?>




<?php get_footer(); ?>