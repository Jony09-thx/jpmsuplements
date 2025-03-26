<?php
// variables para la BD
$hostBD ='127.0.0.1';
$nombreBD = 'ejemplo';
$usuarioBD = 'root';
$passwordBD = '';
// Conectar con la base
$hostBD="mysql.host=$hostBD; dbname=$nombreBD";
$miPDO =new PDO ($hostPDO, $usuarioBD, $passwordBD);

// Consulta SELECT
$miConsulta = $miPDO ->prepare ('SELECT * FROM persona');

// Ejecutar consulta 
$miConsulta -> execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> CRUD en PHP </title>
<style>
table{
border-collapse: collapse;
width:100%;
}
table id{
border: 1px solid orange;
text-aling: center;
padding: 1.2rem;
}
.button{
border-radius: .5rem;
color: black;
background-color: orange ;
padding: 1rem;
text-decoration: none;
}
</style>
</head>
<body>
<p><a class="button" href="">Crear</a></p>
<table>
<tr> <th>ID</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Calle </th>
<th>Colonia</th>
<th>Municipio</th>
<td></td>
<td></td>
</tr>

<?php foreach ($miConsulta as $clave => $valor); ?>
<tr>
<td> <?= $valor ['ID']; ?</td>
<td> <?= $valor ['Nombre']; ?</td> 
<td> <?= $valor ['Apellido Paterno']; ?</td>
<td> <?= $valor ['Apellido Materno']; ?</td>
<td> <?= $valor ['Calle']; ?</td>
<td> <?= $valor ['Colonia']; ?</td>
<td> <?= $valor ['Municipio']; ?</td>
</tr>
//modificamos un registro

<td><a class="button" href="modificar.php?ID=<?=$valor['ID']?>">Modificar</a></td>
<td><a class="borrar.php?ID=<?=$valor['ID']?>">Borrar</a></td></tr>
<?php endforeach; ?>

//Para leer un solo registro se usa
$registro = $miConsulta->fetch();

//Registrar varias (lo transforma en un array)
$registro=$miConsulta->fetchAll();
</table>
</body>
</html>
