<?php
   $value = md5($_GET['value']);
   $conn = new mysqli("localhost:3307", "root", "root", "test_db");
   if($conn->connect_error){
      die("Connection failed. : ".$conn->connect_error);
   };
   $check_query = "SELECT * FROM door_code WHERE code='$value';"; //This query has to check the doorcode stored in a database.
   $check_query_result = mysqli_query($conn, $check_query); //Sends the query.
   if(mysqli_num_rows($check_query_result) > 0){echo "$";} //If we typed the right code, so we just send a dollar sign character to the board as an opening order.
   else{echo "* Wrong doorcode !";}; //Else, we send send a wrong code message.
   $conn->close(); //It's better to close the connection once the order is sent.
?>