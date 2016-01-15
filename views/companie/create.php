<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Create Company Account 1/2</h4>
        <hr>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Name" name="name">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea  class="form-control"  rows="3" name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address"  placeholder="Address">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email"  placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="logo"  placeholder="Logo">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Citys</label>
                <div class="col-sm-10">
                    <select multiple class="form-control" name="cities[]">
                        <?php echo $citySelect; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Activity Domains</label>
                <div class="col-sm-10">
                    <select multiple class="form-control" name="domain">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="/" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default" value="company" name="createcompany">Next</button>                    
                </div>
            </div>
        </form>
    </div><!--/.row-->
        <?php errorHandler::printErrorsOnStack(); ?>
    
</div>