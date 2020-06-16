//let numero = 0;

let nuevo = function() {
  let numero=0;
  var num = document.getElementById("sueldobase").value;
    for(var i=1;i<=num;i++){
      numero++;
    jQuery('.inputs').append(`<section id="${numero}">
    <div class="element-name">
        <br/>
        <h3>Empleado ${numero}</h3>
        <label class="title"></label>
        <div class="nameFirst">
        <input type="text" name="nombre[]" id="txtempleado" maxlength="50" placeholder="Nombre" 
        allowed="ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚáéíóúÜü"
        messageid="alfabeticchars" class="large" required/>     
        </div>
       <span id="alfabeticchars">Solo acepta caracteres alfabéticos</span>
        </div>

    <div class="element-name">
        <label class="title"></label>
        <div class="nameFirst">
        <input type="text" name="puesto[]" id="txtempleado" maxlength="50" placeholder="Puesto de trabajo" 
        allowed="ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚáéíóúÜü"
        messageid="alfabeticchars" class="large" required/>    
    </div>
    <span id="alfabeticchars">Solo acepta caracteres alfabéticos</span>
    </div>

    <div  class="element-name">
        <label class="title"></label>
        <div>
        <input type="number" name="cantidadho[]" id="sueldobase" maxlength="12" placeholder="Cantidad de horas" allowed="0123456789"  messageid="numbersonly" class="large" required/>
    </div>
    <span id="numbersonly">Solo acepta números</span>
    </div>
    </section>`);
}
}
let eliminar = function(n) {
  jQuery("section").remove(`#${n}`);
}
