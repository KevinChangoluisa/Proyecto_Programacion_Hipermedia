$('document').ready(function() {
    //animaciones para los números
    $('.resumen-clientes li:nth-child(1) p').animateNumber({ number: 1500 }, 1500);
    $('.resumen-clientes li:nth-child(2) p').animateNumber({ number: 35 }, 1600);
    $('.resumen-clientes li:nth-child(3) p').animateNumber({ number: 400 }, 1600);
    $('.resumen-clientes li:nth-child(4) p').animateNumber({ number: 365 }, 1600);
});

//Menu fijo
var windowHeight = $(window).height();
var barraAltura = $('.barra').innerHeight();

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
        $('.barra').addClass('fixed');
        $('body').css({ 'margin-top': barraAltura + 'px' })
    } else {
        $('.barra').removeClass('fixed');
    }
});

$(document).ready(function() {
    $(".fancybox-thumb").fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        helpers: {
            title: {
                type: 'outside'
            },
            thumbs: {
                width: 50,
                height: 50
            }
        }
    });
});