<?php


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'category_name' => 'podcast', // Cambia esto al slug de tu categoría
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 12, // Cambia el número de noticias por página según la preferencia :)
    'paged' => $paged
);
/*
Template Name: Plantilla de Podcasts
*/

get_header();
$the_query = new WP_Query($args);
?>
    

<div class="flex justify-center p-8" style="background-color:#010B15;">
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

    
<div class="flex flex-col w-full my-6" >
    <a href="<?php the_permalink(); ?>">
                    <img class="w-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">
                   
                    </a>
                    <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50 text-white" style="background-color:#041824;">
                       <a href="<?php the_permalink(); ?>">   
<?php
if (!empty($categories)) {
    echo '<h3 style="color: #E5CC26; text-transform: uppercase;" class="font-bold">';
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
                            <h5>  <?php echo get_the_date(); ?></h5>
                            </a> 
                    </div>

                </div>
            
   
    
<?php endwhile; endif; ?>
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
  audio::-webkit-media-controls-play-button,
 audio::-webkit-media-controls-panel {
  background-color: #E5CC26;

}

    .next, .prev{
       color: #07376A;
       font-weight: 700;

    }
    .current{
        background-color:#A9A9A9;
        padding:5px 15px;
        border-radius:4px;
    }

</style>
<?php wp_reset_postdata(); // Restaurar datos originales de la consulta ?>







<?php get_footer(); ?>