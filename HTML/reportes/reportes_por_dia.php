
<?php include '../layout/header.php';

//$branch_id = $_GET['id'];
?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php';?>

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';
       $id_usuario=$_SESSION['id'];
       ?>      <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        </div><!--end of modal-dialog-->
 </div>

 <div class="container">
           <div class="col-md-3">
      
           </div>
           <div class="col-md-3">
             <form method="post" action="../reportes/reportes_por_dia.php" enctype="multipart/form-data" class="form-horizontal">
                    <button class="btn btn-lg btn-danger btn-print" id="daterange-btn"  name="buscar_fechas">BUSCAR POR DIA</button>
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Fecha </label>
                        <div class="input-group col-sm-8">
                          <input type="date" class="form-control pull-right" id="fecha" name="fecha"  required >
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>

              

                 




                    <div class="col-md-12">
                       <div class="col-md-12">
                        
                       
                         </div>

                    </div>

          </form>
           </div>
           <div class="col-md-3">
             
           </div>
       </div>
 <!--end of modal-->


                        <div class="box-body">
                  <!-- Date range -->  <section class="content-header">
             
          </section>

 <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>


                  <div class="box-header">
                  <h3 class="box-title"> Lista datos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
  <table id="example2" class="table table-bordered table-striped">
                   <thead>
                                <tr class=" btn-success">
              <th> fecha </th>
                          <th> descripcion </th>
                  <th> Debe </th>
                  <th> Haber </th>
    
                      </tr>
                    </thead>
                    <tbody>
                   




<?php


 


if(isset($_POST['buscar_fechas']))

{
  $fecha = $_POST['fecha'];
?>

   <?php
 
    $query=mysqli_query($con,"select * from libro where id_usuario='$id_usuario' and fecha ='$fecha'  ")or die(mysqli_error());
    $contador=0;

    while($row=mysqli_fetch_array($query)){
$contador++;
    }

?>

  <div class = "row">
        <div class = "col-md-4 col-lg-12 hide-section">
  <a class="btn btn-danger btn-print"    disabled="true" style="height:25%; width:50%; font-size: 25px " role="button">Nro ELEMENTOS= <label style='color:black;  font-size: 25px '>=<?php echo $contador;?></label></a><br>



</div>

      
</div>

 <?php


    $query=mysqli_query($con,"select * from libro where id_usuario='$id_usuario' and  fecha ='$fecha' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
      $monto_haber=0;
$monto_debe=0;
    $id_libro=$row['id_libro'];
        $debe_haber=$row['debe_haber'];
       
        if($debe_haber=="debe"){
$monto_debe=$row['monto'];

        }
      if($debe_haber=="haber"){
$monto_haber=$row['monto'];
}

?>

                      <tr >
        <td><?php echo $row['fecha'];?></td>
            <td><?php echo $row['descripcion'];?></td>
              <td><?php echo $monto_debe;?></td>
 <td><?php echo $monto_haber;?></td>


                      </tr>

                                          <?php
                      }
                      }
?>


 <!--end of modal-->

                    </tbody>
         








        <footer>

          <div class="clearfix"></div>
          
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <?php include '../layout/datatable_script.php';?>
    <!-- /gauge.js -->



          <script>
        $(document).ready( function() {
                $('#example2').dataTable( {
                 "language": {
                   "paginate": {
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


                }

              );
              } );
    </script>
  </body>
</html>
