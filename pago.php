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
</head>
<body>
<header id="inset">
    <h1>Boleta de pago</h1>
</header>
<section>
    <article>
        <?php 
        if(isset($_POST['enviar'])){
           
			$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $puesto=isset($_POST['puesto']) ? $_POST['puesto'] : "";
            $cantidadh=isset($_POST['cantidadho']) ? $_POST['cantidadho'] : "";

            if($cantidadh<=40){
                $sueldo=$cantidadh*5;
                $horaex=0;
            }
            else if($cantidadh>40){
                $sueldo=$cantidadh*5;
                $horaex=($cantidadh-40)*6.25;
            }

            $sueldosindesc=$sueldo+$horaex;
            $descAFP=$sueldosindesc*0.075;
            $sueldoneto=$sueldosindesc-$descAFP;
            echo "<div id=\"tab\">\n<h3>Boleta de pago</h3>\n";
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th colspan=\"2\">\n\t\t\tDetalle del pago \n\t\t</th>\n\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tNombre: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$nombre,"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tPuesto de Trabajo: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$puesto,"\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tCantidad de Horas: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$cantidadh,"Hrs\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Inicial: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$sueldo,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Horas Extras: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$horaex,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSueldo Sin Descuento: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$sueldosindesc,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tAFP: \n\t\t</td>\n\t\t<td class=\"det\">\n\t\t\t",-$descAFP,"$\n\t\t</td>\n\t\t\t</tr>\n";
            echo "\t<tr>\n\t\t<td>\n\t\t\tSalario Neto: \n\t\t</td>\n\t\t<td class=\"number\">\n\t\t\t",$sueldoneto,"$\n\t\t</td>\n\t\t\t</tr>\n";
		    echo "</table>\n</div>\n";
        }

        ?>
        <a href="index.html" class="a-btn">
			<span class="a-btn-symbol">i</span>
			<span class="a-btn-slide-text">Ingresar mas empleados</span>
			<span class="a-btn-slide-icon"></span>
		</a>
    </article>
</section>
</body>
</html>