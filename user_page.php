<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Page</title>
    </head>
    <body>
        <h1>User Page</h1>
        <?php
            session_start();
            // is a User logged in?
            if(isset($_SESSION['forename'])){
                if($_SESSION['type'] == 'user'){
                    echo "<p>Welcome Back ".$_SESSION['forename'];
                    echo "!</p>";
                    echo "<br><br><br><br>";
                    echo '<a href="logout_page.php">Log Out</a>';
                }
                else{
                    echo "<br>";
                    echo "<p>User not logged in, please return to the ";
                    echo '<a href="login_page.php">Login Page.</a>';
                    echo "</p>";
                }
            }
            else{
                echo "<br>";
                echo "<p>User not logged in, please return to the ";
                echo '<a href="login_page.php">Login Page.</a>';
                echo "</p>";
            }

            
            // if so, welcome them back
            
            
            // if not, show message and link to login page
            
            
        ?>

    </body>
</html>
