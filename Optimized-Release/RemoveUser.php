﻿<link rel="stylesheet" type="text/css" href="project.css">
<h1>Account Remover</h1>
<?php {$email=$_POST['email'];if(empty($email)){echo "<p>Invalid Email (somehow). <p><a href='index.html'>Return to Home Page</a></p></p>";return;}$query='SELECT * FROM `users` WHERE NOT EXISTS (SELECT null FROM users d WHERE d.Email = "'.$email.'");';echo $query;require"connect.php";try{$stmt=$pdo->prepare($query);$stmt->execute();while($row=$stmt->fetch()){if(empty($row['Email'])){}else{echo "<p>Account does not exist. <p><a href='index.html'>Return to Home Page</a></p></p>";return;}}}catch(Exception $e){echo "<p>Unhandled error occured while checking database.</p>";echo "<p><a href='index.html'>Return to Home Page</a></p>";return;}$query='DELETE FROM `users` WHERE `email` = "'.$email.'";';echo $query;try{$stmt=$pdo->prepare($query);$stmt->execute();echo "<p>Removed the user!</p>";}catch(Exception $e){echo "<p>Unhandled error occured while checking database.</p>";echo "<p><a href='index.html'>Return to Home Page</a></p>";return;}echo "<p><a href='index.html'>Return to Home Page</a></p>";}?>