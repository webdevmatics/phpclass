<?php
require_once './includes/connections.php';
require_once './includes/functions.php';

// $users = [
//   [
//       'name'=>'Rameshwor',
//       'email'=>'ram@gmail.com'
//   ],
//   [
//       'name'=>'Hari',
//       'email'=>'hari@gmail.com'
//   ]
// ];

$userSelectQuery = "SELECT * FROM users";

$userQueryResult = mysqli_query($connection, $userSelectQuery);


// $userData = mysqli_fetch_assoc($result);

// $rowCount = mysqli_num_rows($result);



include './views/index.view.php'

?>

