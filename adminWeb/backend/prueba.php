<!--/////////////// CODIGO PRA EL POPUP INICIAL ////////////////-->
	<link rel="stylesheet" type="text/css" href="../css/popup.css">
	<script src="../js/popup.min.js"></script>
	<script src="../js/jquery.colorbox.js"></script>
<!--/////////////// FIN POPUP INICIAL ////////////////-->

<a href="#" class="item">vetana</a>






									<!--/////////////// CODIGO QUE LLAMA EL POPUP INICIAL ////////////////-->
    <script>
    $('.item').click(function(){

   

      function openColorBox(){
        $.colorbox({iframe:true, overlayClose: false, fixed: true ,width:"80%", height:"80%", href:"index.php"});
      }
      setTimeout(openColorBox, 1000);

      	
      });


    </script>
<!--/////////////// FIN EL POPUP INICIAL ////////////////-->
