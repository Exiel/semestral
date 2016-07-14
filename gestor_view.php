<html>
<head>
 <title>Gestores</title>
 <meta charset="utf-8">
 <meta  name="viewport" content="width=device-width, initial-scale=1, maximun-scale=no">
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
</head>
<body>

<div data-role="page">

 <div data-role="header" data-theme="b">
   <h1>Gestores</h1>
 </div><!-- /header -->

 <div role="content">
   <table data-role="table" data-mode="vertical" data-inset="true">
     <thead>
       <tr>
         <th>#</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Editar</th>
         <th>Eliminar</th>
       </tr>
     </thead>
     <tbody>
       <?php for ($i = 0; $i < count($gestores); ++$i) { ?>
         <tr class="link" id="<?php echo $gestores[$i]->id; ?>">
           <td><?php echo $gestores[$i]->id; ?></td>
           <td><?php echo $gestores[$i]->nombre; ?></td>
            <td><?php echo $gestores[$i]->apellido; ?></td>
           <td><a href="gestor/editar" data-role="button" data-icon="edit" data-theme="b" data-inline="true" data-transition="flip"></a></td>
           <td><a href="gestor/eliminar" data-role="button" data-icon="delete" data-theme="b" data-inline="true" data-transition="flip"></a></td>
         </tr>
         <?php } ?>
       </tbody>
   </table>
 </div><!-- /content -->

 <div data-role="footer"  data-position="fixed" data-theme="b">
   <h4>Pie de página</h4>
 </div><!-- /footer -->
</div><!-- /page -->

</body>
</html>
