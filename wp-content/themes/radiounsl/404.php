<?php
get_header();

?>
<section class="bg-white">

<div class="error-page">
  <div>
    <h1 data-h1="404">404</h1>
  </div>
</div>
    <p class="text-center pb-8">¡Oops! la página solicitada no existe, <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#07376A;" class="font-bold">¿Volver a inicio?</a></p>
</section>

<style>

.error-page {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  height: 100%;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
.error-page h1 {
  font-size: 15vh;
  font-weight: bold;
  position: relative;
  padding: 0;
}
.error-page h1:after {
    position:absolute;
    left:0;

  content: attr(data-h1);
  color: transparent;
  /* webkit only for graceful degradation to IE */
  background: -webkit-repeating-linear-gradient(-45deg, #295B92, #114780, #07376A, #0F335A, #4B80BB, #4B80BB, #234A75);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: 400%;
  text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.25);
  animation: animateTextBackground 10s ease-in-out infinite;
}

@keyframes animateTextBackground {
  0% {
    background-position: 0 0;
  }
  25% {
    background-position: 100% 0;
  }
  50% {
    background-position: 100% 100%;
  }
  75% {
    background-position: 0 100%;
  }
  100% {
    background-position: 0 0;
  }
}
@media (max-width: 767px) {
  .error-page h1 {
    font-size: 32vw;
  }
  .error-page h1 + p {
    font-size: 8vw;
    line-height: 10vw;
    max-width: 70vw;
  }
}
a.back {
  position: fixed;
  right: 40px;
  bottom: 40px;
  background: -webkit-repeating-linear-gradient(-45deg, #71b7e6, #69a6ce, #b98acc, #ee8176);
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  line-height: 24px;
  padding: 15px 30px;
  text-decoration: none;
  transition: 0.25s all ease-in-out;
}
a.back:hover {
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
}
</style>
<?php
get_footer();
?>