<?php
/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 11:28 AM
 */
require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Create Candidate Account 1/2</h4>
        <hr>
        <form class="form-horizontal" method="post" action="create">
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name *</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="First Name" name="txtFirstName"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtLastName" placeholder="Last Name" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">BirthDate *</label>

                <div class="col-sm-10">
                    <input type="date" class="form-control" name="txtBirthDate"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>

                <div class="col-sm-10">
                    <textarea name="txtAddress" placeholder="..." class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtPhone" placeholder="Phone" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtEmail" placeholder="Email" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="/" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-default" name="btnNextCreate" value="Next"/>
                </div>
            </div>
        </form>
    </div>
    <!--/.row-->
    <?php errorHandler::printErrorsOnStack(); ?>

</div>
