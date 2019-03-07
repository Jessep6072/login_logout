<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log in to Website</title>
        <style>
            input {
                margin-bottom: 0.5em;
            }
        </style>
    </head>
    <body>
        <?php
        $username = '';
        $password = '';
        $salt1    = "qm&h*";
        $salt2    = "pg!@";
        $errorTxt = '';

        session_start();

        if(isset($_SESSION['forename'])){

            if($_SESSION['type'] == 'user'){
                header('Location: user_page.php');

            }
            elseif($_SESSION['type'] == 'admin'){
                header('Location: admin_page.php');

            }

        }

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $token = hash('ripemd128', "$salt1$password$salt2");


            require_once 'login.php';
            $connection = new mysqli($hn, $un, $pw, $db);

            if ($connection->connect_error) die($connection->connect_error);

            $query = "SELECT * FROM lab4_users WHERE username = '$username' AND password = '$token'";

            $result = $connection->query($query);
            if (!$result) die($connection->error);


            if ($result->num_rows === 0){
                $errorTxt = 'Incorrect Username or Password, please re-enter';
            }
            else{
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $value = $row['type'];


                $_SESSION['forename'] = $row['forename'];
                $_SESSION['type'] = $value;

                if($value == 'user'){
                    header('Location: user_page.php');

                }
                elseif($value == 'admin'){
                    header('Location: admin_page.php');

                }
            }

        }



          // Is someone already logged in? If so, forward them to the correct
          // page. (HINT: Implement this last, you cannot test this until
          //              someone can log in.)


          // Were a username and password provided? If so check them against
          // the database.
          
          
          //      If username / password were valid, set session variables
          //      and forward them to the correct page
          
          
          //      If the username / password were not valid, show error message
          //      and populate form with the original inputs
          
          
        ?>
        <h1>Welcome to <span style="font-style:italic; font-weight:bold; color: maroon">
                Great Web Application</span>!</h1>
                
        <p style="color: red">
            <?php
            echo "$errorTxt";
            ?>
        </p>



        <form method="post" action="login_page.php">
            <label>Username: </label>
            <input type="text" name="username" value = "<?php echo $username ?>"> <br>
            <label>Password: </label>
            <input type="password" name="password" value = "<?php echo $password ?>"> <br>
            <input type="submit" name = 'submit' value="Log in">
        </form>
        
        <p style="font-style:italic">
            Placeholder for "forgot password" link<br><br>
            Placeholder for "create account" link
        </p>
</html>
<?php
// place useful functions here
// examples: salt and hash a string
//           check to see if a username/password combination is valid
//           forward user or admin to the correct page


?>
