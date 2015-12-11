<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<div class="container">

    <h3>Candidates on Job: <?php echo $job->title ?></h3>

    <div>
        <div>
            
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Career Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($candidateList as $key => $candidat) {
                    echo '
                <tr>
                    <th scope="row">' . ($key + 1) . '</th>
                    <th>' . $candidat->firstname . '</th>
                    <th>' . $candidat->lastname . '</th>
                    <th>' . $candidat->email . '</th>
                    <th>' . $candidat->cv->career_level . '</th>
                    <th><a href="/candidat/viewCandidate/' . $candidat->id . '" class="btn btn-success">View</a> '
                            . '<a href="/companie/job/reject/' . $candidat->id . '" class="btn btn-danger">Reject</a> '
                            . '<a href="/companie/job/accept/' . $candidat->id . '" class="btn btn-primary">Accept</a></th>'.
                '</tr>'; //Id aici
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
errorHandler::printErrorsOnStack();
