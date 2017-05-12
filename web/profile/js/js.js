
$( window ).load(function() {
    $("#editar").click(function(e){
        e.preventDefault();
        $("#info").hide();
        $("#modificar").show();
    });

    $(".perfil").click(function (e) {
        e.preventDefault();
        $("#perfil").hide();
    })


});
