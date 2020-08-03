<?php
if(isset($_POST["submit"])){
    require_once('includes/funciones/bd_conexion.php');
    $nombre_predio = $_POST['nombre_anuncio'];
    $descripcion = $_POST['descripcion'];
    $n_dormitorios = $_POST['n_dorm'];
    $banio = $_POST['n_banio'];
    
    if(!empty($_POST['cocina'])){
        $cocina = $_POST['cocina'];
    }
    
    $piscina=0;
    if(!empty($_POST['piscina'])){
        $piscina = $_POST['piscina'];
    }
    
    $wifi = 0;
    if(!empty($_POST['wifi'])){
        $wifi = $_POST['wifi'];
    }

    $parqueadero  = 0;
    if(!empty($_POST['parqueadero'])){
        $parqueadero = $_POST['parqueadero'];
    }

    $tv_cable = 0;
    if(!empty($_POST['tv_cable'])){
        $tv_cable = $_POST['tv_cable'];
    }

    $hidromasaje = 0;
    if(!empty($_POST['hidromasaje'])){
        $hidromasaje = $_POST['hidromasaje'];    
    }

    $agua_caliente = 0;
    if(!empty($_POST['agua_caliente'])){
        $agua_caliente = $_POST['agua_caliente'];
    }

    $bar =0;
    
    if(!empty($_POST['bar'])){
        $bar = $_POST['bar'];
    }

    $max_personas = $_POST['max_personas'];

    $ubi_lat = $_POST['latitud'];
    $ubi_long = $_POST['longitud'];
    $precioxdia = $_POST['precio'];

    date_default_timezone_set("America/Bogota");
    $fecha_registro =  date('Y-m-d');
    $fecha_inicio = $_POST['fecha_ingreso'];
    $fecha_fin = $_POST['fecha_salida'];
   
    $promocion = 0;
    $fecha_inicio_promocion= Date('0000-00-00');
    $fecha_fin_promocion= Date('0000-00-00');
    $total_descuento=0;
    
    if(!empty($_POST['promocion'])){
        $promocion = $_POST['promocion'];
    }

    if(!empty($_POST['fecha_inicio_promocion'])){
        $fecha_inicio_promocion = $_POST['fecha_inicio_promocion'];
    }
    if(!empty($_POST['fecha_fin_promocion'])){
        $fecha_fin_promocion = $_POST['fecha_fin_promocion'];
    }
    if(!empty($_POST['descuento'])){
        $total_descuento=$_POST['descuento'];
    }

    $img1 = $_FILES['img1']['tmp_name'];
    $imgContenido1 = addslashes(file_get_contents($img1));
   
    $img2 = $_FILES['img2']['tmp_name'];
    $imgContenido2 = addslashes(file_get_contents($img2));
   
    $img3 = $_FILES['img3']['tmp_name'];
    $imgContenido3 = addslashes(file_get_contents($img3));
   
    $img4 = $_FILES['img4']['tmp_name'];
    $imgContenido4 = addslashes(file_get_contents($img4));
   
    $img5 = $_FILES['img5']['tmp_name'];
    $imgContenido5 = addslashes(file_get_contents($img5));
   
    $img6 = $_FILES["img6"]["tmp_name"];
    $imgContenido6 = addslashes(file_get_contents($img6));

    $img7 = $_FILES["img7"]["tmp_name"];
    $imgContenido7 = addslashes(file_get_contents($img7));
    
    $img8 = $_FILES["img8"]["tmp_name"];
    $imgContenido8 = addslashes(file_get_contents($img8));
   
    $img9 = $_FILES["img9"]["tmp_name"];
    $imgContenido9 = addslashes(file_get_contents($img9));

    $img10= $_FILES["img10"]["tmp_name"];
    $imgContenido10 = addslashes(file_get_contents($img10));
    
/*
    
    if($_FILES["img6"]=!NULL){
        echo "Se ha enviado algo";
        $revisar6 = getimagesize($_FILES["img6"]["tmp_name"]);
        if($revisar6 !== false){
            $img6 = $_FILES['img6']['tmp_name'];
            $imgContenido6 = addslashes(file_get_contents($img6));
         }else{
             $imgContenido6=NULL;
         }
    }
    if($revisar7 !== false){
        $img7 = $_FILES['img7']['tmp_name'];
        $imgContenido7 = addslashes(file_get_contents($img7));
     }else{
         $imgContenido7=NULL;
     }

     if($revisar8 !== false){
        $img8 = $_FILES['img8']['tmp_name'];
        $imgContenido8 = addslashes(file_get_contents($img8));
     }else{
         $imgContenido8=NULL;
     }

     if($revisar9 !== false){
        $img9 = $_FILES['img9']['tmp_name'];
        $imgContenido9 = addslashes(file_get_contents($img9));
     }else{
         $imgContenido9=NULL;
     }

     if($revisar10 !== false){
        $img10 = $_FILES['img10']['tmp_name'];
        $imgContenido10 = addslashes(file_get_contents($img10));
     }else{
         $imgContenido10=NULL;
     }
*/
     $sql="INSERT INTO anuncios(id_anuncio, nombre_predio, descripcion, n_dormitorios, banio, cocina, piscina, wifi, parqueadero, tv_cable, hidromasaje, agua_caliente, bar, max_personas, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, ubi_lat, ubi_long, precioxdia, fecha_registro, fecha_inicio, fecha_fin, promocion, fecha_inicio_promocion, fecha_fin_promocion, descuento) VALUES('NULL','$nombre_predio','$descripcion','$n_dormitorios','$banio','$cocina','$piscina','$wifi','$parqueadero','$tv_cable','$hidromasaje','$agua_caliente','$bar','$max_personas','$imgContenido1','$imgContenido2','$imgContenido3','$imgContenido4','$imgContenido5','$imgContenido6','$imgContenido7','$imgContenido8','$imgContenido9','$imgContenido10','$ubi_lat','$ubi_long','$precioxdia','$fecha_registro','$fecha_inicio','$fecha_fin','$promocion','$fecha_inicio_promocion','$fecha_fin_promocion','$total_descuento')";
     if($conn->query($sql) === TRUE){
        echo "Anuncio cargado con exito.";
    }else{
        echo "Ha fallado la subida, reintente nuevamente.";
    } 
}
?>