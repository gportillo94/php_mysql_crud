<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>select</h3>
    <?php

        $cred = json_decode($_ENV['VCAP_SERVICES'], true);
        print($cred['cleardb']); 

        $servername = "us-cdbr-iron-east-03.cleardb.net";
        $username = "bfd1849f40443a";
        $password = "fcae7675";
        $dbname = "ad_7c1f0caae9b13ee";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            print($conn) ; 
            die("Connection failed: " . $conn->connect_error);
        } 



        $sql = "SELECT * FROM diccionario";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            // output data of each row
            print("<table>") ; 
            print("<thead><th>Clave</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Correo</th></thead>"); 
            while($row = $result->fetch_assoc()) {
                print("<tr><td>".$row["clave"]."</td>");
                print("<td>".$row["nombre"]."</td>");
                print("<td>".$row["direccion"]."</td>");
                print("<td>".$row["telefono"]."</td>");
                print("<td>".$row["correo"]."</td>"."</tr>");
            }
            print("</table>") ; 
        } else {
            print("0 results");
        }
        $conn->close();
    ?>
</body>
</html>
