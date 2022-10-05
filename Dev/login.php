<?php include('conn.php'); ?>

<?php
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $sql = "INSERT INTO scores (username,score) VALUES ('$username',0)";
                echo $sql;

                if(mysqli_query($conn,$sql)){
                    echo '<script>alert("you are legend")</script>';
                    
                }else{
                    echo '<script>alert("noo")</script>';
                }
            }
        ?>