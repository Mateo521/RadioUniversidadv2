<?php
/*
Template Name: Plantilla de Noticias
*/

get_header();
$excluded_category_id = 7; // descarte de podcasts
$args_banner = array(
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'category__not_in' => array(7,8)
);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'category__not_in' => array(7,8),
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 12, // Cambia el número de noticias por página según la preferencia :)
    'paged' => $paged
);
$imagenes = new WP_Query($args_banner);
$the_query = new WP_Query($args); // Crea la consulta
?>

<!--  bucle de noticias -->



<!-- CAROUSEL -->

<?php wp_reset_postdata();  ?>

<div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden" id="carousel">

        <?php


        foreach ($imagenes->posts as $post) : setup_postdata($post);
            // Obtener la URL de la primera imagen encontrada en el contenido
            $content = get_the_content();
            // Obtener el ID de la imagen destacada (thumbnail)


            preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
            $image_url = isset($matches[1]) ? $matches[1] : '';
            // Obtener título y etiquetas
            $entry_title = get_the_title();
            $entry_tags = get_the_tags();

          

            

        ?>


            <a href="<?php the_permalink(); ?>">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <!-- SI NO HAY IMAGEN -->
                    <?php if (!empty($image_url)) : ?>
                        <div class="w-full h-full" id="carousel-r" style="background-image: url(<?php echo esc_url($image_url); ?>);   background-position:center; background-size: cover;">
                        <?php else : ?>
                            <div class="w-full h-full" id="carousel-r" style="background-color:#07376A;   background-position:center; background-size: cover;">
                            <?php endif; ?>
                            <div class="absolute w-full h-full z-1 " id="bg-1"></div>
                            <div class="flex justify-center h-full">
                                <div class="absolute w-full max-w-screen-xl bottom-5 " id="info-t">
                                    <div class="relative w-full" style="color: white; padding: 0 75px;">
                                        <div class="flex text-xs">
                                            <?php if ($entry_tags) : ?>
                                                <?php foreach ($entry_tags as $tag) : ?>
                                                    <h4 class="rounded-lg text-white p-2 mx-1 inline-flex" style="background-color: #1476B3;"><?php echo esc_html($tag->name); ?></h4>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </div>
                                        <h1 class="text-6xl mt-4" id="title"><?php echo esc_html($entry_title); ?></h1>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
            </a>

        <?php endforeach; ?>





    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="4"></button>

    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<!-- FINCAROUSEL -->

<div class="flex justify-center p-8 bg-white">
    <div class="max-w-screen-xl w-full">

        <div class="grid md:grid-cols-3 gap-8">


            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) :


                    $the_query->the_post();
                    $content = get_the_content();
                    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                    $image_url = isset($matches[1]) ? $matches[1] : '';
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');

                    $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*<\/figure>/is';


                   
            ?>


                    <!-- 
     <img src="" alt="">
    <h2><a href="<?php the_permalink(); ?>" title="Read"></a></h2>
    <?php the_excerpt(); ?>
  
 -->


                    <div class="flex flex-col w-full my-6">
                        <a href="<?php the_permalink(); ?>">
                            <img class="w-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">

                        </a>
                        <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (!empty($categories)) {
                                    echo '<h3 style="color: #07376A; text-transform: uppercase;" class="font-bold">';
                                    foreach ($categories as $index => $category) {
                                        echo esc_html($category->name);
                                        if ($index !== count($categories) - 1) {
                                            echo ', '; // Agregar coma y espacio entre categorías
                                        }
                                    }
                                    echo '</h3>';
                                }
                                ?>
                                <p class="font-bold py-4"><?php the_title(); ?>
                                </p>
<?php

                                       if(preg_match($pattern,$content,$matches2)){
                                                echo $matches2[0];
                                            }
                                           
?>
                                
                                <h5> <?php echo get_the_date(); ?></h5>
                            </a>
                        </div>

                    </div>



            <?php endwhile;
            endif; ?>
        </div>

        <!-- Agregar enlace a la página anterior y siguiente -->
        <div class="flex justify-center gap-8 items-center">

            <?php echo paginate_links(array(
                'total' => $the_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '< Anterior',
                'next_text' => 'Siguiente >'
            )); ?>

        </div>


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
<?php wp_reset_postdata(); // Restaurar datos originales de la consulta 
?>







<?php get_footer(); ?>