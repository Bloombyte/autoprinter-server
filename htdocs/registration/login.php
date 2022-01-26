<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>

<form action="verify.php" method="post">
    
<h1>User Login</h1>
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required><hr>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required><hr>

        <button type="submit">Login</button><hr>
        
     </div>

    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Create a <a href="./register.php">new account?</a></span>&nbsp;
        <span class="psw">Forgot <a href="#">password?</a></span>
     </div>
</form>
    
</body>
</html>