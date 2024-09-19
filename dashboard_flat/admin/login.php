<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<main class="page-content">

    <div class="container-fluid">

        <div class="row">

            <div class="login-container">
                <h2>Login</h2>
                <form action="your_login_script.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-login btn-block">Login</button>
                </form>
                <p class="text-center mt-3">
                    <a href="#">Forgot Password?</a>
                </p>
            </div>



        </div>

    </div>
</main>
<?php include('footer.php') ?>