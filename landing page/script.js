$(document).ready(function() {

    // Función para activar el menú hamburguesa
  
    $(".navbar-toggler").click(function() {
      $(".navbar-collapse").toggleClass("show");
    });
  
    // Función para hacer scroll suave a las diferentes secciones
  
    $("a[href^='#']").click(function(e) {
      e.preventDefault();
      var target = $(this).attr("href");
      $("html, body").animate({
        scrollTop: $(target).offset().top
      }, 600);
    });
  
  });
  