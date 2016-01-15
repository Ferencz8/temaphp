<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <h3>Company Home</h3>

    <div>
        <div>
            <p><h4>Filters</h4></p>
            <form method="post">
                <div class="row">
                    <div class="col-xs-3">
                        <p><h5>Job:</h5></p>
                        <input type="text" class="form-control" placeholder="Job" name="job">
                    </div>
                    <div class="col-xs-3">
                        <p><h5>City:</h5></p>
                        <select  class="form-control" name="city">
                            <?php echo $citySelect; ?>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <p><h5>Domain:</h5></p>
                        <select  class="form-control"  name="domain">
                            <option>Domain</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <p><h5>Career:</h5></p>
                        <select  class="form-control" name="career">
                            <option>Career</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <p><h5>&nbsp;</h5></p>
                        <button type="submit" name="Cauta" value="cauta" class="btn btn-default form-control">Cauta</button>
                    </div>

                </div>
        </div>
        </form>
        </br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Job</th>
                    <th>Company</th>
                    <th>Available Positions</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($jobList as $key => $job) {
                    echo '
                <tr>
                    <th scope="row">' . ($key + 1) . '</th>
                    <th>' . $job->title . '</th>
                    <th>' . $job->company->name . '</th>
                    <th>' . $job->availablepositions . '</th>
                    <th>' . $job->startDate . '</th>
                    <th>' . $job->endDate . '</th>
                    <th><a href="/companie/job/candidates/' . ($job->id) . '" class="btn btn-success">View Aplications</a> '
                    . '<a href="/companie/job/edit/' . ($job->id) . '" class="btn btn-primary">Edit</a> '
                    . '<a href="/companie/job/delete/' . ($job->id) . '" class="btn btn-danger">Delete</a></th> ' .
                    '</tr>'; //Id aici
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
errorHandler::printErrorsOnStack();
