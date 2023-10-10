<?php
wp_footer();
?>



<!-- FOOTER -->

<style>
#seccion-radio{
bottom:-116px;
}</style>
<script>
  let activado2 = false;
function displayfooter(){

  if(activado2){
      
         $("#radio").css({bottom:"0"});
      $("#seccion-radio").css({bottom:"0"});
     
  }
  else{
       $("#radio").css({bottom:"-135px"});
      $("#seccion-radio").css({bottom:"-116px"});
     
  }
  activado2 = !activado2;
}
</script>
<div class="footer">
<footer id="footer">



    <div class="grid md:grid-cols-4 w-full max-w-screen-xl p-4">
        <div class="p-2">
            <p class="pb-8"> INFORMACIÓN INSTITUCIONAL</p>

            <img class="footer-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/unsl.png" alt="">
            <p class="py-3">Teléfono: +54(0266) 4520300</p>
            <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
        </div>
        <div class="p-2">
            <p class="pb-8"> CONTACTO</p>
   <div class="w-full">
            <svg  width="157" height="105" viewBox="0 0 107 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.86744 0L32.7653 0.0118928L28.8064 21.6488C28.8064 21.6488 27.5263 31.0283 16.266 31.8687C16.266 31.8687 7.43953 32.6417 3.12901 29.7122C3.12901 29.7122 -0.573064 27.6071 0.153917 22.2038L4.86744 0Z" fill="white"/>
<path d="M8.54988 0H4.86756L0.48197 20.8877C0.48197 20.8877 -2.37064 28.7092 5.80394 30.8063C5.80394 30.8063 1.24056 27.9441 3.52423 22.0334C3.52423 22.0334 13.0303 27.183 10.557 19.1712C10.557 19.1712 7.32507 15.5478 6.56648 13.8313C6.56648 13.8313 4.28677 10.3983 7.70832 11.9245C7.70832 11.9245 4.85571 4.10301 8.27726 6.20011C8.27726 6.20011 7.02875 0.570854 8.54988 0Z" fill="#A2A6A9"/>
<path d="M9.88131 0.0119629C10.6399 2.87416 13.9824 4.48365 13.9824 4.48365C18.3562 5.24479 18.1665 9.44294 18.1665 9.44294C17.9769 14.0217 21.5881 13.0663 21.5881 13.0663C26.1515 4.86422 29.0041 11.9206 29.0041 11.9206C27.1036 12.3012 26.7243 15.7342 26.7243 15.7342C26.3451 24.5111 17.9808 26.2237 17.9808 26.2237C9.04371 26.414 9.42695 31.7578 9.42695 31.7578C28.0598 33.8549 28.8184 21.6489 28.8184 21.6489L32.7654 0.0119629H9.88131Z" fill="#0F75B1"/>
<path d="M26.3847 10.8981C26.3847 10.7276 26.2464 10.5889 26.0765 10.5889C25.9066 10.5889 25.7683 10.7276 25.7683 10.8981C25.7683 11.0685 25.9066 11.2073 26.0765 11.2073C26.2464 11.2073 26.3847 11.0685 26.3847 10.8981Z" fill="#0F75B1"/>
<path id="letras" d="M40.7957 20.5V8.86364H48.0117V10.375H42.5514V13.9205H47.4946V15.4261H42.5514V20.5H40.7957ZM50.1707 8.86364H52.3014L56.006 17.9091H56.1423L59.8469 8.86364H61.9776V20.5H60.3071V12.0795H60.1992L56.7673 20.483H55.381L51.9492 12.0739H51.8412V20.5H50.1707V8.86364ZM72.7904 8.70455C73.3472 8.70833 73.8889 8.80682 74.4154 9C74.9457 9.18939 75.423 9.5 75.8472 9.93182C76.2715 10.3598 76.6086 10.9337 76.8586 11.6534C77.1086 12.3731 77.2336 13.2633 77.2336 14.3239C77.2374 15.3239 77.1313 16.2178 76.9154 17.0057C76.7033 17.7898 76.3984 18.4527 76.0006 18.9943C75.6029 19.536 75.1237 19.9489 74.5631 20.233C74.0025 20.517 73.3719 20.6591 72.6711 20.6591C71.9362 20.6591 71.2847 20.5152 70.7166 20.2273C70.1522 19.9394 69.6957 19.5455 69.3472 19.0455C68.9987 18.5455 68.7847 17.9735 68.7052 17.3295H70.7791C70.8851 17.7917 71.101 18.1591 71.4268 18.4318C71.7563 18.7008 72.1711 18.8352 72.6711 18.8352C73.4779 18.8352 74.0991 18.4848 74.5347 17.7841C74.9703 17.0833 75.1881 16.1098 75.1881 14.8636H75.1086C74.923 15.197 74.6825 15.4848 74.387 15.7273C74.0916 15.9659 73.7563 16.1496 73.3813 16.2784C73.0101 16.4072 72.6162 16.4716 72.1995 16.4716C71.5177 16.4716 70.9041 16.3087 70.3586 15.983C69.8169 15.6572 69.387 15.2102 69.0688 14.642C68.7544 14.0739 68.5953 13.4242 68.5916 12.6932C68.5916 11.9356 68.7658 11.2557 69.1143 10.6534C69.4666 10.0473 69.9571 9.57008 70.5859 9.22159C71.2147 8.86932 71.9495 8.69697 72.7904 8.70455ZM72.7961 10.4091C72.387 10.4091 72.0177 10.5095 71.6881 10.7102C71.3624 10.9072 71.1048 11.1761 70.9154 11.517C70.7298 11.8542 70.637 12.2311 70.637 12.6477C70.6408 13.0606 70.7336 13.4356 70.9154 13.7727C71.101 14.1098 71.3529 14.3769 71.6711 14.5739C71.9931 14.7708 72.3605 14.8693 72.7734 14.8693C73.0802 14.8693 73.3662 14.8106 73.6313 14.6932C73.8965 14.5758 74.1275 14.4129 74.3245 14.2045C74.5253 13.9924 74.6806 13.7519 74.7904 13.483C74.9041 13.214 74.959 12.9299 74.9552 12.6307C74.9552 12.233 74.8605 11.8655 74.6711 11.5284C74.4855 11.1913 74.2298 10.9205 73.9041 10.7159C73.5821 10.5114 73.2128 10.4091 72.7961 10.4091ZM79.2393 20.5L84.1881 10.7045V10.625H78.4438V8.86364H86.37V10.6648L81.4268 20.5H79.2393ZM87.4935 20.625C87.1488 20.625 86.8534 20.5038 86.6072 20.2614C86.361 20.0189 86.2398 19.7235 86.2435 19.375C86.2398 19.0341 86.361 18.7424 86.6072 18.5C86.8534 18.2576 87.1488 18.1364 87.4935 18.1364C87.8269 18.1364 88.1166 18.2576 88.3629 18.5C88.6129 18.7424 88.7398 19.0341 88.7435 19.375C88.7398 19.6061 88.6791 19.8163 88.5617 20.0057C88.4481 20.1951 88.2966 20.3466 88.1072 20.4602C87.9216 20.5701 87.717 20.625 87.4935 20.625ZM94.7123 8.70455C95.2691 8.70833 95.8108 8.80682 96.3373 9C96.8676 9.18939 97.3449 9.5 97.7691 9.93182C98.1934 10.3598 98.5305 10.9337 98.7805 11.6534C99.0305 12.3731 99.1555 13.2633 99.1555 14.3239C99.1593 15.3239 99.0532 16.2178 98.8373 17.0057C98.6252 17.7898 98.3202 18.4527 97.9225 18.9943C97.5248 19.536 97.0456 19.9489 96.485 20.233C95.9244 20.517 95.2937 20.6591 94.593 20.6591C93.8581 20.6591 93.2066 20.5152 92.6384 20.2273C92.074 19.9394 91.6176 19.5455 91.2691 19.0455C90.9206 18.5455 90.7066 17.9735 90.6271 17.3295H92.7009C92.807 17.7917 93.0229 18.1591 93.3487 18.4318C93.6782 18.7008 94.093 18.8352 94.593 18.8352C95.3998 18.8352 96.021 18.4848 96.4566 17.7841C96.8922 17.0833 97.11 16.1098 97.11 14.8636H97.0305C96.8449 15.197 96.6043 15.4848 96.3089 15.7273C96.0134 15.9659 95.6782 16.1496 95.3032 16.2784C94.932 16.4072 94.538 16.4716 94.1214 16.4716C93.4396 16.4716 92.8259 16.3087 92.2805 15.983C91.7388 15.6572 91.3089 15.2102 90.9907 14.642C90.6763 14.0739 90.5172 13.4242 90.5134 12.6932C90.5134 11.9356 90.6877 11.2557 91.0362 10.6534C91.3884 10.0473 91.879 9.57008 92.5077 9.22159C93.1365 8.86932 93.8714 8.69697 94.7123 8.70455ZM94.718 10.4091C94.3089 10.4091 93.9396 10.5095 93.61 10.7102C93.2843 10.9072 93.0267 11.1761 92.8373 11.517C92.6517 11.8542 92.5589 12.2311 92.5589 12.6477C92.5627 13.0606 92.6555 13.4356 92.8373 13.7727C93.0229 14.1098 93.2748 14.3769 93.593 14.5739C93.9149 14.7708 94.2824 14.8693 94.6952 14.8693C95.0021 14.8693 95.288 14.8106 95.5532 14.6932C95.8184 14.5758 96.0494 14.4129 96.2464 14.2045C96.4471 13.9924 96.6024 13.7519 96.7123 13.483C96.8259 13.214 96.8809 12.9299 96.8771 12.6307C96.8771 12.233 96.7824 11.8655 96.593 11.5284C96.4074 11.1913 96.1517 10.9205 95.8259 10.7159C95.504 10.5114 95.1346 10.4091 94.718 10.4091ZM34.2098 28.5V23.4091H36.2183C36.6028 23.4091 36.9309 23.4779 37.2027 23.6154C37.4761 23.7513 37.6841 23.9444 37.8266 24.1946C37.9708 24.4432 38.0429 24.7357 38.0429 25.0721C38.0429 25.4102 37.97 25.701 37.8242 25.9446C37.6783 26.1866 37.467 26.3722 37.1903 26.5014C36.9152 26.6307 36.5821 26.6953 36.191 26.6953H34.8462V25.8303H36.017C36.2225 25.8303 36.3932 25.8021 36.5291 25.7457C36.6649 25.6894 36.766 25.6049 36.8323 25.4922C36.9003 25.3795 36.9342 25.2395 36.9342 25.0721C36.9342 24.9031 36.9003 24.7605 36.8323 24.6445C36.766 24.5285 36.6641 24.4407 36.5266 24.381C36.3907 24.3197 36.2192 24.2891 36.012 24.2891H35.2862V28.5H34.2098ZM36.9591 26.1832L38.2244 28.5H37.0362L35.7982 26.1832H36.9591ZM39.681 28.5H38.5276L40.2851 23.4091H41.6722L43.4271 28.5H42.2737L40.9985 24.5724H40.9587L39.681 28.5ZM39.609 26.4989H42.3334V27.3391H39.609V26.4989ZM45.8446 28.5H44.0399V23.4091H45.8595C46.3716 23.4091 46.8124 23.511 47.1819 23.7148C47.5515 23.917 47.8357 24.2079 48.0346 24.5874C48.2351 24.9669 48.3353 25.4209 48.3353 25.9496C48.3353 26.4799 48.2351 26.9356 48.0346 27.3168C47.8357 27.6979 47.5498 27.9904 47.177 28.1942C46.8057 28.3981 46.3616 28.5 45.8446 28.5ZM45.1162 27.5778H45.7998C46.118 27.5778 46.3856 27.5214 46.6027 27.4087C46.8215 27.2944 46.9856 27.1179 47.0949 26.8793C47.206 26.639 47.2615 26.3291 47.2615 25.9496C47.2615 25.5734 47.206 25.266 47.0949 25.0273C46.9856 24.7887 46.8223 24.613 46.6052 24.5004C46.3881 24.3877 46.1205 24.3313 45.8023 24.3313H45.1162V27.5778ZM50.209 23.4091V28.5H49.1327V23.4091H50.209ZM55.7728 25.9545C55.7728 26.5097 55.6676 26.982 55.4571 27.3714C55.2483 27.7609 54.9633 28.0584 54.602 28.2638C54.2424 28.4677 53.8381 28.5696 53.389 28.5696C52.9365 28.5696 52.5305 28.4669 52.1709 28.2614C51.8113 28.0559 51.5271 27.7584 51.3183 27.369C51.1095 26.9795 51.0051 26.508 51.0051 25.9545C51.0051 25.3994 51.1095 24.9271 51.3183 24.5376C51.5271 24.1482 51.8113 23.8516 52.1709 23.6477C52.5305 23.4422 52.9365 23.3395 53.389 23.3395C53.8381 23.3395 54.2424 23.4422 54.602 23.6477C54.9633 23.8516 55.2483 24.1482 55.4571 24.5376C55.6676 24.9271 55.7728 25.3994 55.7728 25.9545ZM54.6816 25.9545C54.6816 25.5949 54.6277 25.2917 54.52 25.0447C54.4139 24.7978 54.264 24.6106 54.0701 24.483C53.8762 24.3554 53.6491 24.2915 53.389 24.2915C53.1288 24.2915 52.9017 24.3554 52.7079 24.483C52.514 24.6106 52.3632 24.7978 52.2554 25.0447C52.1494 25.2917 52.0963 25.5949 52.0963 25.9545C52.0963 26.3142 52.1494 26.6174 52.2554 26.8643C52.3632 27.1113 52.514 27.2985 52.7079 27.4261C52.9017 27.5537 53.1288 27.6175 53.389 27.6175C53.6491 27.6175 53.8762 27.5537 54.0701 27.4261C54.264 27.2985 54.4139 27.1113 54.52 26.8643C54.6277 26.6174 54.6816 26.3142 54.6816 25.9545ZM61.3348 23.4091H62.4112V26.7152C62.4112 27.0864 62.3225 27.4112 62.1452 27.6896C61.9695 27.968 61.7234 28.1851 61.4069 28.3409C61.0904 28.495 60.7216 28.5721 60.3007 28.5721C59.8781 28.5721 59.5086 28.495 59.192 28.3409C58.8755 28.1851 58.6294 27.968 58.4538 27.6896C58.2781 27.4112 58.1903 27.0864 58.1903 26.7152V23.4091H59.2666V26.6232C59.2666 26.8171 59.3089 26.9895 59.3934 27.1403C59.4796 27.2911 59.6005 27.4096 59.7563 27.4957C59.9121 27.5819 60.0936 27.625 60.3007 27.625C60.5095 27.625 60.691 27.5819 60.8451 27.4957C61.0009 27.4096 61.121 27.2911 61.2055 27.1403C61.2917 26.9895 61.3348 26.8171 61.3348 26.6232V23.4091ZM67.5549 23.4091V28.5H66.6252L64.4104 25.2958H64.3731V28.5H63.2967V23.4091H64.2413L66.4388 26.6108H66.4835V23.4091H67.5549ZM69.5205 23.4091V28.5H68.4442V23.4091H69.5205ZM71.3258 23.4091L72.5563 27.277H72.6035L73.8365 23.4091H75.0297L73.2747 28.5H71.8876L70.1302 23.4091H71.3258ZM75.6424 28.5V23.4091H79.0728V24.2965H76.7188V25.5096H78.8963V26.397H76.7188V27.6126H79.0828V28.5H75.6424ZM79.9286 28.5V23.4091H81.9371C82.3215 23.4091 82.6497 23.4779 82.9215 23.6154C83.1949 23.7513 83.4029 23.9444 83.5454 24.1946C83.6896 24.4432 83.7617 24.7357 83.7617 25.0721C83.7617 25.4102 83.6887 25.701 83.5429 25.9446C83.3971 26.1866 83.1858 26.3722 82.909 26.5014C82.6339 26.6307 82.3008 26.6953 81.9097 26.6953H80.5649V25.8303H81.7357C81.9412 25.8303 82.1119 25.8021 82.2478 25.7457C82.3837 25.6894 82.4848 25.6049 82.5511 25.4922C82.619 25.3795 82.653 25.2395 82.653 25.0721C82.653 24.9031 82.619 24.7605 82.5511 24.6445C82.4848 24.5285 82.3829 24.4407 82.2453 24.381C82.1094 24.3197 81.9379 24.2891 81.7308 24.2891H81.0049V28.5H79.9286ZM82.6778 26.1832L83.9431 28.5H82.7549L81.517 26.1832H82.6778ZM87.284 24.8732C87.2641 24.6727 87.1788 24.5169 87.028 24.4059C86.8772 24.2949 86.6725 24.2393 86.414 24.2393C86.2383 24.2393 86.09 24.2642 85.969 24.3139C85.8481 24.362 85.7553 24.4291 85.6906 24.5153C85.6277 24.6014 85.5962 24.6992 85.5962 24.8086C85.5929 24.8997 85.6119 24.9793 85.6533 25.0472C85.6964 25.1152 85.7553 25.174 85.8298 25.2237C85.9044 25.2718 85.9906 25.314 86.0884 25.3505C86.1861 25.3853 86.2905 25.4151 86.4016 25.44L86.859 25.5494C87.081 25.5991 87.2849 25.6654 87.4705 25.7482C87.6561 25.8311 87.8168 25.933 87.9527 26.054C88.0886 26.175 88.1938 26.3175 88.2684 26.4815C88.3446 26.6456 88.3836 26.8337 88.3852 27.0458C88.3836 27.3574 88.304 27.6275 88.1466 27.8562C87.9908 28.0832 87.7654 28.2597 87.4705 28.3857C87.1771 28.5099 86.8233 28.5721 86.409 28.5721C85.998 28.5721 85.6401 28.5091 85.3352 28.3832C85.0319 28.2572 84.7949 28.0708 84.6242 27.8239C84.4552 27.5753 84.3665 27.2679 84.3582 26.9016H85.3998C85.4114 27.0723 85.4603 27.2148 85.5465 27.3292C85.6343 27.4419 85.7511 27.5272 85.897 27.5852C86.0444 27.6416 86.211 27.6697 86.3966 27.6697C86.5789 27.6697 86.7371 27.6432 86.8714 27.5902C87.0073 27.5372 87.1125 27.4634 87.1871 27.369C87.2617 27.2745 87.2989 27.166 87.2989 27.0433C87.2989 26.929 87.265 26.8329 87.197 26.755C87.1307 26.6771 87.033 26.6108 86.9037 26.5561C86.7761 26.5014 86.6195 26.4517 86.4339 26.407L85.8795 26.2678C85.4503 26.1634 85.1114 26.0001 84.8629 25.7781C84.6143 25.556 84.4908 25.2569 84.4925 24.8807C84.4908 24.5724 84.5729 24.3031 84.7386 24.0728C84.9059 23.8424 85.1355 23.6626 85.4271 23.5334C85.7188 23.4041 86.0502 23.3395 86.4215 23.3395C86.7993 23.3395 87.1291 23.4041 87.4108 23.5334C87.6942 23.6626 87.9146 23.8424 88.072 24.0728C88.2295 24.3031 88.3107 24.57 88.3156 24.8732H87.284ZM90.1856 23.4091V28.5H89.1092V23.4091H90.1856ZM92.8758 28.5H91.0711V23.4091H92.8907C93.4028 23.4091 93.8436 23.511 94.2132 23.7148C94.5827 23.917 94.8669 24.2079 95.0658 24.5874C95.2663 24.9669 95.3666 25.4209 95.3666 25.9496C95.3666 26.4799 95.2663 26.9356 95.0658 27.3168C94.8669 27.6979 94.5811 27.9904 94.2082 28.1942C93.837 28.3981 93.3929 28.5 92.8758 28.5ZM92.1475 27.5778H92.8311C93.1493 27.5778 93.4169 27.5214 93.634 27.4087C93.8527 27.2944 94.0168 27.1179 94.1262 26.8793C94.2372 26.639 94.2927 26.3291 94.2927 25.9496C94.2927 25.5734 94.2372 25.266 94.1262 25.0273C94.0168 24.7887 93.8536 24.613 93.6365 24.5004C93.4194 24.3877 93.1517 24.3313 92.8336 24.3313H92.1475V27.5778ZM96.7543 28.5H95.6009L97.3583 23.4091H98.7454L100.5 28.5H99.347L98.0718 24.5724H98.032L96.7543 28.5ZM96.6822 26.4989H99.4066V27.3391H96.6822V26.4989ZM102.918 28.5H101.113V23.4091H102.933C103.445 23.4091 103.886 23.511 104.255 23.7148C104.625 23.917 104.909 24.2079 105.108 24.5874C105.308 24.9669 105.409 25.4209 105.409 25.9496C105.409 26.4799 105.308 26.9356 105.108 27.3168C104.909 27.6979 104.623 27.9904 104.25 28.1942C103.879 28.3981 103.435 28.5 102.918 28.5ZM102.189 27.5778H102.873C103.191 27.5778 103.459 27.5214 103.676 27.4087C103.895 27.2944 104.059 27.1179 104.168 26.8793C104.279 26.639 104.335 26.3291 104.335 25.9496C104.335 25.5734 104.279 25.266 104.168 25.0273C104.059 24.7887 103.896 24.613 103.678 24.5004C103.461 24.3877 103.194 24.3313 102.876 24.3313H102.189V27.5778Z" fill="#E6E6E6"/>
</svg>
</div>
            <p class="py-3">Teléfono: +54(0266)</p>
            <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
            <p class="py-3">Email: ejemplo@gmail.com</p>
        </div>
        <div class="p-2 md:block flex gap-5 items-center">
            <p class="">REDES SOCIALES</p>
            <ul class="flex gap-3 text-gray-400 items-center md:py-8 ">
                <a href="https://www.facebook.com/unslradio/?locale=es_LA" target="_blank">
                    <li><img width="35px" src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="">
                    </li>
                </a>
                <a href="https://www.instagram.com/unslradio/?hl=es" target="_blank">
                    <li><img width="35px" src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_instagram-512.png" alt=""></li>
                </a>
                <a href="https://www.youtube.com/@radiounslcontenidos" target="_blank">
                    <li><img width="35px" src="https://freelogopng.com/images/all_img/1656501968youtube-icon-png.png" alt=""></li>
                </a>
            </ul>
        </div>
        <div class="p-2">
            <p class="pb-8">MAPA DE SITIO</p>
            <ul>
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white">Inicio</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="text-white  ">Noticias</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/podcasts')); ?>" class="text-white  ">Podcast</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/programacion')); ?>" class="text-white  ">Programación</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="text-white  ">Institucional</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="text-white  ">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
    <hr>

   <p class="px-6" style="font-size:13px;">Diseño y Desarrollo a cargo de la Secretaría de Comunicación Institucional - Versión 1.0-beta - Contacto: <a href="mailto:sci@unsl.edu.ar" style="color:#007bff">sci@unsl.edu.ar</a></p>

</footer>
</div>
<!-- Main modal -->
<div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Compartir vínculo:
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">ABC</p>
                <ul class="my-4 space-y-3">
                    <li>
                        <a target="_blank" href="https://wa.me/?text=radiouniversidad.unsl.edu.ar" data-action="share/whatsapp/share" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg"/>
                            
                            <span class="flex-1 ml-3 whitespace-nowrap">Whatsapp</span>
                            <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://instagram.com" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                               <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram_logo_2016.svg"/>
                             
                            <span class="flex-1 ml-3 whitespace-nowrap">Instagram</span>
                        </a>

                    </li>

                    <li>
                        <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=radiouniversidad.unsl.edu.ar" rel="noopener noreferrer" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/2021_Facebook_icon.svg.png"/>
                            
                            <span class="flex-1 ml-3 whitespace-nowrap">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=radiouniversidad.unsl.edu.ar" rel="noopener noreferrer" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/Twitter-X-New-Logo-Vector-2.png"/>
                            <span class="flex-1 ml-3 whitespace-nowrap">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?Título&body=Contenido:%20[radiouniversidad.unsl.edu.ar]" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/Circle-icons-mail.svg"/>
                            <span class="flex-1 ml-3 whitespace-nowrap">E-Mail</span>
                        </a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        ABC</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FINFOOTER -->
<!-- SECCION RADIO -->
<div class="w-full block" style="height: 115px; background-color:#282828;"></div>
<!--REPRODUCTOR MOBILE-->
<div id="radio" class="w-full  md:hidden fixed flex bottom-0 z-30" style=" background: rgb(249,250,251);
background: linear-gradient(0deg, rgba(249,250,251,0.9) 30%, rgba(212,212,212,0.9) 100%);">
<div data-accordion="collapse2" id="accordion-collapse2">
<h2 class="accordion-collapse-heading-4">
<button class="absolute flex gap-3 items-center" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4" style="right:0; top:-54px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="submit" onclick="displayfooter();" value="prueba">
REPRODUCTOR<svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"></path>
      </svg>
</button>
</h2>
<div id="accordion-collapse-body-4"></div>
</div>
    <div class="flex justify-between w-full">
        <div class="m-2 flex justify-between w-full ">
            <div class="p-1 text-sm rounded-lg text-white flex items-center gap-1 inline-flex h-5" style="background-color:  #07376A;"><img src="https://i.giphy.com/media/R9vSQdiH6I5Bqi9xzx/giphy.webp" alt="" style="width:7px;"> En
                vivo</div>

            <div class="flex flex-col items-center pb-3">
                <img id="radio-imagen2" src="" alt="" class="rounded-lg h-full" style="width:85px;"  >
                <p class="m-0 p-0" id="open_close-2"></p>
            </div>
        </div>
    </div>
    <div  id="radio" class="container-4 md:hidden absolute flex justify-center w-full items-center md:gap-5 gap-1" style="left:-49px;">
       <label class=" md:hidden flex" style="">
    <input type="range" id="vol" max="1" min="0" step="0.01" value="1" onchange="changevolume(this.value)" style="background-color:inherit;" />
        </input>
        <!-- 
        <span id="display1">
            100
        </span>
         -->
    </label>
        <button onclick="togglePlay()" class="btn play-pause">
            <div class="icon-container">
                <svg class="icon play">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="icon-container">
                <svg class="icon pause">
                    <use xlink:href="#pause"></use>
                </svg>
            </div>
        </button>
        <button type="button" data-modal-target="modal" data-modal-toggle="modal">
  <svg class="px-1" width="35" height="35" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15 20C14.1667 20 13.4583 19.7083 12.875 19.125C12.2917 18.5417 12 17.8333 12 17C12 16.8833 12.0083 16.7623 12.025 16.637C12.0417 16.5123 12.0667 16.4 12.1 16.3L5.05 12.2C4.76667 12.45 4.45 12.6457 4.1 12.787C3.75 12.929 3.38333 13 3 13C2.16667 13 1.45833 12.7083 0.875 12.125C0.291667 11.5417 0 10.8333 0 10C0 9.16667 0.291667 8.45833 0.875 7.875C1.45833 7.29167 2.16667 7 3 7C3.38333 7 3.75 7.07067 4.1 7.212C4.45 7.354 4.76667 7.55 5.05 7.8L12.1 3.7C12.0667 3.6 12.0417 3.48767 12.025 3.363C12.0083 3.23767 12 3.11667 12 3C12 2.16667 12.2917 1.45833 12.875 0.875C13.4583 0.291667 14.1667 0 15 0C15.8333 0 16.5417 0.291667 17.125 0.875C17.7083 1.45833 18 2.16667 18 3C18 3.83333 17.7083 4.54167 17.125 5.125C16.5417 5.70833 15.8333 6 15 6C14.6167 6 14.25 5.929 13.9 5.787C13.55 5.64567 13.2333 5.45 12.95 5.2L5.9 9.3C5.93333 9.4 5.95833 9.51233 5.975 9.637C5.99167 9.76233 6 9.88333 6 10C6 10.1167 5.99167 10.2373 5.975 10.362C5.95833 10.4873 5.93333 10.6 5.9 10.7L12.95 14.8C13.2333 14.55 13.55 14.354 13.9 14.212C14.25 14.0707 14.6167 14 15 14C15.8333 14 16.5417 14.2917 17.125 14.875C17.7083 15.4583 18 16.1667 18 17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20Z" fill="#282828"/>
</svg>
</button>
    </div>
</div>
<!--

<!--REPRODUCTOR ESCRITORIO-->
<div id="seccion-radio" class="z-30 w-full fixed" style="background: rgb(249,250,251);
background: linear-gradient(0deg, rgba(249,250,251,0.9) 30%, rgba(212,212,212,0.9) 100%);">
<div data-accordion="collapse" id="accordion-collapse">
<h2 class="accordion-collapse-heading-3">
<button class="absolute md:flex hidden flex gap-3 items-center" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3" style="right:0; top:-54px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="submit" onclick="displayfooter();" value="prueba">
REPRODUCTOR
<svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"></path>
      </svg>
</button>
</h2>
<div id="accordion-collapse-body-3"></div>
</div>
    <div class=" w-full hidden md:flex" id="radio-3">
    
        <img id="radio-imagen" src="" alt="">
        <div class="flex justify-between w-full">
            <div class="m-4">
                <div class="p-1 text-sm rounded-lg text-white flex items-center gap-1 inline-flex" style="background-color:  #07376A;"><img src="https://i.giphy.com/media/R9vSQdiH6I5Bqi9xzx/giphy.webp" alt="" style="width:7px;"> En
                    vivo</div>
                <p class="font-bold" id="open_close"></p>
            </div>
        </div>
    </div>
    <div class="container-4 hidden absolute md:flex justify-center w-full gap-8" style="top: 50%; transform: translateY(-50%); align-items:center; left:-46px;">
     <label class=" hidden md:block" style=" margin:0;z-index:45; padding:0;  ">
    <input type="range" id="vol" min="0" max="1" value="1" step="0.01" onchange="changevolume(this.value)" style="background-color:inherit;" />
        </input>
<!--
        <span id="display1">
            100
        </span>
          -->
    </label>
        <button class="btn play-pause" onclick="togglePlay()">
            <div class="icon-container">
                <svg class="icon play" id="playbutton-5">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="icon-container">
                <svg class="icon pause" id="stopbutton-5">
                    <use xlink:href="#pause"></use>
                </svg>
            </div>
        </button>
 <button type="button" data-modal-target="modal" data-modal-toggle="modal">
  <svg class="px-1" width="35" height="35" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15 20C14.1667 20 13.4583 19.7083 12.875 19.125C12.2917 18.5417 12 17.8333 12 17C12 16.8833 12.0083 16.7623 12.025 16.637C12.0417 16.5123 12.0667 16.4 12.1 16.3L5.05 12.2C4.76667 12.45 4.45 12.6457 4.1 12.787C3.75 12.929 3.38333 13 3 13C2.16667 13 1.45833 12.7083 0.875 12.125C0.291667 11.5417 0 10.8333 0 10C0 9.16667 0.291667 8.45833 0.875 7.875C1.45833 7.29167 2.16667 7 3 7C3.38333 7 3.75 7.07067 4.1 7.212C4.45 7.354 4.76667 7.55 5.05 7.8L12.1 3.7C12.0667 3.6 12.0417 3.48767 12.025 3.363C12.0083 3.23767 12 3.11667 12 3C12 2.16667 12.2917 1.45833 12.875 0.875C13.4583 0.291667 14.1667 0 15 0C15.8333 0 16.5417 0.291667 17.125 0.875C17.7083 1.45833 18 2.16667 18 3C18 3.83333 17.7083 4.54167 17.125 5.125C16.5417 5.70833 15.8333 6 15 6C14.6167 6 14.25 5.929 13.9 5.787C13.55 5.64567 13.2333 5.45 12.95 5.2L5.9 9.3C5.93333 9.4 5.95833 9.51233 5.975 9.637C5.99167 9.76233 6 9.88333 6 10C6 10.1167 5.99167 10.2373 5.975 10.362C5.95833 10.4873 5.93333 10.6 5.9 10.7L12.95 14.8C13.2333 14.55 13.55 14.354 13.9 14.212C14.25 14.0707 14.6167 14 15 14C15.8333 14 16.5417 14.2917 17.125 14.875C17.7083 15.4583 18 16.1667 18 17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20Z" fill="#282828"/>
</svg>
</button>

    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" class="icons svgs" style="position: absolute;top:0; ">
    <symbol id="play" viewBox="0 0 448 512">
        <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" />
    </symbol>
    <symbol id="pause" viewBox="0 0 448 512">
        <path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48
                        48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z" />
    </symbol>
</svg>
<!-- FINSECCION RADIO -->
<audio id="player" controls="controls" class="hidden inline-flex" src="https://01.solumedia.com.ar:8366/stream"></audio>
<style>
.noticia-der{
border-top-left-radius: 0.5rem;

}
@media screen and (max-width:766px){


.noticia-der{
border-top-left-radius: 0.5rem;
border-top-right-radius: 0.5rem
}

}
audio::-webkit-media-controls-enclosure {
    border-radius: 0;
}

.wp-block-audio audio{
    padding-bottom:10px;
    width:100%;
    min-width:inherit !important;
}
    .icons {
        display: none;
    }

  
     button {
        border: 0;
    }

    button:focus {
        border: none;
        outline: 0 !important;
        outline-style: none;
    }

    .container-4 .btn {
        position: relative;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: #07376A;
        transition: all 100ms cubic-bezier(0.175, 0.885, 0.32, 1.275);

        cursor: pointer;
    }

    .container-4 .btn:after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        z-index: 2;
    }

    .container-4 .btn:active {
        box-shadow: 0 15px 20px rgba(0, 0, 0, 0.02);
    }

    .container-4 .btn:active:after {
        box-shadow: inset 0px -2px 5px white, inset 0px 2px 5px rgba(0, 0, 0, 0.15);
    }

    .container-4 .btn.active.play-pause .icon.pause {
        opacity: 1;
        transform: translate(-50%, -50%);
    }

    .container-4 .btn.active.play-pause .icon.play {
        opacity: 0;
        transform: translate(-50%, 50%);
    }

    .container-4 .btn .icon-container,
    .container-4 .btn a {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .container-4 .btn a {
        z-index: 10;
    }

    .container-4 .btn .icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: inline-block;
        fill: #EBEBEB;
        height: 1.4rem;
        vertical-align: middle;
        width: 1.4rem;
        transition: all 100ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .container-4 .btn.play-pause .icon.pause {
        opacity: 0;
        transform: translate(-50%, 50%);
    }


    #navbar {
        transition: top 0.3s;
    }
    #radio {
        transition: bottom 0.3s;
    }
    #envivo{
        display: none;
    }
#info-search{
    width:750px;
}
#boxes{
         //   grid-template-rows:1fr 1fr;
        }
#boxes-img{
   object-fit:cover; height:100%;
}

#radio{
  
    height: 150px;
}

   iframe{
       position:relative;
       width:100%;
   }
    @media screen and (max-width:766px) {
        #radio{
            height:135px;
           
        }
        #boxes-img{
            height:inherit;
        }
        #boxes{
            display:block;
        }
       
        #info-search{
    width:350px;
}
        input[type="range"] {
            -ms-transform: scale(.75);
            /* IE 9 */
            -webkit-transform: scale(.75);
            /* Chrome, Safari, Opera */
            transform: scale(.75);
        }
    }


#seccion-radio{

 -webkit-transition: all 0.3s cubic-bezier(.53,-0.01,.52,1);
       -moz-transition: all 0.3s cubic-bezier(.53,-0.01,.52,1);
        -ms-transition: all 0.3s cubic-bezier(.53,-0.01,.52,1);
         -o-transition: all 0.3s cubic-bezier(.53,-0.01,.52,1);
            transition: all 0.3s cubic-bezier(.53,-0.01,.52,1);
}

            </style>
<script>
  function changevolume(amount) {
  var audioobject = document.getElementById("player");
  audioobject.volume = amount;
}
    const buttons = Array.from(document.querySelectorAll("button"));
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("active");

        });

    });
    var myAudio = document.getElementById("player");
    var isPlaying = false;
    function togglePlay() {
        isPlaying ? myAudio.pause() : myAudio.play();
    };
    myAudio.onplaying = function() {
        isPlaying = true;
 const play = document.getElementById('playbutton-5');
play.style.opacity = '0';
play.style.transform = 'translate(-50%, -50%)';

 const stop = document.getElementById('stopbutton-5');
stop.style.opacity = '1';
stop.style.transform = 'translate(-50%, -50%)';

    };
    myAudio.onpause = function() {
        isPlaying = false;
         const play = document.getElementById('playbutton-5');
play.style.opacity = '1';
play.style.transform = 'translate(-50%, -50%)';
 const stop = document.getElementById('stopbutton-5');
stop.style.opacity = '0';
stop.style.transform = 'translate(-50%, -50%)';   
    };
    function horarioslav(date) {
        var hour = date.getHours()
        var minutes = date.getMinutes();
        var horario = hour + ":" + minutes;
        var hour2 = hour*60;
        var total = hour2+minutes;
        if(total >420 && total <570){
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-7.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-7.png";
            return "Nada secreto"
        }
        else if(total >570 && total <720){
        document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
            return "Sonido urbano"
        }else if(total>720 && total <750){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        return "<p style='font-size:12px;'>Frecuencia <br> Informativa 1° Edición</p>"
        }
        else if(total>750 && total <780){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        return "Frecuencia <br> Universitaria"

        }
        else if(total>780 && total <900){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
       return "Sólo un café"

        }
         else if(total>900 && total <1080){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/locomotora.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/locomotora.png";
        return "La locomotora"

        }
       else if(total>1080 && total <1200){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        return "Más que Noticias"

        }
         else if(total>1200 && total <1260){
 document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-6.png";
        return "<p style='font-size:12px;'>Frecuencia <br> Informativa 2da Edición</p>"
        }
        else if(total > 1260 && total < 1440){
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-8.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-8.png";
            return "Rock del país"
        }
        else{
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
            return "Música"
        }
    }
    function horariossab(date) {
        var hour = date.getHours();
        var minutes = date.getMinutes();
        var hour2 = hour*60;
        var total = hour2+minutes;
        if(total >480 && total <540){
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            return "Rock Nacional"
        } else if(total >540 && total <600){
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            return "Sonidos de Latinoamérica" 
        } else if(total >600 && total <660){
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/radio-9.png";
            return "Tangos y milongas"
         }   else{
            document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
            document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
                return "Música"
            }
    }
    var date = new Date();
    var dayOfWeek = date.getDay(); 
    var openClosed = false; 
    var hour = date.getHours()
    var minutes = date.getMinutes();
    var horario = hour + ":" + minutes;
    var radio = "apagado"
    var msg = function() {
        if (openClosed == true) {
            return "-";
        } else {
            switch (dayOfWeek) {
                case 1:
                    return horarioslav(date);
                    break;
                case 2:
                    return horarioslav(date);
                    break;
                case 3:
                    return horarioslav(date);
                    break;
                case 4:
                    return horarioslav(date);
                    break;
                case 5:
                    return horarioslav(date); 
                    break;
                case 6:
                    return horariossab(date);
                    break;
                default:
                  document.getElementById("radio-imagen").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
                   document.getElementById("radio-imagen2").src="http://radiounsl.byethost18.com/wp-content/themes/radiounsl/assets/images/icon-5.png";
                    return "Música";
            }
        }
    }
 $(window).on('load', function () {
       $("#open_close").html(msg());
        $("#open_close-2").html(msg());
 });
</script>
</body>

</html>