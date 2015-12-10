<?php require_once dirname(__FILE__) . '/../header.php'; ?>

<?php

if ($candidateLoggedIn != null) {
    $educations = $candidateLoggedIn->cv->educations;
    $professional_experiences = $candidateLoggedIn->cv->professional_experiences;
}

if (!isset($_SESSION["education"])) {
    $_SESSION["education"] = 0;
}

if (isset($_POST["btnAddEducation"])) {

    if ($_POST["btnAddEducation"] == "+") {

        $_SESSION["education"]++;
    } else if ($_POST["btnAddEducation"] == "-" && $_SESSION["education"] > 0) {
        $_SESSION["education"]--;
    }
}

if (!isset($_SESSION["professionalExperience"])) {
    $_SESSION["professionalExperience"] = 0;
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

<div class="container">
    <h3>Edit CV</h3>
    <br/>

    <div class="row rowMargin">
        <span>First Name</span>
        <input type="text" form="saveCV" name="txtFirstName" value="<?php echo $candidateLoggedIn->firstname; ?>">
    </div>
    <div class="row rowMargin">
        <span>Last Name</span>
        <input type="text" form="saveCV" name="txtLastName" value="<?php echo $candidateLoggedIn->lastname; ?>">
    </div>
    <div class="row rowMargin">
        <span>BirthDate</span>
        <input type="date" form="saveCV" name="txtBirthDate" value="<?php echo $candidateLoggedIn->birthdate; ?>">
    </div>
    <div class="row rowMargin">
        <span>Address</span>
        <input type="text" form="saveCV" name="txtAddress" value="<?php echo $candidateLoggedIn->address; ?>">
    </div>
    <div class="row rowMargin">
        <span>Phone</span>
        <input type="text" form="saveCV" name="txtPhone" value="<?php echo $candidateLoggedIn->phone; ?>">
    </div>
    <div class="row rowMargin">
        <span>Email</span>
        <input type="text" form="saveCV" name="txtEmail" value="<?php echo $candidateLoggedIn->email; ?>">
    </div>
    <div class="row rowMargin">
        <span>Career Level</span>
        <input type="text" form="saveCV" name="txtCareerLevel"
               value="<?php echo $cv != null ? $cv->career_level : ''; ?>">
    </div>
    <div class="row rowMargin">
        <span>Education</span>

        <form method="post" id="addEducationForm">
            <input type="submit" class="btn btn-success" value="+" name="btnAddEducation" form="addEducationForm">
        </form>
        <!--            Education Info     -->
        <?php
        if (isset($_SESSION["education"]) && $_SESSION["education"] > 0) {
            for ($i = 1; $i <= $_SESSION["education"]; $i++) {
                $institution = $city = $position = $startDate = $endDate = '';
                if(isset($educations[$i - 1])){
                    $institution = $educations[$i - 1]->institution;
                    $city = $educations[$i - 1]->city;
                    $startDate = $educations[$i - 1]->startDate;
                    $endDate = $educations[$i - 1]->startDate;
                }
                echo "
                    <div class=\"education\">
                        <div class=\"city\">
                            <span>City</span>
                            <input form='saveCV' type=\"text\" name=\"txtCity" . $i . "Edu" . "\" value = \"" . $city . "\">
                        </div>
                        <div class=\"institution\">
                            <span>Institution</span>
                            <input form='saveCV' type=\"text\" name=\"txtInstitution" . $i . "Edu" . "\" value = \"" . $institution . "\">
                        </div>
                        <div class=\"startDate\">
                            <span>Start Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtStartDate" . $i . "Edu" . "\" value = \"" . $startDate . "\">
                        </div>
                        <div class=\"endDate\">
                            <span>End Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtEndDate" . $i . "Edu" . "\" value = \"" . $endDate . "\">
                        </div>
                    </div>
                    <br/>";
            }
            echo "  <form method='post'>
                            <input type='submit' class='btn btn-success' value='-' name='btnAddEducation'>
                        </form>";
        }
        ?>

    </div>

    <div class="row rowMargin">
        <span>Professional Experience</span>

        <form method="post">
            <input type="submit" class="btn btn-success" value="+" name="btnAddProfessionalExperience">
        </form>

        <!--            Professional Experience Info     -->
        <?php
        if (isset($_SESSION["professionalExperience"]) && $_SESSION["professionalExperience"] > 0) {
            for ($i = 1; $i <= $_SESSION["professionalExperience"]; $i++) {
                $institution = $city = $position = $startDate = $endDate = '';
                if(isset($professional_experiences[$i -1])){
                    $institution = $professional_experiences[$i - 1]->institution;
                    $city = $professional_experiences[$i - 1]->city;
                    $position = $professional_experiences[$i - 1]->position;
                    $startDate = $professional_experiences[$i - 1]->startDate;
                    $endDate = $professional_experiences[$i - 1]->startDate;
                }

                echo "
                <div id='professionalExperience'>
                    <div class='institution'>
                        <span>Institution</span>
                        <input form='saveCV' type='text' name='txtInstitution" . $i . "ProfEdu" . "' value='" . $institution ."'>
                    </div>
                    <div class='city'>
                        <span>City</span>s
                        <input form='saveCV' type='text' name='txtCity" . $i . "ProfEdu" . "' value='" . $city ."'>
                    </div>
                    <div class='position'>
                        <span>Position</span>
                        <input form='saveCV' type='text' name='txtPosition" . $i . "ProfEdu" . "' value='" . $position ."'>
                    </div>
                    <div class='startDate'>
                        <span>Start Date</span>
                        <input form='saveCV' type='date' name='txtStartDate" . $i . "ProfEdu" . "' value='" . $startDate."'>
                    </div>
                    <div class='endDate'>
                        <span>End Date</span>
                        <input form='saveCV' type='date' name='txtEndDate" . $i . "ProfEdu" . "' value='" . $endDate."'>
                    </div>
                </div>
                <br/>";
            }

            echo " <form method='post'>
                        <input type='submit' class='btn btn-success' value='-' name='btnAddProfessionalExperience'>
                    </form>";
        }
        ?>

    </div>
    <div class="row rowMargin">
        <form id="saveCV" method="post">
            <input type="submit" class="btn btn-success" value="Save" name="save">
        </form>
    </div>
</div>