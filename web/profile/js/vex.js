
// crear partitura vacia
VF = Vex.Flow;


// Create an SVG renderer and attach it to the DIV element named "boo".
var div = document.getElementById("boo")
var renderer = new VF.Renderer(div, VF.Renderer.Backends.SVG);

// Configure the rendering context.
renderer.resize(800, 600);
var context = renderer.getContext();
context.setFont("Arial", 15, "").setBackgroundFillStyle("#eed");

// Create a stave of width 400 at position 10, 40 on the canvas.
var stave = new VF.Stave(10, 40, 400);

// Add a clef and time signature.
stave.addClef("treble").addTimeSignature("4/4");

// Connect it to the rendering context and draw!
stave.setContext(context).draw();
/**
* Draw notes
*/

var notes = [
    // A quarter-note C.
    new VF.StaveNote({clef: "treble", keys: ["A/4"], duration: "q" }),

    // A quarter-note D.
    new VF.StaveNote({clef: "treble", keys: ["d/5"], duration: "qr" }),

    // A quarter-note rest. Note that the key (b/4) specifies the vertical
    // position of the rest.
    new VF.StaveNote({clef: "treble", keys: ["b/4"], duration: "q" }),

    // A C-Major chord.
    new VF.StaveNote({clef: "treble", keys: ["d/4"], duration:"q" })
];

// Create a voice in 4/4 and add above notes
var voice = new VF.Voice({num_beats: 3,  beat_value: 3});
voice.addTickables(notes);

// Format and justify the notes to 400 pixels.
var formatter = new VF.Formatter().joinVoices([voice]).format([voice], 400);

// Render voice
voice.draw(context, stave);

