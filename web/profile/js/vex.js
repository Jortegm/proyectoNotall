
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
  const VF = Vex.Flow;

  // Create an SVG renderer and attach it to the DIV element named "boo".
  var vf = new VF.Factory({renderer: {selector: 'boo'}});
  var score = vf.EasyScore();
  var system = vf.System();

  system.addStave({
    voices: [score.voice(score.notes('C#5/q, B4, A4, G#4'))]
  }).addClef('treble').addTimeSignature('4/4');

  vf.draw();
}


