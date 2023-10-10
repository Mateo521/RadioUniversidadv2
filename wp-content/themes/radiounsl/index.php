<?php
/*
Template Name: Plantilla de Noticias
*/
get_header();
$excluded_category_id = 7; // descarte de podcasts
$args_banner = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'category__not_in' => array(7,8,21)
);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'category__not_in' => array(7,8),
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 12, // Cambia el número de noticias por página según la preferencia :)
    'paged' => $paged
);
$args_institucional = array(
    'category_name' => 'institucional', 
    'posts_per_page' => 1 
);

$institucional_query = new WP_Query($args_institucional);
$imagenes = new WP_Query($args_banner);

$the_query = new WP_Query($args); // Crea la consulta
?>
<!--  bucle de noticias -->
<!-- CAROUSEL -->
<?php wp_reset_postdata();  ?>
<div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden" id="carousel">
<!---->
<?php
$response = wp_remote_get('http://www.noticias.unsl.edu.ar/category/principal/');

if(is_wp_error($response)){
    echo "error";
}else{
    $page_content = wp_remote_retrieve_body($response);
    $title = '/<h3[^>]*class="entry-title"[^>]*>.*<\/h3>/is';
    $image = '/<div class="entry-thumb "[^>]*>\s*<a[^>]*>\s*<img[^>]+src="([^"]+)"[^>]*>\s*<\/a>\s*<\/div>/i';
    $link = '/<div class="entry-thumb "[^>]*>\s*<a[^>]*\s+href="([^"]+)"/i';

if (preg_match($link, $page_content, $matches)) {
    $link = $matches[1];
}
$response_etiqueta = wp_remote_get($link);

if (!is_wp_error($response_etiqueta)) {

    $page_content2 = wp_remote_retrieve_body($response_etiqueta);

  //$titl2e = '/<div[^>]*class="entry-tags"[^>]*>(.*?)<\/div>/is';
$titl2e = '/<a href="([^"]+)" rel="tag">([^<]+)<\/a>/i';
}
}
?>
   <a href="<?php echo $link ?>" target="_blank">
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                  <?php echo $link_e ?>
                   <?php if(preg_match($image,$page_content,$img)): ?>
                                    
                        <div class="w-full h-full" id="carousel-r" style="background-image: url(<?php echo  $img[1]?>);   background-position:center; background-size: cover;">
  <?php endif;     ?>
                 
                       <!-- SI NO HAY IMAGEN -->
                      <!--      <div class="w-full h-full" id="carousel-r" style="background-color:#07376A;   background-position:center; background-size: cover;">
                          -->
                            <div class="absolute w-full h-full z-1 " id="bg-1"></div>
                            <div class="flex justify-center h-full">
                                <div class="absolute w-full max-w-screen-xl bottom-5 " id="info-t">
                                    <div class="relative w-full" style="color: white; padding: 0 75px;">
                                     <h4 class="rounded-lg text-white p-2 my-2 inline-flex" style="background-color: #0f3349;">NOTICIAS UNSL</h4> 
                                        <div class="flex text-xs flex-wrap">
                                          <?php                                 
$matches = array();
if (preg_match_all($titl2e, $page_content2, $matches, PREG_SET_ORDER)) {
    $etiquetas = array();

    foreach ($matches as $match) {
        $enlace = $match[1];
        $texto_etiqueta = $match[2];
        $etiquetas[] = array(
            'enlace' => $enlace,
            'texto' => $texto_etiqueta,
        );
    }
}
foreach ($etiquetas as $etiqueta) {
    $enlace = $etiqueta['enlace'];
    $texto = $etiqueta['texto'];
    // Imprime la etiqueta con el estilo deseado
       echo '<a href="' . $enlace . '" style="color: white; text-decoration: none;" target="_blank">';
    echo '<h4 class="rounded-lg text-white p-2 inline-flex" style="background-color: #1476B3; margin:3px;">'. $texto;
    echo '</a></h4>';
}
                                         ?>
                                        </div>
                                       <?php if(preg_match($title,$page_content,$matches2)){
                                        echo  $matches2[0];     
                                        } ?>                                
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
            </a>
     <?php
        foreach ($institucional_query->posts as $post) : setup_postdata($post);
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
                                        <h4 class="rounded-lg text-white p-2 my-2 inline-flex" style="background-color: #0f3349;">RADIO UNSL</h4> 
                                        <div class="flex text-xs">
                                                        <a  href="<?php echo esc_url(home_url('/category/institucional')); ?>">
                                                    <h4 class="rounded-lg text-white p-2 mx-1 inline-flex" style="background-color: #1476B3;"> INSTITUCIONAL</h4>
                                      </a>  
                         
                                        </div>
           <a href="<?php the_permalink(); ?>">
                                        <h1 class="text-6xl mt-4" id="title"><?php echo esc_html($entry_title); ?></h1>
                                             </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
         </a>
<? endforeach; ?>
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
                                        <h4 class="rounded-lg text-white p-2 my-2 inline-flex" style="background-color: #0f3349;">RADIO UNSL</h4> 
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
    
<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="5"></button>

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

                    $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';      
            ?>
                    <div class="flex flex-col w-full my-6">
                        <a href="<?php the_permalink(); ?>">
                            <img class="w-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">
                        </a>
                        <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50">
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="font-bold py-4" style="color: #07376A;"><?php the_title(); ?>
                                </h3>
      <a href="<?php the_permalink(); ?>">   
    <?php the_excerpt(); ?>
</a>
<?php

                                       if(preg_match($pattern,$content,$matches2)){
                                                echo $matches2[0];
                                            }
                            ?>
                            <div class="flex justify-between items-center wrap gap-3">
                            <?php                
   if (!empty($categories)) {
    echo '<h5 class="text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';

    foreach ($categories as $index => $category) {
        if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
            $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
            echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
            
            if ($index !== count($categories) - 1) {
                echo ', '; // Agregar coma y espacio entre categorías
            }
        }
    }

    echo '</h5>';
}
                               ?>
                                <h5> <?php echo get_the_date(); ?></h5>
                                </div>
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
.entry-title{
font-size: 3.75rem;
    line-height: 1;
    margin-top: 1rem;
}
@media screen and (max-width:766px){
 .entry-title{   font-size: 25px;
}

}
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