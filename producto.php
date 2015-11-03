<?php
include "variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
if (isset($_GET['id'])) {
	$cual = $_GET['id'];
	$r = $mysqli->query("select * from producto where orden=$cual");
	$data=$r->fetch_array();
}
$rprov = $mysqli->query("select nombre, orden from cli_prov where tipo=1");
$cuantosp = $rprov->num_rows;
$ralic = $mysqli->query("select descripcion, orden, alicuota from alicuota where impuesto=0 order by orden");
$cuantasalic=$ralic->num_rows;

include "head.html";
?>

<script type="text/javascript">
function validar_form_cliente() {
	var razon = document.getElementById("razon-id").value;
	var cuit = document.getElementById("cuit-id").value;
	razon = razon.trim(); 
	if (razon.length == 0) {
		return false;
	}
	cuit = cuit.trim();
	return esCUITValida(cuit); 
}	

function esCUITValida(inputValor) {
	inputString = inputValor.toString();
	if (inputString.length == 11) {
        	var Caracters_1_2 = inputString.charAt(0) + inputString.charAt(1);
		if (Caracters_1_2 == "20" || Caracters_1_2 == "23" || Caracters_1_2 == "24" || Caracters_1_2 == "27" || Caracters_1_2 == "30" || Caracters_1_2 == "33" || Caracters_1_2 == "34") {
			var Count = inputString.charAt(0) * 5 + inputString.charAt(1) * 4 + inputString.charAt(2) * 3 + inputString.charAt(3) * 2 + inputString.charAt(4) * 7 + inputString.charAt(5) * 6 + inputString.charAt(6) * 5 + inputString.charAt(7) * 4 + inputString.charAt(8) * 3 + inputString.charAt(9) * 2 + inputString.charAt(10) * 1;
		        Division = Count / 11;
		        if (Division == Math.floor(Division)) {
                		return true;
		        }
	        }
	}
	return false;
}
function enfoco (cual) {
	document.getElementById(cual).style.color="red";
}
function chaufoco (cual) {
	document.getElementById(cual).style.color="black";
}
</script>

<link rel="stylesheet" href="jstree/dist/themes/default/style.min.css" />
</head>
<?php
include "menu.html";
?>
<div><p></p></div>
<section class="prod_sec">
<div id="prod_izq">
<ul>
	<li >Productos
	<ul>
		<li>Uno</li>
		<li>Dos</li>
		<li>Tres</li>
		<li>Cuatro</li>
	</ul>
</ul>
</div>
<div id="event_result" style="margin-top:2em; text-align:center;">&nbsp;</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="jstree/dist/jstree.min.js"></script>
<script>
	$(function () { $('#prod_izq').jstree(); 
	 $('#prod_izq').on("changed.jstree", function (e, data) {var i, j, r = [];
    for(i = 0, j = data.selected.length; i < j; i++) {
      r.push(data.instance.get_node(data.selected[i]).text);
    }
    $('#event_result').html('Selected: ' + r.join(', '));
    });
    });
  </script>
<div id="prod_der" class="tabla">
<form method="POST" action="guardar_producto.php" id="form_producto" accept-charset="iso-8859-1" name="proucto" onsubmit="return validar_form_producto()">
<?php if (isset($cual)):?>
	<input type="hidden" name="producto" value="<?php echo $cual?>">
<?php endif;?>
<div>
	<div class="tabla">Grupo</div>
	<div class="tabla">Producto</div>
</div>
<div>
<table class="clientes">
	<tr><td class="producto-celda-cab" id="nomb">Nombre</td><td class="producto-celda-inp-tit"><input id="razon-id" class="input-box-prod-tit" type="text" size="30" name="nombre" onfocus="enfoco('nomb');" onblur="chaufoco('nomb');" value="<?php echo $data['nombre']?>"> &nbsp;&nbsp;&nbsp; <a href="listado_clientes.php"><img src="imagenes/buscar.png" class="buscar"></a></td></tr>
	<tr><td class="producto-celda-tit" id="descripcion">Descripci&oacute;n</td><td class="producto-celda-inp"><textarea class="textarea-box" rows="4" cols="30" name="descrip" onfocus="enfoco('descripcion');" onblur="chaufoco('descripcion');"><?php echo $data['descrip']?></textarea></td></tr>
	<tr><td class="producto-celda-tit" id="cint">Codigo Interno</td><td class="producto-celda-inp"><input class="input-box-prod" type="text" size="15" name="cint" onfocus="enfoco('cint');" onblur="chaufoco('cint');" value="<?php echo $data['cint']?>"></td></tr>
	<tr><td class="producto-celda-tit" id="prov">Proveedor</td><td class="producto-celda-inp"><select name="prov" onfocus="enfoco('prov');" onblur="chaufoco('prov');" class="admin-elegir">
	<?php for ($i=0; $i<$cuantosp; $i++):
		$data=$rprov->fetch_array();?>
          <option value="<?php echo $data['orden']?>"><?php echo $data['nombre']?></option>
	<?php endfor;?></select></td></tr>
	<tr><td class="producto-celda-tit" id="codp">C&oacute;digo Proveedor</td><td class="producto-celda-inp"><input class="input-box-prod" type="text" size="10" name="codprov" onfocus="enfoco('codp');" onblur="chaufoco('codp');" value="<?php echo $data['codprov']?>"></td></tr>
	<tr><td class="producto-celda-tit" id="codv">C&oacute;digo Venta</td><td class="producto-celda-inp"><input class="input-box-prod" type="text" size="10" name="codprodv" onfocus="enfoco('codv');" onblur="chaufoco('codv');" value="<?php echo $data['codprodv']?>"></td></tr>
	<tr><td class="producto-celda-tit" id="unmed">Unidad de Medida</td><td class="producto-celda-inp"><select name="unmed" onfocus="enfoco('unmed');" onblur="chaufoco('unmed');" class="admin-elegir">
		<option value="1">Unidades</option>
		<option value="2">Metros</option>
		<option value="3">Gramos</option>
		<option value="4">Kilos</option>
		<option value="5">Toneladas</option>
		<option value="6">Mililitros</option>
		<option value="7">Litros</option>
		<option value="8">Metros C&uacute;bicos</option>
	</select></td></tr>
	<tr><td class="producto-celda-tit-ultimo" id="aliciva">Alicuota IVA</td><td class="producto-celda-inp-tit"><select name="aliciva" onfocus="enfoco('aliciva');" onblur="chaufoco('aliciva');" class="admin-elegir">
	<?php for ($i=0; $i < $cuantasalic; $i++):
		$data = $ralic->fetch_array(); ?>
		<option value="<?php echo $data['orden']?>"><?php printf("%s  %.2f %%",$data['descripcion'], $data['alicuota']);?></option>
	<?php endfor;?>
	</select></td></tr>
	<tr><td class="producto-celda-tit-bi"><img class="input-image" src="imagenes/Windows-Close-Program-icon.png" onclick="document.clientes.reset(); return false;"></td>
	<td class="producto-celda-tit-bd"><input type="image" class="input-image" name="enviar" src="imagenes/Windows-Restart-icon.png"></td></tr>
</table>
</form>
</div>
</section>
</body>
</html>
