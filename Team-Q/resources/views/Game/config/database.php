<!-- https://www.codeofaninja.com/2011/12/php-and-mysql-crud-tutorial.html code adapted from this source -->

<?php
// used to connect to the database
$host = "202.49.5.169";
$db_name = "in710shared_swe_q#";
$username = "in710shared";
$password = "P@ssw0rd";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>