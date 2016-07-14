<html>
<head>
 <title>Gestores</title>
 <meta charset="utf-8">
 <meta  name="viewport" content="width=device-width, initial-scale=1, maximun-scale=no">
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page">

 <div data-role="header" data-theme="b">
   <h1> Gestores Add</h1>
 </div><!-- /header -->

 <div role="content">
   <?php
        $attributes = array("class" => "form-horizontal", "id" => "gestorform", "name" => "gestorform");
        echo form_open("gestor/insertar", $attributes);?>
 <form action="gestor/insertar" method="post">
   <br>

   <label for="nombre">Nombre:</label>
   <input type="text" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>">

   <label for="apellido">Apellido:</label>
   <input type="text" name="apellido" id="apellido" value="<?php echo set_value('apellido'); ?>">

     <a href="gestor/insertar" data-role="button" data-theme="b"  data-transition="flip">Guardar</a>


 </div><!-- /content -->
 <?php echo form_close(); ?>
 <?php echo $this->session->flashdata('msg'); ?>

 <div data-role="footer"  data-position="fixed" data-theme="b">
   <h4>Pie de página</h4>
 </div><!-- /footer -->
</div><!-- /page -->


</body>
</html>
