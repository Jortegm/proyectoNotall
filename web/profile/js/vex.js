
window.addEventListener("load",function () {
    partituraVacia();
    //añadir una nueva partitura:
    var nex = document.getElementById("new");
        //añadimos un evento en que consiste en eliminar la pantilla (partitura por defecto) y añadir una nueva en blanco
        nex.addEventListener("click",function() {
          var boo = document.getElementById("boo");
          boo.remove();
          var bo = document.createElement("div");
          bo.setAttribute('id', 'boo');
          var partitura = document.getElementById("escribe");
          bo.appendChild(partitura);
          document.getElementById("part").appendChild(bo);
          partituraVacia();
    });

    var clave = document.getElementById("bassClefIcon");
    clave.addEventListener("click", function () {
        cambiarClave();
    });

});




/**
 * Function que crea y dibuja una partitura vacia
 */
function partituraVacia() {
    VF = Vex.Flow;

    // Create an SVG renderer and attach it to the DIV element named "boo".
    var div = document.getElementById("boo")
    var renderer = new VF.Renderer(div, VF.Renderer.Backends.SVG);

    // Configure the rendering context.
    renderer.resize(1000, 500);
    var context = renderer.getContext();
    context.setFont("Courier", 10, "").setBackgroundFillStyle("#eed");

    // Create a stave of width 400 at position 10, 40 on the canvas.
    var stave = new VF.Stave(10, 40, 400);

    // Add a clef and time signature.
    stave.addClef("treble").addTimeSignature("4/4");

    // Connect it to the rendering context and draw!
    stave.setContext(context).draw();
}


//*******************metronomo****************** */
