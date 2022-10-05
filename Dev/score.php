<?php include('conn.php')?>
<?php
$username = "";
$score = 1;

$update_sql = "UPDATE scores SET score = '$score' WHERE username ='$username'";
if(mysqli_query($conn, $update_sql)){
    echo 'New score has been added';
}else{
    echo 'error';
}
?>