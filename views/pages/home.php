<?php require_once dirname(__FILE__).'/../header.php'; ?>

<div class="container">

    <form class="form-signin" action='../pages/login' method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name='username' id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password" required></br>
<!--        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='login' value='login'>Sign in</button></br>
        <div>
            <a href="../candidat/create" class="btn btn-default btn-sm btn-block">Create Candidat Account</a>
            <a href="../companie/create" class="btn btn-default btn-sm btn-block">Create Companie Account</a>
        </div>
        <?php if(isset($_SESSION['loginerror'])): ?>
        </br>
        <div class="alert alert-danger" role="alert">
        <strong>Some problems have been detected</strong>
            <?php echo $_SESSION['loginerror']; unset($_SESSION['loginerror']);?>
        </div>
        <?php endif; ?>
    </form>

</div>