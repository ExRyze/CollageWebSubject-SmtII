<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <main id="main" class="w-full h-100vh d-flex justify-content-center align-items-center bg-lbase">
    <div class="card mb-3 w-25 bg-base text-lbase rounded-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h3 class="card-title text-center pb-0 fs-4">Login to Your Account</h3>
                <p class="text-center">Enter your username &amp; password to login</p>
            </div>

            <?php if(isset($_GET["error"])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php print($_GET["error"]) ?>
                </div>
            <?php } ?>

            <form class="row g-3 needs-validation" novalidate="" method="post" action="config/cf_login.php">
                <div class="col-12 mb-3">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-lsec w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                    <p class="mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>