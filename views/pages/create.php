<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid col-xs-6 col-sm-offset-3">
        <h4 class=""><i class="icon-plus-sign-alt"></i> <?php echo $createTitle; ?></h4>
        <hr>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="username" name="txtUsername">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control"  placeholder="password" name="txtPassword">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Confirm</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control"  placeholder="confirm password" name="txtConfirmPassword">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo $createBackLink; ?>" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-default" value="createUser" name="createUser">Create</button>                    
                </div>
            </div>
        </form>
    </div><!--/.row-->
    <?php if(isset($_SESSION['createusererror'])): ?>
        </br>
        <div class="alert alert-danger" role="alert">
        <strong>Some problems have been detected</strong>
            <?php echo $_SESSION['createcusererror']; unset($_SESSION['createcompanyerror']);?>
        </div>
    <?php endif; ?>
    
</div>