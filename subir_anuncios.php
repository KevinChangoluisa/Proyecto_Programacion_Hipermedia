<?php require_once('includes/templates/menu-admin.php');?>

<body onload="initialize();">
    <h2 class="centrar-texto">Registro de anuncios</h2>
    <div class="contenedor contenido-centrado">
        <form name="MiForm" id="MiForm" method="post" action="cargar_anuncio.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre_anuncio">Nombre Hotel:</label>
                <input type="text" name="nombre_anuncio" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label><br>
                <input type="text" id="descripcion" name="descripcion" rows="5" cols="40" required>
            </div>
            <div class="form-group">
                <label for="max_personas">Número máximo de personas:</label>
                <input type="number" name="max_personas" min="1" size="2" required>
                <label for="precio">Precio por noche:</label>
                <input type="number" name="precio" min="1" step="0.1" size="2" required>
            </div>

            <div class="form-group">
                <label for="ingreso">Disponible desde:</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" min="<?php echo date('Y-m-d');?>" required>
                <label for="salida">Disponible hasta:</label>
                <input type="date" name="fecha_salida" id="fecha_salida" min="<?php echo date('Y-m-d');?>" required
                    onchange="validarFecha()">
            </div>
            <label for="promocion">¿Dispone de promoción?</label>
            <input type="checkbox" value="1" name="promocion" id="promo_check" value="1"
                onchange="javascript:showContent()">

            <div id="fecha_promocion" style="display:none">
                <div class="form-group">
                    <label for="fecha_inicio_promocion">Disponible desde:</label>
                    <input type="date" name="fecha_inicio_promocion" id="fecha_inicio_promocion"
                        min="<?php echo date('Y-m-d');?>">
                    <label for="fecha_fin_promocion">Disponible hasta:</label>
                    <input type="date" name="fecha_fin_promocion" id="fecha_fin_promocion"
                        min="<?php echo date('Y-m-d');?>" onchange="validarFechapromo()">
                    <label for="descuento">% Descuento</label>
                    <input type="number" name="descuento" size="3" min="0" max="100" step="1">
                </div>
            </div>


            <fieldset class="border p-3">
                <legend class="w-auto">Ambientes</legend>
                <div class="form-group">
                    <label for="n_dorm">Numero de dormitorios:</label>
                    <input type="number" name="n_dorm" min="0" size="2">
                    <label for="n_banio">Numero de baños:</label>
                    <input type="number" name="n_banio" min="0" size="2">
                    <br>
                    <label for="piscina">piscina</label>
                    <input type="checkbox" name="piscina" value="1">
                    <label for="cocina">cocina</label>
                    <input type="checkbox" name="cocina" value="1">
                </div>
            </fieldset>
            <fieldset>
                <legend>Marque los servicios que dispone</legend>
                <div class="form-group">
                    <label for="wifi">wifi</label>
                    <input type="checkbox" name="wifi" value="1">
                    <label for="parqueadero">parqueadero</label>
                    <input type="checkbox" name="parqueadero" value="1">
                    <label for="tv_cable">Tv Cable</label>
                    <input type="checkbox" name="tv_cable" value="1">
                    <label for="hidromasaje">hidromasaje</label>
                    <input type="checkbox" name="hidromasaje" value="1">
                    <label for="agua_caliente">agua caliente</label>
                    <input type="checkbox" name="agua_caliente" value="1">
                    <label for="bar">bar</label>
                    <input type="checkbox" name="bar" value="1">
                </div>
            </fieldset>
            <fieldset>
                <legend>Imágenes</legend>
                <p>Seleccione 5 imágenes como mínimo para su anuncio y máximo 10 </p>
                <div class="form-group">
                    <label>Imagen 1</label>
                    <input type="file" id="archivo" name="img1" accept=".jpg,.png" required onchange="validar()" />
                    <label>Imagen 2</label>
                    <input type="file" id="archivo" name="img2" accept=".jpg,.png" required onchange="validar()" />
                    <label>Imagen 3</label>
                    <input type="file" id="archivo" name="img3" accept=".jpg,.png" required onchange="validar()" />


                    <label>Imagen 4</label>
                    <input type="file" id="archivo" name="img4" accept=".jpg,.png" required onchange="validar()" />

                    <label>Imagen 5</label>
                    <input type="file" id="archivo" name="img5" accept=".jpg,.png" required onchange="validar()" />

                    <label>Imagen 6</label>
                    <input type="file" id="archivo" name="img6" accept=".jpg,.png" required onchange="validar()" />
                    <!---
                    <label>Imagen 7</label>

                    <input type="file" id="archivo" name="img7" accept=".jpg,.png" required onchange="validar()" />

                    <label>Imagen 8</label>
                    <input type="file" id="archivo" name="img8" accept=".jpg,.png" required onchange="validar()" />

                    <label>Imagen 9</label>

                    <input type="file" id="archivo" name="img9" accept=".jpg,.png" required onchange="validar()" />
                    <label>Imagen 10</label>
                    <input type="file" id="archivo" name="img10" accept=".jpg,.png" required onchange="validar()" />
                    --->
                </div>
            </fieldset>
            <fieldset>
                <legend>Ubicación geográfica</legend>
                <label for="latitude">Latitude:</label>
                <input id="txtLat" type="text" name="latitud" style="color:red" value="-1.110572" />
                <label for="longitude">Longitude:</label>
                <input id="txtLng" type="text" name="longitud" style="color:red" value="-78.973296" /><br />
                <br />
                <br />
                <div id="map_canvas" style="width: auto; height: 500px;">
                </div>
            </fieldset>
            <button name="submit" class="btn btn-primary">Subir anuncio</button>
        </form>
    </div>
</body>

</html>