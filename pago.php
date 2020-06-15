<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de pago</title>
    <link rel="stylesheet" href="css/salario.css" />
    <link rel="stylesheet" href="css/links.css"/>
    <link rel="stylesheet" href="css/formoid-solid-purple.css" />
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Khula:wght@300&display=swap" rel="stylesheet">
    <script src="js/inputFilter.js"></script>
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>
        let numero = 1;
let nuevo = function() {
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

    <button class="btn-danger" onclick="eliminar(${numero})">Eliminar</button></section>`);
}

let eliminar = function(n) {
  jQuery("section").remove(`#${n}`);
}
    </script>
</head>
<body>
<header id="inset">
        <h1>Pago de empleados</h1>
    </header>
    <section>
    <article>
    <div id="empleado">
    <form action="pago.php" method="POST" name="facturacio" id="salario" 
    class="formoid-solid-purple">
    <div class="title">
    <h2>Introducir datos</h2>
    </div>
    <br>
    <div  class="element-name">
        
        <label class="title"></label>
        <div>
        <input type="number" name="cantidadt" id="sueldobase" maxlength="12" placeholder="Cantidad de Empleados" allowed="0123456789"  messageid="numbersonly" class="large" required/>
    </div>
    <span id="numbersonly">Solo acepta números</span>
    </div>
    <div class="element-name">
        <br/>
        <h3>Empleado 1</h3>
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
  <div class="inputs">
    <button type="button" onclick="nuevo();">Agregar</button>
  </div>

    <div class="submit" >
        <input type="submit" name="enviar" id="enviar" value="Enviar"/>
        <input type="reset" name="reset" id="reset" value="Restablecer" />
</div>
</form>
</div>
</article>
</section>

<header id="inset">
    <h1>Boleta de pago</h1>
</header>
<section>
    <article>
        <?php 
        if(isset($_POST['enviar'])){
           
			$nombre=$_POST['nombre'];
            $puesto=$_POST['puesto'];
            $cantidadh=$_POST['cantidadho'];
            $cantidadt=$_POST['cantidadt'];
            $datos=array("nombre"=>$nombre, "puesto"=>$puesto, "cantidadho"=>$cantidadh);
            for($i=0; $i<$cantidadt; $i++){
            if($cantidadh[$i]<=40){
                $sueldo=$cantidadh[$i]*5;
                $horaex=0;
            }
            else if($cantidadh[$i]>40){
                $sueldo=$cantidadh[$i]*5;
                $horaex=($cantidadh[$i]-40)*6.25;
            }

            $sueldosindesc=$sueldo+$horaex;
            $descAFP=$sueldosindesc*0.075;
            $sueldoneto=$sueldosindesc-$descAFP;
            
            echo "<div id=\"tab\">\n";
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th colspan=\"2\">\n\t\t\tDetalle del pago \n\t\t</th>\n\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tNombre: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$nombre[$i],"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tPuesto de Trabajo: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$puesto[$i],"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tCantidad de Horas: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$cantidadh[$i],"Hrs\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Inicial: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$sueldo,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Horas Extras: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$horaex,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Sin Descuento: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$sueldosindesc,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tAFP: \n\t\t</td>\n\t\t<td class=\"det\">\n\t\t\t",-$descAFP,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSalario Neto: \n\t\t</td>\n\t\t<td class=\"number\">\n\t\t\t",$sueldoneto,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "</table>\n</div>\n";
            echo "<br>";
        }
        }

        ?>
        <br>
        <br>
    </article>
</section>
</body>
</html>