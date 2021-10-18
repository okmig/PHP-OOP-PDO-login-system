<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        if(isset($_SESSION["userid"])) {
    ?>    
    <div class="alert alert-success">
        Hi <strong><?php echo $_SESSION["useruid"]; ?></strong>!
    </div>
    <button type="button" class="btn"><a href="includes/logout.inc.php">Log out</a></button>       
    <?php   
        }
        else {
    ?>
    <div class="row">
        <div class="col">
            <div class="container">
                <h4>SIGN UP</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="uid" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="uid" placeholder="Enter username" name="uid">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    <div class="mb-3">
                        <label for="pwdrepeat" class="form-label">Repeat Password:</label>
                        <input type="password" class="form-control" id="pwdrepeat" placeholder="Enter repeat password" name="pwdrepeat">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">SIGN UP</button>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <h4>LOGIN</h4>
                <p>Login here!</p>
                <form action="includes/login.inc.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="uid" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="uid" placeholder="Enter username" name="uid">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        }    
    ?> 
</body>
</html>