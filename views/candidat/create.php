<?php
/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 11:28 AM
 */
require_once dirname(__FILE__).'/../header.php'; ?>

<div class="col-lg-offset-4">
    <form method="post" action="create">
        <!--    <div class="error">--><?php //echo $_SESSION["err"]; ?><!--</div>-->
        <fieldset>
            <legend>SignUp</legend>
            <div>
                <span>First Name *</span>
                <input type="text" name="txtFirstName"/>
            </div>
            <div>
                <span>Last Name *</span>
                <input type="text" name="txtLastName"/>
            </div>
            <div>
                <span>BirthDate *</span>
                <input type="date" name="txtBirthDate"/>
            </div>
            <div>
                <span>Address</span>
                <input type="text" name="txtAddress"/>
            </div>
            <div>
                <span>Phone *</span>
                <input type="text" name="txtPhone"/>
            </div>
            <div>
                <span>Email *</span>
                <input type="text" name="txtEmail"/>
            </div>
            <input type="submit" name="btnNextCreate" value="Next"/>
        </fieldset>
    </form>
</div>
