<?php
include("includes/templates/menu.php");
?>

<?php

$id_anuncio = $_POST['id_anuncio'];
    try{
        require_once('includes/funciones/bd_conexion.php');
        $sql =" SELECT *";
        $sql.=" FROM anuncios ";
        $sql.=" WHERE id_predio= $id_anuncio";
        $resultado = $conn->query($sql);
    }catch (\Exception $e){
        echo $e->getMessage();
    }
    ?>
<br>
<br>
<br>
<?php while ($anuncios = $resultado->fetch_assoc()){?>
<h2 class="fw-300 centrar-texto">Reservacion <b><?php echo $anuncios['id_predio']; ?></b></h2>
<main class="contenedor seccion contenido-centrado">
    <div style="
    align-items: center;display: flex; flex-direction: column;
        justify-content: space-between; text-align: center;">
        <?php 
        echo '<img src="data:image/jpeg;base64,'.base64_encode($anuncios["img1"]).'" height="400px" alt="Imagen Principal />';
        ?>
        <h3>Formulario de registro</h3>
        <form class="contacto" action="#">
            <fieldset>
                <legend>Datos Personales</legend>
                <div class="column-group">
                    <label for="nombre_cliente">Nombre: </label>
                    <input type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Dígite su nombre">

                    <label for="apellido_cliente">Apellido: </label>
                    <input type="text" id="apellido_cliente" name="apellido_cliente" placeholder="Dígite su apellido">
                    <label for="cedula">Cedula: </label>
                    <input type="number" id="cedula" name="cedula" placeholder="Dígite su cedula">
                    <label for="telefono">Telefono de contacto </label>
                    <input type="number" id="telefono" name="telefono" placeholder="Dígite su telefono">
                    <label for="email">e-mail</label>
                    <input type="email" id="email" name="email" placeholder="Dígite su e-mail">

                </div>
            </fieldset>
            <fieldset>
                <legend>Opciones de Reserva</legend>
                <p>Máximo de personas: <b><?php echo $anuncios['max_personas']; ?></b></p>
                <input type="hidden" id="max_personas" name="max_personas"
                    value="<?php echo $anuncios['max_personas']; ?>" style="display:transparent" disabled>

                <div class="column-group">
                    <label for="n_adultos">Numero de adultos: </label>
                    <input type="number" id="n_adultos" name="n_adultos" min="1"
                        max="<?php echo $anuncios['max_personas']; ?>" size="2" onchange="validarTotalPersonas()">

                    <label for="n_ninios">Numero de niños: </label>
                    <input type="number" id="n_ninios" name="n_ninios" min="0" size="2"
                        onchange="validarTotalPersonas()">
                    <br>
                    <label for="desde">Desde: </label>
                    <input type="date" id="desde" name="desde" min=<?php echo $anuncios['fecha_inicio']; ?>
                        max=<?php echo $anuncios['fecha_fin']; ?>>
                    <label for="hasta">Hasta </label>
                    <input type="date" id="hasta" name="hasta" min=<?php echo $anuncios['fecha_inicio']; ?>
                        max=<?php echo $anuncios['fecha_fin']; ?>>
                </div>
            </fieldset>

            <input type="hidden" id="promocion" name="promocion" value="<?php echo $anuncios['promocion']; ?>" disabled>

            <input type="hidden" id="descuento" name="descuento" value="<?php echo $anuncios['descuento']; ?>"
                style="display:transparent" disabled>

            <input type="hidden" id="fecha_fin_promocion" name="fecha_fin_promocion"
                value="<?php echo $anuncios['fecha_fin_promocion']; ?>" style="display:transparent" disabled>

            <input type="hidden" id="precio" name="precio" value="<?php echo $anuncios['precioxdia']; ?>"
                style="display:transparent" disabled>
            <br>
            <input type="button" class="btn btn-info"onclick="msg()" value="Calcular">
            <div id="Calculo_precio" style="display:none">
                <table>
                    <tr>
                        <td>
                            <p>Total de días:</p>
                        </td>
                        <td>
                            <p id="total_dias"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Precio por día:</p>
                        </td>
                        <td>
                            <p> <?php echo $anuncios['precioxdia']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Sub total:</p>
                        </td>
                        <td>
                            <p id="sub_total"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Descuento:</p>
                        </td>
                        <td>
                            <p id="descuento_precio"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Total a pagar:</p>
                        </td>
                        <td>
                            <p id="total"></p>
                        </td>
                    </tr>

                </table>
            </div>
            <br>
            <button name="submit" class="btn btn-primary">Procesar pago con Paypal</button>
        </form>

    </div>
</main>
<?php } ?>

<?php include("includes/templates/footer.php"); ?>