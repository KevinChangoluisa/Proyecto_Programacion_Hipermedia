<?php
include("includes/templates/menu.php");
?>

<?php
$id_anuncio = $_POST['id_anuncio'];
    try{
        require_once('includes/funciones/bd_conexion.php');
        $sql =" SELECT id_anuncio,nombre_predio,max_personas,img1,precioxdia,fecha_inicio,fecha_fin";
        $sql.=" FROM anuncios ";
        $sql.=" WHERE id_anuncio= $id_anuncio";
        $resultado = $conn->query($sql);
    }catch (\Exception $e){
        echo $e->getMessage();
    }
    ?>
<br>
<br>
<br>
<?php while ($anuncios = $resultado->fetch_assoc()){?>
<h2 class="fw-300 centrar-texto">Reservacion <b><?php echo $anuncios['nombre_predio']; ?></b></h2>
<main class="contenedor seccion contenido-centrado">
    <div style="
    align-items: center;display: flex; flex-direction: column;
        justify-content: space-between; text-align: center;">
        <img src="./img/<?php echo $anuncios['img1'];?>" width="400px" alt="Imagen Principal">
        <h3>Formulario de registro</h3>
        <form class="contacto" action="">
            <fieldset>
                <legend>Datos Personales</legend>
                <div class="column-group">
                    <label for="nombre_cliente" class="col-xs-6 col-md-2">Nombre: </label>
                    <input type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Dígite su nombre">

                    <label for="apellido_cliente" class="col-xs-6 col-md-2">Apellido: </label>
                    <input type="text" id="apellido_cliente" name="apellido_cliente" placeholder="Dígite su apellido">

                </div>
                <div class="column-group">
                    <label for="cedula" class="col-xs-6 col-md-2">Cedula: </label>
                    <input type="number" id="cedula" name="cedula" placeholder="Dígite su cedula">

                    <label for="telefono" class="col-xs-6 col-md-2">Telefono de contacto </label>
                    <input type="number" id="telefono" name="telefono" placeholder="Dígite su telefono">

                </div>
            </fieldset>
            <fieldset>
                <legend>Opciones de Reserva</legend>
                <div class="column-group">
                    <label for="n_adultos" class="col-xs-6 col-md-2">Numero de adultos: </label>
                    <input type="number" id="n_adultos" name="n_adultos" min=1 size=2>
                    <label for="n_ninios" class="col-xs-6 col-md-2">Numero de niños: </label>
                    <input type="number" id="n_ninios" name="n_ninios" min=0 size=2>
                </div>
                <div class="column-group">
                    <label for="desde" class="col-xs-6 col-md-2">Desde: </label>
                    <input type="date" id="desde" name="desde" min=<?php echo $anuncios['fecha_inicio']; ?> max=<?php echo $anuncios['fecha_fin']; ?>>
                    <label for="hasta" class="col-xs-6 col-md-2">Hasta </label>
                    <input type="date" id="hasta" name="hasta" min=<?php echo $anuncios['fecha_inicio']; ?> max=<?php echo $anuncios['fecha_fin']; ?>>
                </div>
            </fieldset>
        </form>

    </div>
</main>
<?php } ?>

<?php include("includes/templates/footer.php"); ?>