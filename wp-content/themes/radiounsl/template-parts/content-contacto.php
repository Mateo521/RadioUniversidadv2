<?php get_header(); ?>

 <!-- TITULO -->
 <div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: #F5F5F5; padding:15px 0;">
        <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif;">CONTACTO</h1>
        <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-2.png" alt="">
    </div>
    <!-- FINTITULO -->

    <!-- SECCIONCONTACTO -->

    <div class="md:grid grid-cols-2 items-center bg-white" style="justify-items: center;">
        <div class="text-center p-6">
            <h1 class="text-4xl font-bold" style="color: #07376A;">Dejanos un mensaje</h1>

            <div class="flex justify-center ">
                <div style="max-width: 640px;width: 100%;">
                    <form method="post" action="" class="p-6">
                        <div class="flex gap-5">
                            <div class="mb-6 w-full">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input name="name" type="text" id="nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tu nombre" required>
                            </div>
                            <div class="mb-6 w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail</label>
                                <input type="email" id="mail" placeholder="Tu mail" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="mensaje"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                            <input type="textarea" name="message" id="password" placeholder="Tu mensaje"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required style="padding: 5px 5px 45px 5px;">
                        </div>
                        <button style="background-color: #07376A; margin: 25px 0 100px 0;" type="submit" name="contact_form_submit"
                            class=" text-white text-center  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-3 text-center dark:bg-blue-600">Enviar
                            mensaje</button>
                    </form>
                </div>
            </div>

        </div>


        <div class="relative w-full h-full p-6"
            style="background-image: url(https://source.unsplash.com/random/500x500?sig=8); background-position: center; background-size: cover;">
            <div class="absolute w-full h-full z-1 " style="background-color: #000000a1; top: 0; left: 0;"></div>

            <div class="z-30 relative text-white text-center">
                <h1 class="text-4xl font-bold p-6   my-6">Datos de contacto</h1>
                <p class="py-3"><b>Teléfono:</b>+54 266 436-1329</p>
                <p class="py-3"><b>Dirección:</b>Av. Italia 1500 <br> San Luis, Argentina</p>
                <p class="py-3"><b>Mail:</b>ejemplo@gmail.com</p>
<a href="https://wa.me/+542664361329" target="_blank">
                <div class="p-5 inline-flex rounded-lg my-6"style="background-color:#219653;">
                    <p> Escribinos por Whatsapp</p>
                </div>
                </a>
            </div>
        </div>
    </div>

    <!-- FINSECCIONCONTACTO -->



<?php get_footer(); ?>