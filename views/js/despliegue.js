// OBTENEMOS LO ID DE CADA ELEMENTO
let oc = document.getElementById("hidden");
let cr = document.getElementById("close");
let add = document.getElementById("add");

// MOSTRAMOS EL FORMULARIO PARA AGREGAR DATOS
add.onclick = function show(){
    oc.style.display = "block";
}

// OCULTAMOS EL FORMULARIO
cr.onclick = function hide(){
    oc.style.display = "none";
}