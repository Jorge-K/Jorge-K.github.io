<?php
    $hostname="localhost";
    $username="root"; 
    $password ="";
    $database="comer";

$conexion = mysqli_connect($hostname, $username, $password, $database);

//*llamado a los input del formulario. 
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$website = $_POST["website"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];


//*Verificacion de la conexion a la base de datos. 

if (!$conexion)
    {
        echo "No se ha podido conectar con el servidor" . mysqli_connect_error();
    }
else
    {
        echo"<b><h3>Conexion exitosa</h3></b>";
    }
//*Codigo para indicar la direccion a la base de datos. 
    $datab = "comer";
    $database =mysqli_select_db($conexion, $datab);

    if (!$database)
    {
        echo"No se ha encontrado la tabla";
    }
    else
    {
        echo"La tabla ha sido seleccionada";
    }
    $instruccion_SQL = "INSERT INTO tabla (nombre, email, telefono, website, asunto, mensaje)
    VALUES ('$nombre', '$email', '$telefono', '$website', '$asunto', '$mensaje')";

    $resultado = mysqli_query($conexion,$instruccion_SQL);

    $consulta = "SELECT * FROM tabla";

$result = mysqli_query($conexion, $consulta);
if (!$result)
{
    echo "No se logro realizar la consulta";
}

echo "<table>";
    echo "<tr>";
    echo "<th><h1>id</th></h1";
    echo "<th><h1>nombre</th></h1";
    echo "<th><h1>email</th></h1";
    echo "<th><h1>telefono</th></h1";
    echo "<th><h1>website</th></h1";
    echo "<th><h1>asunto</th></h1";
    echo "<th><h1>mensaje</th></h1";
    echo "<tr>";

while ($colum =mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2";
    echo "<td><h2>" . $colum['nombre']. "</td></h2";
    echo "<td><h2>" . $colum['email']. "</td></h2";
    echo "<td><h2>" . $colum['telefono']. "</td></h2";
    echo "<td><h2>" . $colum['website']. "</td></h2";
    echo "<td><h2>" . $colum['asunto']. "</td></h2";
    echo "<td><h2>" . $colum['mensaje']. "</td></h2";
    echo "<tr>";
}
echo "</table>";

mysqli_close ($conexion);
echo'<a href="index.html"> Volver Atras</a>';