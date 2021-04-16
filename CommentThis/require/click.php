<?php

include("db.php");
$id         = $_POST['id']; 

mysqli_query($connect, "UPDATE
                        posts
                        SET
                            cview = cview+1
                        WHERE
                            id = '$id'
                        ");

?>