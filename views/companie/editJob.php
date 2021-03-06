<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Editeaza job</h4>
        <hr>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Title" name="title" value="<?php echo $job->title;?>" >
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea  class="form-control"  rows="3" name="description" value="<?php echo $job->description;?>" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Positions Available</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="pos"  placeholder="Positions Available" value="<?php echo $job->availablepositions;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Start Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date1" placeholder="Start Date" value="<?php echo $job->startDate;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">End Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date2"  placeholder="End Date" value="<?php echo $job->endDate;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Cities</label>
                <div class="col-sm-10">
                    <select multiple class="form-control" name="cities[]">
                        <?php echo $citySelect;?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Career Level</label>
                <div class="col-sm-10">
                    <select class="form-control" name="level">
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
                    <button type="submit" class="btn btn-default" value="company" name="jobedit">Create</button>                    
                </div>
            </div>
        </form>
    </div><!--/.row-->
        <?php errorHandler::printErrorsOnStack(); ?>    
</div>