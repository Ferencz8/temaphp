<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<?php

function formatTime($time){
    if($time) {
        preg_match('/(\d{4}-\d{2}-\d{2})/', $time, $match);
        return $match[0];
    }
    return null;
}

if ($candidateLoggedIn != null) {
    $educations = $professional_experiences = array();
    if ($candidateLoggedIn->cv != null) {
        $educations = $candidateLoggedIn->cv->educations;
        $professional_experiences = $candidateLoggedIn->cv->professional_experiences;
    }
}

if (!isset($_SESSION["education"])) {
    $_SESSION["education"]= count($educations);
}

if (isset($_POST["btnAddEducation"])) {

    if ($_POST["btnAddEducation"] == "+") {

        $_SESSION["education"]++;
    } else if ($_POST["btnAddEducation"] == "-" && $_SESSION["education"] > 0) {
        $_SESSION["education"]--;
    }
}

if (!isset($_SESSION["professionalExperience"])) {
    $_SESSION["professionalExperience"] = count($professional_experiences);
}


if (isset($_POST["btnAddProfessionalExperience"])) {

    if ($_POST["btnAddProfessionalExperience"] == "+") {

        $_SESSION["professionalExperience"]++;
    } else if ($_POST["btnAddProfessionalExperience"] == "-" && $_SESSION["professionalExperience"] > 0) {
        $_SESSION["professionalExperience"]--;
    }
}
$cv = $candidateLoggedIn->cv;
?>

<div class="container form-horizontal">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> Edit CV</h4>
        <hr>
        <form method="post" action="create">
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name *</label>

                <div class="col-sm-10">
                    <input type="text" form="saveCV" class="form-control" placeholder="First Name" name="txtFirstName"
                           value="<?php echo $candidateLoggedIn->firstname; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name *</label>

                <div class="col-sm-10">
                    <input type="text" form="saveCV" name="txtLastName" placeholder="Last Name" class="form-control"
                           value="<?php echo $candidateLoggedIn->lastname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">BirthDate *</label>

                <div class="col-sm-10">
                    <input type="date" form="saveCV" class="form-control" name="txtBirthDate"
                           value="<?php echo formatTime($candidateLoggedIn->birthdate); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>

                <div class="col-sm-10">
                    <textarea name="txtAddress" form="saveCV" placeholder="..." class="form-control"
                              value="<?php echo $candidateLoggedIn->address; ?>"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtPhone" form="saveCV" placeholder="Phone" class="form-control"
                           value="<?php echo $candidateLoggedIn->phone; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtEmail" form="saveCV" placeholder="Email" class="form-control"
                           value="<?php echo $candidateLoggedIn->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Career Level</label>

                <div class="col-sm-10">
                    <input type="text" name="txtCareerLevel" form="saveCV" placeholder="Email" class="form-control"
                           value="<?php echo $cv != null ? $cv->career_level : ''; ?>">
                </div>
            </div>
        </form>
            <br/>

            <!--            Education Info     -->

                <div class="form-group">
                    <label class="col-sm-2 control-label">Education</label>

                    <form method="post"">
                        <input type="submit" class="btn btn-success" value="+" name="btnAddEducation">
                    </form>
                </div>
                <?php
                if (isset($_SESSION["education"]) && $_SESSION["education"] > 0) {
                    for ($i = 1; $i <= $_SESSION["education"]; $i++) {
                        $institution = $city = $position = $startDate = $endDate = '';
                        if (isset($educations[$i - 1])) {
                            $institution = $educations[$i - 1]->institution;
                            $city = $educations[$i - 1]->city;
                            $startDate = formatTime($educations[$i - 1]->startdate);
                            $endDate = formatTime($educations[$i - 1]->enddate);
                        }
                        echo "
                            <div class=\"city form-group\">
                                <label class=\"col-sm-2 control-label\">City</label>
                                <div class=\"col-sm-10\">
                                    <input form='saveCV' type=\"text\" placeholder=\"City\" class=\"form-control\" name=\"txtCity" . $i . "Edu" . "\" value = \"" . $city . "\">
                                </div>
                            </div>
                            <div class=\"institution form-group\">
                                <label class=\"col-sm-2 control-label\">Institution</label>
                                <div class=\"col-sm-10\">
                                    <input form='saveCV' type=\"text\" placeholder=\"Institution\" class=\"form-control\"  name=\"txtInstitution" . $i . "Edu" . "\" value = \"" . $institution . "\">
                                </div>
                            </div>
                            <div class=\"startDate form-group\">
                                <label class=\"col-sm-2 control-label\">Start Date</label>
                                <div class=\"col-sm-10\">
                                <input form='saveCV' type=\"date\" placeholder=\"Start Date\" class=\"form-control\"  name=\"txtStartDate" . $i . "Edu" . "\" value = \"" . $startDate . "\"></div>
                            </div>
                            <div class=\"endDate form-group\">
                                <label class=\"col-sm-2 control-label\">End Date</label>
                                <div class=\"col-sm-10\">
                                <input form='saveCV' type=\"date\" placeholder=\"End Date\" class=\"form-control\"  name=\"txtEndDate" . $i . "Edu" . "\" value = \"" . $endDate . "\"></div>
                            </div>";
                    }
                    echo "
                    <div class=\"form-group\">
                        <form method='post' class='col-sm-offset-2'>
                                <input type='submit' class='btn btn-danger' value='-' class=\"form-control\" name='btnAddEducation'>
                        </form>
                    </div>";
                }
                ?>
    <br/>

    <!--            Professional Experience Info     -->

        <div class="form-group">
            <label class="col-sm-2 control-label">Professional Experience</label>

            <form method="post">
                <input type="submit" class="btn btn-success" value="+" name="btnAddProfessionalExperience">
            </form>
        </div>

        <?php
        if (isset($_SESSION["professionalExperience"]) && $_SESSION["professionalExperience"] > 0) {
            for ($i = 1; $i <= $_SESSION["professionalExperience"]; $i++) {
                $institution = $city = $position = $startDate = $endDate = '';
                if (isset($professional_experiences[$i - 1])) {
                    $institution = $professional_experiences[$i - 1]->institution;
                    $city = $professional_experiences[$i - 1]->city;
                    $position = $professional_experiences[$i - 1]->position;
                    $startDate =  formatTime($professional_experiences[$i - 1]->startDate);
                    $endDate =  formatTime($professional_experiences[$i - 1]->startDate);
                }

                echo "
                    <div class='institution form-group'>
                        <label class=\"col-sm-2 control-label\">Institution</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"Institution\" class=\"form-control\" name='txtInstitution" . $i . "ProfEdu" . "' value='" . $institution . "'></div>
                    </div>
                    <div class='city form-group'>
                        <label class=\"col-sm-2 control-label\">City</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"City\" class=\"form-control\" name='txtCity" . $i . "ProfEdu" . "' value='" . $city . "'></div>
                    </div>
                    <div class='position form-group'>
                        <label class=\"col-sm-2 control-label\">Position</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"Position\" class=\"form-control\" name='txtPosition" . $i . "ProfEdu" . "' value='" . $position . "'></div>
                    </div>
                    <div class='startDate form-group'>
                        <label class=\"col-sm-2 control-label\">Start Date</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='date' placeholder=\"Start Date\" class=\"form-control\" name='txtStartDate" . $i . "ProfEdu" . "' value='" . $startDate . "'></div>
                    </div>
                    <div class='endDate form-group'>
                        <label class=\"col-sm-2 control-label\">End Date</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='date' placeholder=\"End Date\" class=\"form-control\" name='txtEndDate" . $i . "ProfEdu" . "' value='" . $endDate . "'></div>
                    </div>
                <br/>";
            }

            echo "
                    <div class=\"form-group\">
                        <form method='post' class='col-sm-offset-2'>
                        <input type='submit' class='btn btn-danger' value='-'  class=\"form-control\" name='btnAddProfessionalExperience'>
                        </form>
                    </div>";
        }
        ?>

    <div class="form-group">
        <form id="saveCV" method="post" class="col-sm-offset-6">
            <input type="submit" class="btn btn-success" value="Save" name="save">
        </form>
    </div>

</div>
    <!--/.row-->
    <?php errorHandler::printErrorsOnStack(); ?>
</div>