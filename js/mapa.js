function initialize() {
    // Creating map object
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 8,
        center: new google.maps.LatLng(-1.110572, -78.973296),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // creates a draggable marker to the given coords
    var vMarker = new google.maps.Marker({
        position: new google.maps.LatLng(-1.110572, -78.973296),
        draggable: true
    });

    // adds a listener to the marker
    // gets the coords when drag event ends
    // then updates the input with the new coords
    google.maps.event.addListener(vMarker, 'dragend', function(evt) {
        $("#txtLat").val(evt.latLng.lat().toFixed(6));
        $("#txtLng").val(evt.latLng.lng().toFixed(6));
        map.panTo(evt.latLng);
    });

    // centers the map on markers coords
    map.setCenter(vMarker.position);

    // adds the marker on the map
    vMarker.setMap(map);
}

function validar() {
    let archivo = document.getElementById('archivo').value,
        extension = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
    if (document.getElementById('archivo').getAttribute('accept').split(',').indexOf(extension) < 0) {
        alert('Archivo inválido.\nNo se permite la extensión ' + extension);
        alert('Solo extensiones tipo jpg o png');
        $('#archivo').val('');

    }
}

let fecha1 = new Date();
let fecha2 = new Date();

function validarFecha() {
    fecha1 = document.getElementById('fecha_ingreso').value;
    fecha2 = document.getElementById('fecha_salida').value;
    if (fecha2 < fecha1) {
        alert('La fecha final debe ser mayor a la fecha de inicio')
        $('#fecha_salida').val('');

    }
}

function showContent() {
    element = document.getElementById("fecha_promocion");
    check = document.getElementById("promo_check");
    if (check.checked) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

function validarFechapromo() {
    let fecha3 = document.getElementById('fecha_inicio_promocion').value;
    let fecha4 = document.getElementById('fecha_fin_promocion').value;

    if (fecha3 < fecha1 || fecha3 > fecha2 || fecha4 < fecha1 || fecha4 > fecha2) {
        alert(`La fecha de la promocion debe estar en el rango\n ${fecha1} - ${fecha2} vigente del anuncio`)
        $('#fecha_inicio_promocion').val('');
        $('#fecha_fin_promocion').val('');
    }
    if (fecha4 < fecha3) {
        alert(`La fecha final de la promocion debe ser mayor a la fecha de inicio ${fecha3}`)
        $('#fecha_fin_promocion').val('');

    }
}


function validarTotalPersonas() {
    let adultos = parseInt(document.getElementById('n_adultos').value);
    let ninios = parseInt(document.getElementById('n_ninios').value);
    total_a_n = adultos + ninios;
    let max_personas = parseInt(document.getElementById('max_personas').value);
    if (total_a_n > max_personas) {
        alert `Número máximo de personas incluido niños debe ser:\nMeno o igual ${total_a_n}`
        $('#n_adultos').val('');
        $('#n_ninios').val('');
    }

}

function msg() {
    element = document.getElementById("Calculo_precio");
    element.style.display = 'block';
    let desde = moment(document.getElementById('desde').value);
    let hasta = moment(document.getElementById('hasta').value);
    let fecha_fin_promocion = document.getElementById('fecha_fin_promocion').value;


    total_dias = hasta.diff(desde, 'days');

    let precio = document.getElementById('precio').value;
    total_precioxdias = precio * total_dias;

    let promocion = document.getElementById('promocion').value;
    console.log(promocion);
    let descuento = document.getElementById('descuento').value;
    let total = total_precioxdias;
    let decuentovalor = "0";

    if (fecha_fin_promocion > document.getElementById('hasta').value) {
        console.log('entro');
        if (promocion == 1) {
            console.log('entro2');
            decuentovalor = (total_precioxdias * descuento) / 100
            total = total_precioxdias - decuentovalor;
        }
    }
    console.log(decuentovalor);
    document.getElementById("total_dias").innerHTML = total_dias;
    document.getElementById("sub_total").innerHTML = total_precioxdias;
    document.getElementById("descuento_precio").innerHTML = decuentovalor;
    document.getElementById("total").innerHTML = total;






}