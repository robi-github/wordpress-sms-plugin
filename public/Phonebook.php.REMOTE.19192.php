<?php

// set database server access variables: 
$host = "localhost";
$user = "sms";
$pass = "wordpress";
$db = "smsplugin";

// open connection 
$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");

// select database 
mysql_select_db($db) or die ("Unable to select database!");

// create query 
$query = "SELECT * FROM phone_list";

// execute query 
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

// see if any rows were returned 
if (mysql_num_rows($result) > 0) {
  // yes
  // print them one after another
  echo "<a class='btn btn-default'>Compose</a>";
  echo "<a class='btn btn-default'>Inbox</a>";
  echo "<a class='btn btn-default'>Outbox</a>";
  echo "</br>";

  echo "<table class='table table-responsive table-striped' style='width:80%'>";
echo "<thead>";
      echo "<tr>";
      echo "<td> Name </td>";
      echo "<td> Phonenumber </td>";
      echo "<td> Subscription Date</td>";
      echo "<tr>";
echo "<thead>";
    while($row = mysql_fetch_row($result)) {
    echo "<tr>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<tr>";
  }
  echo "</table>";
}
else {
  // no
  // print status message
  echo "No rows found!";
}

// free result set memory 
mysql_free_result($result);

// close connection 
mysql_close($connection);

?>
