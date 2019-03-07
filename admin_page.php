<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Administrator Page</title>
    </head>
    <body>
        <h1>Administrator Page</h1>
        <?php
            session_start();
        if(isset($_SESSION['forename'])){
            if($_SESSION['type'] == 'admin') {
                echo "<p>Welcome Back " . $_SESSION['forename'];
                echo "!</p>";
                echo "<p>Admin information.</p>";
                echo "<br><br><br><br>";
                echo '<a href="logout_page.php">Log Out</a>';
            }
            else{
                echo "<br>";
                echo "<p>Admin not logged in, please return to the ";
                echo '<a href="login_page.php">Login Page.</a>';
                echo "</p>";
            }
        }
        else{
            echo "<br>";
            echo "<p>Admin not logged in, please return to the ";
            echo '<a href="login_page.php">Login Page.</a>';
            echo "</p>";
        }
            // is an Admin logged in?
            
            
            // if so, show Admin content
            
            
            //if not, show message and link to login form
            

        ?>

    </body>

</html>