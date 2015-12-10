<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Edit Account</h4>
        <hr>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Name" name="name" value="<?php echo $company->name;?>" >
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea  class="form-control"  rows="3" name="description" value="<?php echo $company->description;?>" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address"  placeholder="Address" value="<?php echo $company->address;?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $company->phone;?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email"  placeholder="Email" value="<?php echo $company->email;?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="logo"  placeholder="Logo" value="<?php echo $company->logo;?>" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Citys</label>
                <div class="col-sm-10">
                    <select multiple class="form-control" name="cities" >
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
                    <button type="submit" class="btn btn-default" value="company" name="edit">Save</button>                    
                </div>
            </div>
        </form>
    </div><!--/.row-->
        <?php errorHandler::printErrorsOnStack(); ?>
    
</div>