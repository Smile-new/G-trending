$(function() {
    "use strict";

    // CARGA DE TEMA GUARDADO AL INICIAR LA PÁGINA
    // **************************************************
    const savedTheme = localStorage.getItem('selectedTheme');
    if (savedTheme) {
        // Si hay un tema guardado, aplicarlo al body
        $('body').attr('class', 'bg-theme ' + savedTheme);
    } else {
        // Si no hay un tema guardado, asegúrate de que el tema por defecto (bg-theme1) se aplique.
        // Esto es útil si has eliminado 'bg-theme1' del HTML inicial del <body>.
        $('body').attr('class', 'bg-theme bg-theme1');
    }
    // **************************************************

    //sidebar menu js
    $.sidebarMenu($('.sidebar-menu'));

    // === toggle-menu js
    $(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // === sidebar menu activation js
    $(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
                return this.href == i;
            }).addClass("active").parent().addClass("active");;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }),


    /* Top Header */
    $(document).ready(function(){
        $(window).on("scroll", function(){
            if ($(this).scrollTop() > 60) {
                $('.topbar-nav .navbar').addClass('bg-dark');
            } else {
                $('.topbar-nav .navbar').removeClass('bg-dark');
            }
        });
    });


    /* Back To Top */
    $(document).ready(function(){
        $(window).on("scroll", function(){
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').on("click", function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
    });


    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    // theme setting
    $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });

    // MODIFICACIONES PARA GUARDAR EL TEMA AL HACER CLICK
    // **************************************************

    // Función auxiliar para aplicar y guardar el tema
    function applyAndSaveTheme(themeClass) {
        $('body').attr('class', 'bg-theme ' + themeClass);
        localStorage.setItem('selectedTheme', themeClass); // Guardar el nombre de la clase del tema
    }

    // Modificar las llamadas a las funciones de tema
    $('#theme1').click(function() { applyAndSaveTheme('bg-theme1'); });
    $('#theme2').click(function() { applyAndSaveTheme('bg-theme2'); });
    $('#theme3').click(function() { applyAndSaveTheme('bg-theme3'); });
    $('#theme4').click(function() { applyAndSaveTheme('bg-theme4'); });
    $('#theme5').click(function() { applyAndSaveTheme('bg-theme5'); });
    $('#theme6').click(function() { applyAndSaveTheme('bg-theme6'); });
    $('#theme7').click(function() { applyAndSaveTheme('bg-theme7'); });
    $('#theme8').click(function() { applyAndSaveTheme('bg-theme8'); });
    $('#theme9').click(function() { applyAndSaveTheme('bg-theme9'); });
    $('#theme10').click(function() { applyAndSaveTheme('bg-theme10'); });
    $('#theme11').click(function() { applyAndSaveTheme('bg-theme11'); });
    $('#theme12').click(function() { applyAndSaveTheme('bg-theme12'); });
    $('#theme13').click(function() { applyAndSaveTheme('bg-theme13'); });
    $('#theme14').click(function() { applyAndSaveTheme('bg-theme14'); });
    $('#theme15').click(function() { applyAndSaveTheme('bg-theme15'); });

    // **************************************************

    // Las funciones originales theme1, theme2, etc., ya no son estrictamente necesarias
    // si usas applyAndSaveTheme, pero puedes dejarlas si otras partes de tu código
    // las llaman directamente (aunque es poco probable en este contexto).
    // Si no las usas en ningún otro lugar, puedes eliminarlas para limpiar el código.

    // function theme1() {
    //   $('body').attr('class', 'bg-theme bg-theme1');
    // }
    // ... y así sucesivamente para todas las funciones themeX
});