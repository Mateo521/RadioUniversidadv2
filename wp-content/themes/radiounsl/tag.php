<?php
get_header();

// Obtener información de la etiqueta actual
$current_tag = get_queried_object();

if ($current_tag) {
    ?>
    <h1 class="m-0 py-3 bg-white text-center font-bold">Etiqueta: <?php echo $current_tag->name; ?></h1>
    <?php
    // Obtener la cantidad total de entradas en la consulta actual
    $total_posts = wp_count_posts();

    // Personalizar la cantidad de noticias por página para la página de etiqueta
    global $query_string;
    query_posts($query_string . '&posts_per_page=9'); // Cambia "9" al número deseado de noticias por página

    if (have_posts()) : ?>
        <div class="flex justify-center p-8 bg-white">
            <div class="max-w-screen-xl w-full">
                <div class="grid md:grid-cols-3 gap-8">
                    <?php while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex flex-col w-full my-6">
                                <?php
                                $content = get_the_content();
                                preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                                if ($matches) {
                                    $img_src = $matches[1]; // La URL de la primera imagen
                                    echo '<img class="rounded-t-lg" src="' . $img_src . '" alt="Imagen de la noticia">';
                                }
                                ?>
                                <div class="p-6 w-full bg-white h-full shadow-lg shadow-gray-500/50">

                                    <h2 style="color: #07376A;" class="font-bold py-4" ><?php the_title(); ?></h2>

                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="pagination bg-white">
    <?php
    global $wp_query;
    $big = 999999999; // Número grande para asegurarnos de que no haya problemas con la paginación
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('&laquo; Anterior'),
        'next_text' => __('Siguiente &raquo;')
    ));
    ?>
</div>
<?php else : ?>
    <p>No se encontraron entradas en esta etiqueta.</p>
<?php endif; 
} else {
    echo '<h1>Etiqueta no encontrada</h1>';
}
?>
<style>
.pagination {

    justify-content:center;
    display:flex;
    align-items:center;
    padding: 20px;
}
.pagination .current{
        display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ccc;
    color:whitesmoke;
    background-color: #282828;
    text-decoration: none;
}
.pagination .current:hover{
 color: white;
}
.pagination a {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ccc;
    background-color: #f4f4f4;
    text-decoration: none;
}

.pagination a:hover {
    background-color: #ddd;
}
</style>
<?php
get_footer();
?>
