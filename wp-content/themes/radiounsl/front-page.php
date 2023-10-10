<?php
get_header();
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'category__not_in' => array(7,8,21)
);

$args_estatico = array(
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'category__not_in' => array(7,8)
);


$args_podcasts = array(
    'category_name' => 'podcast', // Nombre de la categoría de podcasts
    'posts_per_page' => 9 // Mostrar todas las noticias de podcasts
);

$args_institucional = array(
    'category_name' => 'institucional', 
    'posts_per_page' => 1 
);

$args_programacion = array(
    'category_name' => 'programacion', // Nombre de la categoría de programacion
    'posts_per_page' => 9
);


$latest_posts = new WP_Query($args);
$estaticos_posts = new WP_Query($args_estatico);
$podcasts_query = new WP_Query($args_podcasts);
$programacion_query = new WP_Query($args_programacion);
$institucional_query = new WP_Query($args_institucional);

?>


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
        foreach ($latest_posts->posts as $post) : setup_postdata($post);
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
                                                    <h4 class="rounded-lg text-white p-2 mx-1 inline-flex" style="background-color: #1476B3;"><a  href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?>
                                                    </a>
                                                    </h4>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
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



<!-- SECCION NOTICIAS -->
<section style="background-color: #F0F0F0;" class="p-6">


    <div class="flex justify-center">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-12 max-w-screen-xl h-full">



            <div class="flex flex-col w-full ">




                <?php foreach ($institucional_query->posts as $post) : setup_postdata($post);
                

        $content = get_the_content();


if (have_posts()) :

        // Busca y almacena todas las imágenes dentro del contenido en un arreglo
        $imagenes = array();
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        if (!empty($matches[1])) :
            foreach ($matches[1] as $image_url) :
                $imagenes[] = $image_url;
            endforeach;
        endif;
endif;


                    // Obtener la URL de la primera imagen encontrada en el contenido
             
                    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);;
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');

                   $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';




                    
                    ?>
                      <a href="<?php the_permalink(); ?>">     
                    <img src="<?php echo esc_url($imagenes[0]); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">

 </a>
                    <div class="p-6 w-full  bg-white h-full shadow-lg shadow-gray-500/50">
                      
                           

   <a href="<?php the_permalink(); ?>">   
                            <p style="color: #07376A; text-transform: uppercase;" class="font-bold py-4"><?php echo esc_html($entry_title); ?></p>
 </a>

                            <?php
                             if(preg_match($pattern,$content,$matches2)){
                                                echo $matches2[0];
                                            }

  


                                            ?>
  <a href="<?php the_permalink(); ?>">   
    <?php the_excerpt(); ?>
</a>


<div class="flex items-center justify-between gap-3 py-4">

                           
<?php
                               // Obtener las categorías de la entrada actual
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
                             <h5><?php echo esc_html($entry_date); ?></h5>


</div>

                  
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="grid grid-col-1 items-center gap-3">
                <?php $counter = 0;
                foreach ($latest_posts->posts as $post) : setup_postdata($post); 
                

    $content = get_the_content();


if (have_posts()) :

        // Busca y almacena todas las imágenes dentro del contenido en un arreglo
        $imagenes = array();
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        if (!empty($matches[1])) :
            foreach ($matches[1] as $image_url) :
                $imagenes[] = $image_url;
            endforeach;
        endif;
endif;


                    // Obtener la URL de la primera imagen encontrada en el contenido
             
                    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);;
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');

                     $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';




                    
                    ?>

<div id="noticia-d" class="w-full rounded-r-lg shadow-lg shadow-gray-500/50">
                    <div class="grid md:grid-cols-2 grid-cols-1">
         
                        <img  class="w-full h-full object-cover noticia-der" src="<?php echo esc_url($imagenes[0]); ?>" alt="<?php echo esc_attr($entry_title); ?>">
                        <div class="p-3 bg-white rounded-tr-lg ">


                            <a href="<?php the_permalink(); ?>">

                
                                <h3 style="color: #07376A; " class="font-bold py-4"><?php echo esc_html($entry_title); ?></h3>

<p class="py-2">
        <?php 
$contenido = wp_strip_all_tags(get_the_content());
$limiteCaracteres = 50;

if (strlen($contenido) > $limiteCaracteres) {

    $textoRecortado = substr($contenido, 0, $limiteCaracteres);

    
     $textoRecortado .= '...';
} else {
   
    $textoRecortado = $contenido;
}


echo $textoRecortado;
?>
</p>


                                <div class="flex items-center justify-between gap-3" style="flex-wrap:wrap;">

                                     <h5><?php echo esc_html($entry_date); ?></h5>

                                
                                    <?php
                                // Obtener las categorías de la entrada actual

                                // Verificar si hay categorías y mostrarlas con enlaces
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

                                </div>

                            </a>



                        </div>



                        
                        
                    </div>



                    
                      <?php  if(preg_match($pattern,$content,$matches2)): ?>
                    <div class="w-full bg-white rounded-b-lg" id="news-audio" style="margin:0;">
          
                                           <?php     echo $matches2[0]; ?>
                                           
                                          
                    </div>



                     <?php endif;?>
</div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>
    <div class="flex justify-center" style="padding: 50px 0;">
        <a href="<?php echo esc_url(home_url('/noticias')); ?>">
            <div class="m-6 p-3 text-center rounded-lg inline-flex text-white justify-center" style="background-color: #07376A;">Más noticias</div>
        </a>
    </div>
</section>
<!-- FINSECCION NOTICIAS -->



<!-- SECCION SLIDER -->

<div class=" flex justify-center px-6 hidden md:flex" style="background-color: #F0F0F0;">

    <div id="default-carousel" class="relative w-full max-w-screen-xl" data-carousel="slide" style="padding: 25px 0 60px 0;">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-96">

        <?php foreach ($programacion_query->posts as $post) : setup_postdata($post); 
                   


                    // Obtener la URL de la primera imagen encontrada en el contenido
                    $content = get_the_content();
                    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                    $image_url = isset($matches[1]) ? $matches[1] : '';
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');
                    ?>


            <!-- Item -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <a href="<?php the_permalink(); ?>">
            <div style="background-image: url(<?php echo esc_url($image_url); ?>); background-size: cover; background-position: center;" class="w-full h-full">
                    <div class="absolute w-full h-full z-1 " id="bg-2"></div>
                    <div class="flex justify-center flex-col relative" style="top: 50%; transform: translateY(-50%);">
                        <h1 id="titulo-slider" class="text-2xl text-center font-extrabold tracking-tight leading-none text-white">
                            <i><?php echo esc_html($entry_title); ?></i>
                        </h1>
                        <div class="flex items-center justify-center">
                            <svg class="svgs" id="svg-new" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <div class="flex items-center gap-4 text-4xl  py-6 px-1 md:p-1 text-center font-extrabold tracking-tight leading-none text-white">
                            <h2 id="info-slider">
                              
                            <?php
                                   foreach ($categories as $index => $category) {

                            if ($category->slug !== "sin-categoria" && $category->slug !== "programacion") {
                                echo esc_html($category->name);
                                if ($index !== count($categories) - 1) {
                                    echo ', '; // Agregar coma y espacio entre las categorías
                                }
                            }
                        }
                            ?>
                            
                            </h2>
                                <?php
                        preg_match_all('/<p[^>]+id="horario"[^>]*>(.*?)<\/p>/is', $content, $matches);
                        // Mostrar los párrafos encontrados
                        if (!empty($matches[0])) {
                            foreach ($matches[0] as $paragraph) {
                                echo $paragraph;
                            }
                        }
                        ?>
                                </div>
                             
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <?php endforeach; ?>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-6 left-1/2 m-6" id="slider">
            <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="6"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="7"></button>
            <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 9" data-carousel-slide-to="8"></button>

       
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

    




<!-- FINSECCION SLIDER -->


</div>

 

<div class="slider  md:hidden block p-3">
<a href="<?php echo esc_url(home_url('/programacion')); ?>">
  <ul class="slides-container">

<?php foreach ($programacion_query->posts as $post) : setup_postdata($post); 
                   


                    // Obtener la URL de la primera imagen encontrada en el contenido
                    $content = get_the_content();
                    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                    $image_url = isset($matches[1]) ? $matches[1] : '';
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');
                    ?>

    <li class="slide"  style="background-image: url(<?php echo esc_url($image_url); ?>); background-size: cover; background-position: center; pointer-events:none;" >
         
       <div style="position:absolute;width:100%;height:100%;" id="bg-2"></div>
      <div class="parallax">
      <div class="center">

      <p><?php echo esc_html($entry_title); ?> </p>
      
<div class="flex items-center justify-center">
        <svg class="svgs" id="svg-new" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
      <p>  <?php
                                   foreach ($categories as $index => $category) {

                            if ($category->slug !== "sin-categoria" && $category->slug !== "programacion") {
                                echo esc_html($category->name);
                                if ($index !== count($categories) - 1) {
                                    echo ', '; // Agregar coma y espacio entre las categorías
                                }
                            }
                        }
                            ?></p>

                            </div>
    <p>
      <?php

                        preg_match_all('/<p[^>]+id="horario"[^>]*>(.*?)<\/p>/is', $content, $matches);
                        // Mostrar los párrafos encontrados
                        if (!empty($matches[0])) {
                            foreach ($matches[0] as $paragraph) {
                                echo $paragraph;
                            }
                        }
                        ?>
</p>
</div>
      </div>
     
    </li>

   <?php endforeach; ?>
  </ul>
  </a>
</div>
<style>
#news-audio .wp-block-audio audio{
padding:0;
}
.entry-title{
        font-size: 3.75rem;
    line-height: 1;
        margin-top: 1rem;
}
@media screen and (max-width:766px){
    
.entry-title{
    font-size:25px;
}

}
.slide{
    pointer-events:none;
}
.slider {
  box-sizing: border-box;
  background: #F0F0F0;
  width:100%;
  height:350px;
  overflow: hidden;
}

.slider .slides-container {
  display: flex;
  width: 100%;
  height: 100%;
  cursor: -webkit-grab;
  cursor: grab;
  transition: transform .5s;
}

.slider:active .slides-container {
  cursor: -webkit-grabbing;
  cursor: grabbing;
}

.slider .slides-container.moving {
  transition: none;
}
.slider .slides-container.moving .slide {
  transition: none;
}
.slider .slides-container.moving .parallax {
  transition: none;
}

.slider .slide {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;

  opacity: .8;
  transform: scale(.9);
  transform-origin: center;
  transition: transform .5s, opacity .5s;
}

.slider .slide.current {
    background-color:blue;
  opacity: 1;
  transform: scale(1);
}

.slider .slide .parallax {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  pointer-events: none;
  transition: transform .5s, opacity .5s;
}

.slider .slide.current .parallax {
  opacity: 1;
  transform: translate3d(0, 0, 0);
}

.slider .slide .parallax .center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  transform: translateY(-50%);
  text-align: center;
  color: white;
  font-family: Circular, sans-serif;
  font-size: 3em;
}

#pod-card audio::-webkit-media-controls-play-button,
#pod-card audio::-webkit-media-controls-panel {
  background-color: #E5CC26;
}
/*

.slider .slide:nth-child(6n+2) { background: #e74c3c; }
.slider .slide:nth-child(6n+3) { background: #3498db; }
.slider .slide:nth-child(6n+4) { background: #9b59b6; }
.slider .slide:nth-child(6n+5) { background: #34495e; }
.slider .slide:nth-child(6n+6) { background: #f1c40f; }
*/
#podcast{
    padding:0;
}
/*
.gt_switcher_wrapper{
    top:65px !important;
    right:0;
}
*/
</style>


<!-- SECCION PODCAST -->




<section style="background-color: #010B15;">
    <h1 class="text-center " id="podcast">PODCAST</h1>



    <div class="flex justify-center">
        <div class=" max-w-screen-xl p-6">
            <div class="flex justify-center gap-8" id="pod-card">

                <?php


                if ($podcasts_query->have_posts()) :
                    $counter = 0;
                    while ($podcasts_query->have_posts()) :
                        $counter++;

                        $podcasts_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        $content = get_the_content();

                           $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';

                        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);


                        $image_url = isset($matches[1]) ? $matches[1] : '';
                        $short_content = mb_substr($content, 0, 400);
                        if (strlen($content) > 400) {
                            $short_content .= '...';
                        }

                        // Obtener título y etiquetas

                        $entry_title = get_the_title();
                        $categories = get_the_category();
                        $entry_date = get_the_date('d/m/Y');

                        if ($counter >= 4) :
                            continue;
                        endif;

                      
                ?>
<!--style="grid-template-rows:1fr 1fr;"-->



                        <div class="max-w-sm rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative w-full" >
<!--style="height:0;"-->
                            <div class="relative z-1" style="height:275px;">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="absolute flex flex-col justify-center p-3" style="right: 0; bottom:0; z-index:3;">
                                        <svg id="svgs-pod" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                        </svg>
                                        <p class="text-white hora"></p>
                                    </div>
                                    <img class="rounded-t-lg w-full h-full object-cover absolute" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" />
                                </a>
                            </div>
                            <div class="p-5" style="background-color:#041824 ;">


                                <a href="<?php the_permalink(); ?>" class="flex gap-5 w-full justify-between">

                                   
                               
                                </a>
                             <a href="<?php the_permalink(); ?>">  <p class="mb-3 font-bold text-white dark:text-gray-400" style="color:#E5CC26;"><?php echo esc_html($entry_title); ?>
                                </a> 

      <a href="<?php the_permalink(); ?>">                         
<p class="py-2 text-white">
        <?php 
$contenido = wp_strip_all_tags(get_the_content());
$limiteCaracteres = 100;

if (strlen($contenido) > $limiteCaracteres) {

    $textoRecortado = substr($contenido, 0, $limiteCaracteres);

    
     $textoRecortado .= '...';
} else {
   
    $textoRecortado = $contenido;
}


echo $textoRecortado;
?>
</p>
</a>


                            <?php
                             if(preg_match($pattern,$content,$matches2)){
                                                echo $matches2[0];
                                            }
                                            ?>
                    <div class="flex items-center justify-between">
                     <h6 class="text-gray-500"><?php echo esc_html($entry_date); ?></h6>
                                 <?php


                                   if (!empty($categories)) {
    echo '<h5 class="text-white text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';

    foreach ($categories as $index => $category) {
        if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
            $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
            echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
            
            if ($index !== count($categories) - 1 ) {
                echo ' '; // Agregar coma y espacio entre categorías
            }
        }
    }

    echo '</h5>';
}

                                    ?>








                             <!--   <p class="mb-3 font-normal text-white dark:text-gray-400"><?php echo esc_html(strip_tags($short_content)); ?></p> -->
                                </div>
                            </div>
                        </div>

                <?php
                    endwhile;
                //  wp_reset_postdata();
                endif;
                ?>

            </div>




            <div class="grid grid-cols-6 gap-8 py-6" id="grids">

                <?php
                if ($podcasts_query->have_posts()) :
                    $counter = 0;
                    while ($podcasts_query->have_posts()) :
                        $counter++;

                        $podcasts_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        $content = get_the_content();
                        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                        $image_url = isset($matches[1]) ? $matches[1] : '';
                        $short_content = mb_substr($content, 0, 400);
                        if (strlen($content) > 400) {
                            $short_content .= '...';
                        }

                        // Obtener título y etiquetas
             $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';
                        $entry_title = get_the_title();
                        $categories = get_the_category();
                        $entry_date = get_the_date('d/m/Y');

                          if ($counter <= 3) :
                            continue;
                        endif;
                ?>
<div>
                        <div class="max-w-sm rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid " id="boxes">
                            <a href="<?php the_permalink(); ?>">
                                <img class="rounded-t-lg w-full" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" id="boxes-img"/>
                            </a>
                            <div class="p-1" style="background-color:#F5F5F5 ;" >
                                <div class="relative flex flex-col justify-center" style="bottom: 50px; float: right;">
                                    <svg class="svgs" height="2.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                    </svg>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="flex gap-5">
                            
     <p class="mb-3 font-bold"><?php echo esc_html($entry_title); ?></p>

                                </a>
                           
                                        <?php
                                  if (!empty($categories)) {
    echo '<h5 class=" text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';

    foreach ($categories as $index => $category) {
        if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
            $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
            echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
            
            if ($index !== count($categories) - 1) {
                echo ' '; // Agregar coma y espacio entre categorías
            }
        }
    }

    echo '</h5>';
}

                                    ?>
                                   
                            </div>
                        </div>
    <?php
                             if(preg_match($pattern,$content,$matches2)){
                                                echo $matches2[0];
                                            }

  


                                            ?>
</div>
                <?php
                    endwhile;
                //  wp_reset_postdata();
                endif;
               
                ?>

            </div>


            <div class="flex justify-center" style="padding: 50px 0;">
                <a href="<?php echo esc_url(home_url('/podcasts')); ?>">
                    <div class="m-6 p-3 text-center font-bold rounded-lg inline-flex justify-center" style="background-color: #E5CC26;">Más podcasts</div>
                </a>
            </div>
        </div>

    </div>



</section>
<!-- FINSECCION PODCAST -->

<!-- SECCION CARD -->
<section class="bg-white">
<div class="max-w-screen-xl  bg-white" id="card-i">
    <div class="grid grid-cols-2 shadow-lg shadow-gray-500/50" id="historia">
        <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/aire.png" alt="">
        <div class=" w-full text-center p-6 m-6">
            <h1 class="text-5xl font-bold p-6" id="title-card">30 años de Radio Universidad</h1>
            <p class="text-xl p-6 font-bold" id="title-card-2">La misión de la emisora es representar los valores de
                una universidad abierta que se vincula con la comunidad que le da sentido y justifica su razón de
                ser.</p>
            <a href="<?php echo esc_url(home_url('/institucional')); ?>">
                <p class="rounded-lg p-4 text-white inline-flex" style="background-color: #07376A;"> Conocé nuestra
                    historia</p>
            </a>
        </div>
    </div>
</div>
</section>
<!-- FINSECCION CARD -->

<!-- SECCION FORMULARIO -->
<h1 class="py-6 md:text-4xl text-2xl font-bold text-center bg-white" style="color:#07376A;">Dejanos un mensaje</h1>
<div class="flex justify-center  bg-white">

    <div style="max-width: 640px;width: 100%;">

        <form class="p-6" method="post" action="" >
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input autocomplete="on" type="text" id="nombre" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu nombre" required>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail</label>
                <input autocomplete="on" name="email" type="email" id="mail" placeholder="Tu mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                <textarea name="message" placeholder="Tu mensaje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required style="padding: 5px 5px 45px 5px;"></textarea>
            </div>
            <button name="contact_form_submit" style="position: relative; left: 50%; transform: translateX(-50%); background-color: #07376A; margin: 50px 0 100px 0;" type="submit" class=" text-white text-center  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">Enviar
                mensaje</button>
        </form>
    </div>
</div>
<!-- FINSECCION FORMULARIO -->
<script>
function obtenerDuracionDeTodosLosAudios() {
  var tiempo = [];
  var bloquesAudio = document.querySelectorAll('#pod-card .max-w-sm');
  let elementsArray = Array.from(bloquesAudio);
  var hora1 = document.getElementsByClassName("hora");
  function cargarMetadato(audio) {
    return new Promise(function(resolve) {
      audio.onloadedmetadata = function() {
        resolve(audio.duration);
      };
    });
  }
  var promesas = elementsArray.map(function(bloquesAudio) {
    var reproductorAudio = bloquesAudio.querySelector('audio');
    if (reproductorAudio) {
      return cargarMetadato(reproductorAudio);
    } else {
      return Promise.resolve(0);
    }
  });
  Promise.all(promesas).then(function(duraciones) {
    for (var j = 0; j < duraciones.length; j++) {
      if (duraciones[j] != 0) {
        hora1[j].innerHTML = Math.floor(duraciones[j] / 60) + ' m';
      }
    }
  });
}
obtenerDuracionDeTodosLosAudios();
class Slider {
  constructor(el) {
    this.el = el;
    this.container = this.el.querySelector('.slides-container');
    this.slides = this.container.querySelectorAll('.slide');
    this.parallaxes = this.container.querySelectorAll('.parallax');
    this.current = 0;
    this.currentPos;
    this.mouseOffset;
    this.moving = false;
    this.container.style.width = this.slides.length * 100 + '%';
    this.slides[0].classList.add('current');
    let startPos, lastTouchX;
    const
    dragStart = e => {
      e.stopPropagation();
      if (e.touches) lastTouchX = e.touches[0].clientX;
      startPos = e.clientX || lastTouchX;
      this.mouseOffset = 0;
      this.currentPos = this.container.getBoundingClientRect().left;
      this.moving = true;
      requestAnimationFrame(this.move.bind(this));
    },

    dragEnd = e => {
      if (this.moving) {
        const moveX = e.clientX || lastTouchX;
        if (moveX < startPos - 100) this.next();else
        if (moveX > startPos + 100) this.prev();else
        this.goTo(this.current);
        this.moving = false;
      }
    },

    dragMove = e => {
      if (e.touches) lastTouchX = e.touches[0].clientX;
      const moveX = e.clientX || lastTouchX;
      this.mouseOffset = moveX - startPos;
    };

    this.container.addEventListener('mousedown', dragStart);
    this.container.addEventListener('touchstart', dragStart);

    window.addEventListener('mouseup', dragEnd);
    this.container.addEventListener('touchend', dragEnd);

    window.addEventListener('mousemove', dragMove);
    this.container.addEventListener('touchmove', dragMove);

    window.addEventListener('keydown', e => {
      e = e || window.event;
      if (e.keyCode == '39') {// right arrow
        this.next();
      } else
      if (e.keyCode == '37') {// left arrow
        this.prev();
      }
    });
  }
  move() {
    if (this.moving) {
      this.container.style.transform = 'translate3d(' + (this.currentPos + this.mouseOffset) + 'px, 0, 0)';
      this.container.classList.add('moving');
      const slideWidth = this.slides[0].offsetWidth;
      this.slides.forEach(($_slide, i) => {
        const coef = 1 - Math.abs($_slide.getBoundingClientRect().left / slideWidth);
      //  $_slide.style.opacity = .5 + coef * .5;
        $_slide.style.transform = 'scale(' + (.9 + coef * .1) + ')';
      });
      this.parallaxes.forEach(($_item, i) => {
        const coef = this.slides[i].getBoundingClientRect().left / slideWidth;
       // $_item.style.opacity = 1 - Math.abs(coef * 1.8);
        $_item.style.transform = 'translate3d(' + -coef * 85 + '%, 0, 0)';
      });
      requestAnimationFrame(this.move.bind(this));
    }
  }

  goTo(i) {
    if (i >= 0 && i < this.slides.length) this.current = i;
    this.container.classList.remove('moving');
    this.container.style.transform = 'translate3d(' + this.current * -100 / this.slides.length + '%, 0, 0)';

    this.slides.forEach(($_slide, i) => {
      $_slide.classList.remove('current');
    //  $_slide.removeAttribute('style');
    });
    this.slides[this.current].classList.add('current');
  //this.slides[this.current].removeAttribute('style');

    this.parallaxes.forEach(($_item, i) => {
  $_item.removeAttribute('style');
      $_item.style.transform = 'translate3d(' + (i <= this.current ? 85 : -85) + '%, 0, 0)';
    });
    this.slides[this.current].querySelector('.parallax').removeAttribute('style');
  }

  next() {
    this.goTo(this.current + 1);
  }

  prev() {
    this.goTo(this.current - 1);
  }}



const $sliders = document.querySelectorAll('.slider');
const sliders = [];
$sliders.forEach($slider => {
  sliders.push(new Slider($slider));
});
</script>

<?php
get_footer();
?>


