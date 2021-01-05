   <?php
    echo  "<br>";
    echo  "<br>";
    echo  "<br>";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "checkedplaces";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT DISTINCT * FROM LOCATION ORDER BY PLACE DESC;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<div class=\"wrong\"> RECENTLY SEARCHED  :  </div>";

      while ($row = $result->fetch_assoc()) {
        echo  strtoupper($row["PLACE"]) . ",  ";

      }
    } else {
      echo '
<p color="white" class="recently-searched">NO RECENTLY SEARCHED PLACES</p>';
    }
    $conn->close();
    ?>