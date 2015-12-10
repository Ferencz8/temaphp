<?php
/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 12:04 PM
 */
require_once dirname(__FILE__).'/../header.php'; ?>

<div class="container">
<div class="col-lg-offset-4">
    <h3>Candidat Signup</h3>

    <form method="post" action="create">

        <!--        <div class="error">--><?php //echo $_SESSION["err"]; ?><!--</div>-->

        <div>
            <div>Username</div>
            <input type="text" name="txtUsername"/>
        </div>
        <div>
            <div>Password</div>
            <input type="password" name="txtPassword"/>
        </div>
        <div>
            <div>Confirm Password
            </div>
            <input type="password" name="txtConfirmPassword"/>
        </div>
        <br>
        <a name="btnBack" class="btn btn-success" href="../candidat/create">Back</a>
        <input type="submit" name="btnSaveNewUser" value="Forward" class="btn btn-danger"/>


    </form>
</div>
</div>