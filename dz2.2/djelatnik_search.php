<html>

<head>


</head>

<body>
    <?php
    header('Access-Control-Allow-Origin: http://localhost:8080');
    header("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Accept-Language, X-Authorization");
    header('Access-Control-Max-Age: 86400');
    // get the q parameter from URL
    $s = $_REQUEST["s"];
    $hint = "";

    // lookup all hints from array if $q is different from "" 

    $s = strtolower($s);
    $len = strlen($s);




    /*  foreach ($a as $name) {
        if (stristr($s, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }*/




    /**********************************************************/
    $db = mysqli_connect("localhost", "root", "");

    if ($db) {

        $result = mysqli_select_db($db, "learningsql") or die("Doslo je do problema prilikom odabira baze...");
        if ($s == "") {
            $sql = "SELECT * FROM employee";
        } else {
            $sql = "SELECT * FROM employee where First_name LIKE '%$s%'";
        }
        $result2 = mysqli_query($db, $sql) or die("Doslo je do problema prilikom izvrsavanja upita...");
        $n = mysqli_num_rows($result2);


        if ($n > 0) {

            echo "<table class=table>
			<thead>
			 <th> EMP_ID </th>
             <th> END Date </th>
			 <th> First_name </th>
			 <th> Last name </th>
             
			 </thead>";

            while ($myrow = mysqli_fetch_row($result2)) {
                echo " <tbody>
                <tr>
                  <td data-label='EMP_ID'>$myrow[0]</td>
                  <td data-label='END Date'>$myrow[1]</td>
                  <td data-label='First_name'>$myrow[2]</td>
                  <td data-label='Last name'>$myrow[3]</td>
           
               </tr>
                 </tbody>";
            }
            echo "</table>";
        } else {
            echo "<br>Nije proslo spajanje<br>";
        }
        /**********************************************************/
    }

    // Output "no suggestion" if no hint was found or output correct values 
    //echo $hint === "" ? "no suggestion" : $hint;
    ?>
</body>

</html>