<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" style="background-color:white;">
      <div class="text-center font-bold py-8 text-2xl">
            <h1 class="page-title"><?php printf(esc_html__('Resultados de Búsqueda para: %s', 'tu-tema'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </div>
        <div class="flex justify-center p-8 my-6">
            <div class="max-w-screen-xl w-full">
                <div class="grid md:grid-cols-3 gap-8 relative ">
                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post();
                            $content = get_the_content();
                            preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
                            $image_url = isset($matches[1]) ? $matches[1] : '';
                        ?>
                            <div class="grid grid-rows-2 shadow-lg shadow-gray-500/50" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div>
                                    <?php if (!empty($image_url)) : ?>
                                        <img class="w-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">
                                    <?php else : ?>
                                        <img class="w-full" src="https://htmlcolorcodes.com/assets/images/colors/dark-blue-color-solid-background-1920x1080.png" id="noticia-g" alt="fondo">
                                    <?php endif; ?>
                                </div>
                                <div class="p-8">
                                    <h2 class="font-bold py-3 "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php else : ?>
                        <div id="info-search" style="position:absolute; left:50%;top:50%; transform:translate(-50%,-50%);" class="font-bold md:text-4xl">
                            <p><?php esc_html_e('Lo sentimos, no se encontraron resultados.', 'tu-tema'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
          <!-- Agregar enlace a la página anterior y siguiente -->
          <div class="flex justify-center gap-8 items-center py-8 font-bold">

          <?php echo paginate_links(); ?>
</div>
          
        
            
    </main>
</section>

<?php get_footer(); ?>