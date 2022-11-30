<?php 
include("conexion.php");
include("menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Usuario</title>
	 <meta charset="utf-8">
	 <script type="text/javascript">
			function validar()
			{
				 
				if(document.getElementById("txtid").value=="")
				{
					alert("Favor Ingrese la identidad del cliente");
					document.getElementById("txtid").focus();
				}
				else if(document.getElementById("txtnombre").value=="")
				{
					alert("Favor Ingrese un Nombre de el cliente");
					document.getElementById("txtnombre").focus();
				}
				else if(document.getElementById("txtapellido").value=="")
				{
					alert("Favor Ingrese el Apellido del cliente");
					document.getElementById("txtapellido").focus();
				}
				else if(document.getElementById("fecha").value=="")
				{
					alert("Favor Seleccione una Fecha de Nacimiento");
					document.getElementById("fecha").focus();
				}
				else if(document.getElementById("cmbpuesto").value=="")
				{
					alert("Favor Seleccione un Estado");
					document.getElementById("cmbpuesto").focus();
				}
				else if(document.getElementById("txttel").value=="")
				{
					alert("Favor Ingrese un numero de telefono");
					document.getElementById("txttel").focus();
				}
				else if(document.getElementById("txtcorreo").value=="")
				{
					alert("Favor Ingrese el correo electronico");
					document.getElementById("txtcorreo").focus();
				}
				else
				{ 
					//Generar usuario primera letra del nombre y apellido
					var nom=document.getElementById("txtnombre").value;
					var ape=document.getElementById("txtapellido").value;
					var user=nom.substring(0,1)+""+ape;
					user=user.toLowerCase();
					document.getElementById("txtuser").value=user;

					//Generar Clave de 8 digitos
					var clave="";
					var i=0;
					while(i<8)
					{
						clave=clave+""+Math.floor(Math.random() * 10);
						i++;
					}
					document.getElementById("txtpas").value=clave;

					//alert("Vamos a Guardar");
					document.getElementById("accion").value="guardar";
					document.getElementById("formulario").submit();
				}
				return false;
			}
		</script>
</head>

<body>
<?php

$accion=isset($_POST["accion"])?$_POST["accion"]:"";
if($accion=="guardar")
{
	
	//$prueba= substr('".$_POST["txtnombre"]."', 1)."".$_POST["txtuser"]; 

	$sql="insert into `pw2_inventario`.`tbl_usuario` (`usuario_codigo`, `usuario_nombre`, `usuario_apellido`, `usuario_fechain`, `usuario_puesto`, `usuario_telefono`, `usuario_direccion`, `usuario_genero`, `usuario_usuario`, `usuario_contraseña`, `usuario_correo`, `usuario_estado`) VALUES ('".$_POST["txtid"]."', '".$_POST["txtnombre"]."', '".$_POST["txtapellido"]."', '".$_POST["fecha"]."', '".$_POST["cmbpuesto"]."', '".$_POST["txttel"]."', '".$_POST["txtdi"]."', '".$_POST["cmbgenero"]."', '".$_POST["txtuser"]."', '".$_POST["txtpas"]."', '".$_POST["txtcorreo"]."', '".$_POST["cmbestado"]."')";

	 //echo "user".$_POST["txtuser"];
	 //echo "clave".$_POST["txtpas"];
   echo "SQL ".$sql;
	$resultado=mysqli_query($conexion,$sql);
	//echo "<script>alert('Informacion Guardada Satisfactoriamente');</script>";
}
?>
<form name='formulario' id='formulario' method='Post' action=""> 
<input type="hidden" name="accion" id="accion" value="">
 	<div align ="center" id ="titulo">
 	<h2> formulario para  usuario</h2></div>
<fieldset>
 		<label>
 			Identidad del usuario 
 		</label>
 		<input type="text" name="txtid" id="txtid" maxlength="70" value="" placeholder="Identidad"></input>
 	</fieldset>
 <fieldset>
 		<label>
 			Nombre del Usuario
 		</label>
 		<input type="text" name="txtnombre" id="txtnombre" maxlength="30" value="" placeholder="el nombre"></input>
 	</fieldset>	
 <fieldset>
 		<label>
 			Apellido del Usuario
 		</label>
 		<input type="text" name="txtapellido" id="txtapellido" maxlength="20" value="" placeholder="apellido"></input>
 	</fieldset>
 <fieldset>
 		<label>Fecha de Ingreso</label>
 		<input type="date" name="fecha" id="fecha" value="" ></input>
 	</fieldset>
<fieldset>
 	 <label>Puesto:</label>
 		<select name="cmbpuesto" id="cmbpuesto">
 		<option value="">SELLECIONE EL PUESTO</option>
 		<option value="COMTABILIDAD">CONTABILIDAD</option>
 		<option value="SISTEMA">SISTEMA</option>
 		<option value="CAJA">CAJA</option>
 		<option value="GERENCIA">GERENCIA</option>
 			<!---->
 		</select>
 	</fieldset>
 <fieldset>
 		<label>
 			Numero de telefono
 		</label>
 		<input type="text" name="txttel" id="txttel" maxlength="10" value="" placeholder="Telefono"></input>
 	</fieldset>	
<fieldset><!--text area-->
 			<div>
 		<label>
 			Direccion
 		</label>
 		 		</div>
 		<textarea name="txtdi" id="txtdi" rows="4" cols="50" placeholder="Direccion"></textarea>
 	</fieldset>
<fieldset>
 	 <label>Genero:</label>
 		<select name="cmbgenero" id="cmbgenero">
 		<option value="">SELLECIONE EL GENERO</option>
 		<option value="MASCULINO">MASCULINO</option>
 		<option value="FEMENINO">FEMENINO</option>
 			<!---->
 		</select>
 </fieldset>
<fieldset>
 		<label>
 			Usuario
 		</label>
 		<input type="text" name="txtuser" id="txtuser" maxlength="20" readonly value=""></input>
 	</fieldset>	
 	<fieldset>
 		<label>
 			Contraseña
 		</label>
 		<input type="password" name="txtpas" id="txtpas" maxlength="20" readonly value=""></input>
 	</fieldset>	
 	<fieldset>
 		<label>
 			Correo
 		</label>
 		<input type="text" name="txtcorreo" id="txtcorreo" maxlength="20" value="" placeholder="Correo"></input>
 	</fieldset>	
 	<fieldset>
 	 <label>Estado:</label>
 		<select name="cmbestado" id="cmbestado">
 		<option value="">SELLECIONE EL ESTADO</option>
 		<option value="ACTIVO">ACTIVO</option>
 		<option value="INACTIVO">INACTIVO</option>
 			<!---->
 		</select>
 	</fieldset>
 <fieldset>
 	<button name="btnguardar" id="btnguardar" onClick="return validar();">Actualizar</button>
 		<button name="btnlimpiar" id="btnlimpiar">LIMPIAR</button>
 	</fieldset>
 
		<table id='tabla' border='1'>
			<thead>
				<tr>
					<td><b>Codigo</b></td>
					<td>Nombre</td>
					<td>Fecha</td>
					<td>Puesto</td>
					<td>Telefono</td>
					<td>direccion</td>
					<td>genero</td>
					<td>usuario</td>
					<td>Contraseña</td>
					<td>Estado</td>
				</tr>
			</thead>
			<tbody>
			<?php 
			
$sql="select * from v_usuarios";
				$result=mysqli_query($conexion,$sql);
				while($row=mysqli_fetch_assoc($result))
				{
					echo 
					"<tr>
						<td>".$row["codigo"]."</td>
						<td>".$row["nombre"]."</td>
						<td>".$row["fecha"]."</td>
						<td>".$row["puesto"]."</td>
						<td>".$row["tel"]."</td>
						<td>".$row["di"]."</td>
						<td>".$row["genero"]."</td>
						<td>".$row["user"]."</td>
						<td>".$row["pass"]."</td>
						<td>".$row["estado"]."</td>
						
					</tr>";
				}
				?>
			</tbody>
		</table>
</body>
</html>
