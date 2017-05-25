
$( window ).load(function() {
    $("#editar").click(function(e) {
        e.preventDefault();
        $("#info").hide();
        $("#modificar").show();
        $("div").eq(43).hide();
        $("div").eq(44).hide();

    });

    $("a.btn.btn-lg.btn-danger").click(function() {
       $("#option").show();
    });


    $("#partitura").click(function () {
        $("#option1").hide();
    });
    $("#listado").click(function () {
        $("#option1").hide();
    });

});
