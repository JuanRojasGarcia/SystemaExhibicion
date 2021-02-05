$(document).ready(function(){
  "use strict";

    var path = window.location.href; 
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    const d = new Date()
  $('#date').html(`${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()}`)
});

