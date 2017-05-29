
window.addEventListener("load",function () {
    hideTools();
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
 * Escondemos todo el menu de anotacion
 */
function hideTools () {
    document.getElementById("option1").style.display="none";
    document.getElementsByClassName("row")[0].style.display="none";
    document.getElementById("nShow").style.display="none";
    document.getElementById("articulation").style.display="none";
    document.getElementById("ornaments").style.display="none";
    document.getElementById("dinamic").style.display="none";
}


/**
 * Function que crea y dibuja una partitura vacia
 */
function partituraVacia() {

// crear partitura vacia
    VF = Vex.Flow;

// Create an SVG renderer and attach it to the DIV element named "boo".
    var div = document.getElementById("boo")
    var renderer = new VF.Renderer(div, VF.Renderer.Backends.SVG);

// Configure the rendering context.
    renderer.resize(900, 800);
    var context = renderer.getContext();
    context.setFont("Arial", 14, "").setBackgroundFillStyle("#eed");

// Create a stave of width 400 at position 10, 40 on the canvas.
    var stave = new VF.Stave(10, 40, 800);

// Add a clef and time signature.
    stave.addClef("treble").addTimeSignature("4/4");

// Connect it to the rendering context and draw!
    stave.setContext(context).draw();

}

