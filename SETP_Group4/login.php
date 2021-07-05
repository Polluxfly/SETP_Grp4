<?php require_once('Include/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <!-- Login Icon -->
                <div class="mt-5">
                    <img class="d-flex m-auto" src="Images\login_logo.png" width="180" height="180">
                </div>

                <!-- Login Card -->
                <div class="card">
                    <div class="card-title bg-dark rounded-top">
                        <h3 class="text-center text-white py-3">Login Here!</h3>
                    </div>

                    <div class="card-body">
                        <form action="login_form.php" method="POST">
                            <input type="text" placeholder="User Name " name="username" class="form-control mb-2">
                            <input type="password" placeholder="Password " name="password" class="form-control mb-2">
                            <button class="btn btn-success" name="login">Login</button>
                            <!-- todo: NEXT -->
                            <input type="button" class="btn btn-secondary m-auto" onClick="parent.location='register.php'" value="Register Account"> 
                        </form>
                    </div>              
                </div>

            </div>
        </div>
    </div>


<?php require_once('Include/footer.php'); ?>