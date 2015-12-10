<?php
/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 12:04 PM
 */
require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Create Candidate Account 2/2</h4>
        <hr>
        <form class="form-horizontal" method="post" action="create">
            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="User Name" name="txtUsername"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="txtPassword"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Confirm Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Confirm Password"
                           name="txtConfirmPassword"/>
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a name="btnBack" class="btn btn-success" href="../candidat/create">Back</a>
                    <input type="submit" name="btnSaveNewUser" value="Forward" class="btn btn-default"/>
                </div>
            </div>
        </form>
    </div>
    <!--/.row-->
    <?php errorHandler::printErrorsOnStack(); ?>

</div>
