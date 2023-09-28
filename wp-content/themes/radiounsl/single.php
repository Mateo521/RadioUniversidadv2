<?php get_header(); ?>



<?php


while (have_posts()) :
    the_post();

    // Obtiene la fecha de la entrada
    $year = get_the_date('Y');
    $month = get_the_date('m');
    $day = get_the_date('d');





    // Obtiene el título de la entrada
    $title = sanitize_title(get_the_title());
    $entry_title = get_the_title();
    $entry_tags = get_the_tags();
    $categories = get_the_category();
    // Construye la URL de la entrada
    $spotify_url = get_post_meta(get_the_ID(),'spotify-podcast-url',true);
    
    $entry_url = home_url("$year/$month/$day/$title");
    $entry_date = get_the_date('d/m/Y');
    // Muestra el contenido de la entrada
    $content = get_the_content();
    // $content = preg_replace('/<p\s+id="subtitulo"[^>]*>.*?<\/p>/i', '', $content); elimina subtitulos
    $fragments = preg_split('/(<img[^>]+>)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);



    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    $image_url = isset($matches[1]) ? $matches[1] : '';

    $is_podcast = false;

    foreach ($categories as $category) {
        if ($category->slug === 'podcast') {
            $is_podcast = true;
            break;
        }
    }
?>


    <!--  
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>

-->


<?php



endwhile; // Fin del loop.

?>
<?php
if ($is_podcast) :
?>
    <div class="flex w-full justify-center p-8 text-white" style="background: rgb(7,55,106); background: linear-gradient(180deg, rgba(7,55,106,1) 0%, rgba(0,0,0,1) 100%);">
        <div class="max-w-screen-md w-full">




            <div class="flex w-full gap-8 justify-between" id="infos-podcasts" >


                <div class="p-6 w-full">
              
           <?php     
                if (!empty($categories)) {
                                echo '<p class="font-bold pb-5" style="text-transform:uppercase; color:#E5CC26;">';
                                foreach ($categories as $index => $category) {
                                    echo esc_html($category->name);
                                    if ($index !== count($categories) - 1) {
                                        echo ', '; // Agregar coma y espacio entre categorías
                                    }
                                }
                                echo '</p>';
                            }
                            ?>
    



                        
                    <?php

                  
                    if ($entry_tags) : ?>
                        <?php foreach ($entry_tags as $tag) : ?>
                            <p class="rounded-lg text-white p-1  inline-flex" style="background-color: #1476B3; font-size:13px;"><?php echo esc_html($tag->name); ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                   <p class="subtitulos font-bold pb-3"> </p> 
                   
                   <p class="subtextos"></p>
                            
                   <div  class="podcasts"></div>
                </div>

                <div style="max-width:205px;" class="w-full h-full">
                    <img class=" rounded-md" style="height:205px;" id="thumb" src="<?php echo esc_url($image_url); ?>" alt="">
                </div>
            </div>

        </div>

    </div>

<?php endif; ?>
<?php echo esc_html($spotify_url); ?>

<?php

               
                    if($spotify_url):
                        ?>
                    <iframe src= "<?php echo esc_url($spotify_url) ?>"></iframe>

                    <?php
                     endif;

?>
<div class="flex w-full justify-center p-8  bg-white">
    <div class="max-w-screen-md">

        <h1 class="md:text-4xl text-2xl my-3" style="color:#07376A;"><?php echo esc_html($entry_title); ?></h1>
      
        <div class="flex gap-3 items-center">
       
        

            <?php
   if (!empty($categories)) {
                                    echo '<h3 style=" text-transform: uppercase;" class="font-bold">';
                                    foreach ($categories as $index => $category) {
                                        echo esc_html($category->name);
                                        if ($index !== count($categories) - 1) {
                                            echo ', '; // Agregar coma y espacio entre categorías
                                        }
                                    }
                                    echo '</h3>';
                                }
                               

                        

            if ($entry_tags) : ?>
                <?php foreach ($entry_tags as $tag) : ?>
                    <p class="rounded-lg text-white p-1  inline-flex" style="background-color: #1476B3; font-size:13px;"><?php echo esc_html($tag->name); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <p> <?php echo esc_html($entry_date); ?></p>

        </div>

        <?php if (!$is_podcast) : ?>
            <img class="w-full my-6" src="<?php echo esc_url($image_url); ?>" alt="">
        <?php endif; ?>
        <hr>
        <div class="py-3">



            <?php
            
           
            
            foreach ($fragments as $fragment) {
                if (!preg_match('/<img[^>]+>/', $fragment)) {
                    echo $fragment;
                }
            }
            ?>

<div class="flex gap-5 items-center py-5">
<p class="px-2 bold">COMPARTIR</p>
<a href="mailto:?Título&body=Radio Universidad Nacional de San Luis:%20<?php the_permalink(); ?>"  target="blank">
<svg width="25" height="25" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.667 0.333328H2.33366C1.41699 0.333328 0.675326 1.08333 0.675326 1.99999L0.666992 12C0.666992 12.9167 1.41699 13.6667 2.33366 13.6667H15.667C16.5837 13.6667 17.3337 12.9167 17.3337 12V1.99999C17.3337 1.08333 16.5837 0.333328 15.667 0.333328ZM15.667 3.66666L9.00033 7.83333L2.33366 3.66666V1.99999L9.00033 6.16666L15.667 1.99999V3.66666Z" fill="#282828"/>
</svg>
</a>
<a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
<svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.0003 1.66667C5.39783 1.66667 1.66699 5.39751 1.66699 10C1.66699 14.1775 4.74449 17.6275 8.75449 18.23V12.2083H6.69283V10.0175H8.75449V8.56001C8.75449 6.14667 9.93033 5.08751 11.9362 5.08751C12.897 5.08751 13.4045 5.15834 13.6453 5.19084V7.10251H12.277C11.4253 7.10251 11.1278 7.91001 11.1278 8.82V10.0175H13.6237L13.2853 12.2083H11.1287V18.2475C15.1962 17.6967 18.3337 14.2183 18.3337 10C18.3337 5.39751 14.6028 1.66667 10.0003 1.66667Z" fill="#282828"/>
</svg>

</a>
<a target="_blank" href="https://wa.me/?text=<?php the_permalink(); ?>" target="blank" data-action="share/whatsapp/share">
<svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8978 4.10666C14.1628 2.37083 11.7961 1.49499 9.31111 1.69499C5.97028 1.96333 3.04194 4.28666 2.06194 7.49166C1.36194 9.78166 1.65611 12.1725 2.79611 14.1475L1.71611 17.7333C1.61278 18.0775 1.92694 18.4017 2.27444 18.3092L6.02778 17.3033C7.24361 17.9667 8.61194 18.3158 10.0053 18.3167H10.0086C13.5044 18.3167 16.7344 16.1783 17.8519 12.8658C18.9403 9.63583 18.1353 6.34666 15.8978 4.10666ZM14.0819 12.9617C13.9086 13.4475 13.0594 13.9158 12.6778 13.95C12.2961 13.985 11.9386 14.1225 10.1819 13.43C8.06778 12.5967 6.73278 10.4292 6.62944 10.2908C6.52528 10.1517 5.78028 9.16332 5.78028 8.13999C5.78028 7.11666 6.31778 6.61333 6.50861 6.40583C6.69944 6.19749 6.92444 6.14583 7.06361 6.14583C7.20194 6.14583 7.34111 6.14583 7.46195 6.15083C7.61028 6.15666 7.77444 6.16416 7.93028 6.50999C8.11528 6.92166 8.51944 7.94999 8.57111 8.05416C8.62278 8.15833 8.65778 8.27999 8.58861 8.41833C8.51944 8.55666 8.48444 8.64332 8.38111 8.76499C8.27694 8.88666 8.16278 9.03583 8.06944 9.12916C7.96528 9.23249 7.85694 9.34583 7.97778 9.55333C8.09944 9.76166 8.51611 10.4425 9.13444 10.9933C9.92944 11.7017 10.5986 11.9208 10.8069 12.0258C11.0153 12.13 11.1361 12.1125 11.2578 11.9733C11.3794 11.835 11.7778 11.3667 11.9161 11.1583C12.0544 10.95 12.1936 10.985 12.3844 11.0542C12.5753 11.1233 13.5978 11.6267 13.8053 11.7308C14.0136 11.835 14.1519 11.8867 14.2036 11.9733C14.2553 12.0592 14.2553 12.4758 14.0819 12.9617Z" fill="#282828"/>
</svg>

</svg>
</a>
<a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
<svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8333 2.5H4.16667C3.24583 2.5 2.5 3.24583 2.5 4.16667V15.8333C2.5 16.7542 3.24583 17.5 4.16667 17.5H15.8333C16.7542 17.5 17.5 16.7542 17.5 15.8333V4.16667C17.5 3.24583 16.7542 2.5 15.8333 2.5ZM14.2083 7.92833C14.2083 8 14.2083 8.07083 14.2083 8.21417C14.2083 10.9283 12.1367 14.0717 8.35083 14.0717C7.20833 14.0717 6.13667 13.7142 5.20833 13.1433C5.35083 13.1433 5.56583 13.1433 5.70833 13.1433C6.63667 13.1433 7.56583 12.7858 8.28 12.2858C7.35167 12.2858 6.6375 11.6433 6.35167 10.8575C6.49417 10.8575 6.6375 10.9292 6.70917 10.9292C6.92333 10.9292 7.06667 10.9292 7.28083 10.8575C6.3525 10.6433 5.63833 9.8575 5.63833 8.8575C5.92417 9 6.21 9.07167 6.56667 9.14333C5.995 8.64333 5.63833 8.07167 5.63833 7.3575C5.63833 7 5.71 6.64333 5.92417 6.3575C6.92417 7.57167 8.42417 8.42917 10.1383 8.5C10.1383 8.3575 10.0667 8.21417 10.0667 8C10.0667 6.8575 10.995 5.92833 12.1383 5.92833C12.71 5.92833 13.2808 6.1425 13.6383 6.57083C14.1383 6.49917 14.5667 6.285 14.9242 6.07083C14.7817 6.57083 14.4242 6.92833 13.9958 7.21333C14.4242 7.14167 14.7817 7.07083 15.21 6.85583C14.9225 7.28583 14.5658 7.6425 14.2083 7.92833Z" fill="#282828"/>
</svg>

</a>
</div>

        </div>


        

        <div class="flex items-center gap-3">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 20L4 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM6 12H4V10H6V12ZM6 9H4V7H6V9ZM6 6H4V4H6V6ZM13 12H8V10H13V12ZM16 9H8V7H16V9ZM16 6H8V4H16V6Z" fill="#535353"/>
</svg>
        <h1 class="my-6 text-xl font-bold" style="color:#535353;">Dejanos un comentario</h1>
     
        </div>



<!-- SECCION COMENTARIOS -->


<?php
$comments = get_comments(array(
    'post_id' => get_the_ID(),
    'status' => 'approve', // Obtener solo comentarios aprobados
));

// Mostrar los comentarios
while (have_posts()) : the_post();
    comments_template();
endwhile;
?>
<!-- FIN SECCION COMENTARIOS -->


<!-- ULTIMAS NOTICIAS PODCASTS -->
<?php if ($is_podcast) : ?>
    <h1 class="font-bold text-xl">Últimos podcasts</h1>
<div class="grid grid-cols-4 gap-8 py-6" id="grids" style="justify-items: center;">

<?php

$args_podcasts = array(
'category_name' => 'podcast', // Nombre de la categoría de podcasts
'posts_per_page' => 4 // Mostrar todas las noticias de podcasts
);
$podcasts_query = new WP_Query($args_podcasts);
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

$entry_title = get_the_title();
$categories = get_the_category();
$entry_date = get_the_date('d/m/Y');

if ($counter >= 8) :
    continue;
endif;
?>



<div class="max-w-sm rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid " id="boxes">
    <a href="<?php the_permalink(); ?>">
        <img class="rounded-t-lg w-full" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" id="boxes-img"/>
    </a>
    <div class="p-1 rounded-b-lg" style="background-color:#F5F5F5 ;" >
        <div class="relative flex flex-col justify-center" style="bottom: 50px; float: right;">
            <svg class="svgs" height="2.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
            </svg>
        </div>
        <a href="<?php the_permalink(); ?>" class="flex gap-5">
            <?php
            if (!empty($categories)) {
                echo '<h5 class="mb-2 text-md font-bold tracking-tight" style="text-transform:uppercase;">';


                foreach ($categories as $index => $category) {

                    if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                        echo esc_html($category->name);
                        if ($index !== count($categories) - 1) {
                            echo ' '; // Agregar coma y espacio entre categorías
                        }
                    }
                }
                echo '</h5>';
            }
            ?>


        </a>
        <p class="mb-3 font-bold"><?php echo esc_html($entry_title); ?></p>
    </div>
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


<?php endif; ?>



<!-- ULTIMAS NOTICIAS -->
<?php if (!$is_podcast) : ?>
    <h1 class="font-bold text-xl">Últimas noticias</h1>
<div class="grid grid-cols-4 gap-8 py-6" id="grids" style="justify-items: center;">

<?php

$args = array(
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'category__not_in' => array(7,8)
);
$noticias_query = new WP_Query($args);
if ($noticias_query->have_posts()) :
$counter = 0;
while ($noticias_query->have_posts()) :
$counter++;

$noticias_query->the_post();
$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
$content = get_the_content();
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

if ($counter >= 8) :
    continue;
endif;
?>



<div class="max-w-sm rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid " id="boxes">
    <a href="<?php the_permalink(); ?>">
        <img class="rounded-t-lg w-full" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" id="boxes-img"/>
    </a>
    <div class="p-1 rounded-b-lg" style="background-color:#F5F5F5 ;" >
        <div class="relative flex flex-col justify-center" style="bottom: 50px; float: right;">
            <svg class="svgs" height="2.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
            </svg>
        </div>
        <a href="<?php the_permalink(); ?>" class="flex gap-5">
            <?php
            if (!empty($categories)) {
                echo '<h5 class="mb-2 text-md font-bold tracking-tight" style="text-transform:uppercase;">';


                foreach ($categories as $index => $category) {

                    if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                        echo esc_html($category->name);
                        if ($index !== count($categories) - 1) {
                            echo ' '; // Agregar coma y espacio entre categorías
                        }
                    }
                }
                echo '</h5>';
            }
            ?>


        </a>
        <p class="mb-3 font-bold"><?php echo esc_html($entry_title); ?></p>
    </div>
</div>

<?php
endwhile;
//  wp_reset_postdata();
endif;
?>

</div>


<div class="flex justify-center" style="padding: 50px 0;">
<a href="<?php echo esc_url(home_url('/noticias')); ?>">
<div class="m-6 p-3 text-center font-bold rounded-lg inline-flex justify-center text-white" style="background-color: #07376A">Más noticias</div>
</a>
</div>


<?php endif; ?>


    </div>
</div>



<script>

document.addEventListener('DOMContentLoaded', function() {
    // Encuentra el elemento del subtítulo por su id
    var subtituloElement = document.getElementById('subtitulo');
    var subtextoElement = document.getElementById('subtexto');
    var podcassElement = document.getElementById('podcast');

    var otraUbicacionContainer_1 = document.querySelector('.subtitulos');
    var otraUbicacionContainer_2 = document.querySelector('.subtextos');
    var otraUbicacionContainer_3 = document.querySelector('.podcasts');
    // Mueve el subtítulo al nuevo contenedor
    otraUbicacionContainer_1.appendChild(subtituloElement);
    otraUbicacionContainer_2.appendChild(subtextoElement);
    otraUbicacionContainer_3.appendChild(podcassElement);
});
</script>
<style>
    .podcasts audio::-webkit-media-controls-play-button,
.podcasts audio::-webkit-media-controls-panel {
  background-color: #E5CC26;

}
#thumb{
    margin:55px 0;
}
@media screen and (max-width:766px){
    #infos-podcasts{
        align-items:center;
        flex-direction:column-reverse;
    }
    #thumb{
        margin:0;
    }
}

    video {
        padding: 15px 0;
    }
</style>

<?php get_footer(); ?>