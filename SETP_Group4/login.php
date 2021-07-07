<?php

session_start();

?>



<html>
<head>

    <title>Milo Bing</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>
    
    <div class="companylogo"><img src="img/logo.png" alt="logo"><h1>Milo Bing Language Centre</h1></div>

    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-center">
                    <h2>Login</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>