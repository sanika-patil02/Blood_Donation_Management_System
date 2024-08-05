<!-- Connection File(Server & database connection) -->
<!-- 4 arguments:(server name-localhost,username & admin name are set then give it else root,if password set then give it else kepp empty,database name ) -->

<?php

  $connection = mysqli_connect("localhost","root","","donatetheblood") or die("Database is not connected.".mysqli_connect_error());

?>


