<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <h3>Company Home</h3>

    <div>
        <div>Filters</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Job</th>
                    <th>Company</th>
                    <th>Available Positions</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($jobList as $key=>$job) {
                    echo '
                <tr>
                    <th scope="row">'.($key+1).'</th>
                    <th>' . $job->title . '</th>
                    <th>' . $job->company->name . '</th>
                    <th>' . $job->availablePositions . '</th>
                    <th>' . $job->startDate . '</th>
                    <th>' . $job->endDate . '</th>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>