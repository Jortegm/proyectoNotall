
$( window ).load(function() {
    $("#editar").click(function(e) {
        e.preventDefault();
        $("#info").hide();
        $("#modificar").show();
        $("div").eq(42).hide();
        $("div").eq(43).hide();

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

    $("#metrome").click(function() {
        $(".jumbotron").toggle();
    });

    //menu mostrar y ocultar 
    showhide();
    toggleTools();


});


function showhide() {
    $("#option1").hide();
    $("#row").eq(0).hide();
    $("#nShow").hide();
    $("#articulation").hide();
    $("#ornaments").hide();
    $("#dinamic").hide();
    $("#comp").hide();
}


function toggleTools() {
    $("#Notas").click(function() {
        $("#nShow").toggle();
        $("#articulation").hide();
        $("#ornaments").hide();
        $("#dinamic").hide();
        $("#comp").hide();
    });
    $("#Articulaciones").click(function() {
        $("#articulation").toggle();
        $("#nShow").hide();
        $("#ornaments").hide();
        $("#dinamic").hide();
        $("#comp").hide();
    });
    
    $("#Ornamento").click(function() {
        $("#ornaments").toggle();
        $("#nShow").hide();
        $("#articulation").hide();
        $("#dinamic").hide();
        $("#comp").hide();
    });
    $("#Matices").click(function() {
        $("#dinamic").toggle();
        $("#nShow").hide();
        $("#articulation").hide();
        $("#ornaments").hide();
        $("#comp").hide();
    });
    $("#Compas").click(function() {
        $("#comp").toggle();
        $("#nShow").hide();
        $("#articulation").hide();
        $("#ornaments").hide();
        $("#dinamic").hide();
    });
}