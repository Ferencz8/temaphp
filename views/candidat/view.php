<?php require_once dirname(__FILE__).'/../header.php'; ?>

<div class="container">
    <h3>View CV</h3>
    <br/>
    <div class="row rowMargin">
        <span>First Name</span>
        <input type="text" form="saveCV" name="txtFirstName" value="<?php echo $candidateLoggedIn -> firstname; ?>" disabled = 'true'>
    </div>
    <div class="row rowMargin">
        <span>Last Name</span>
        <input type="text" form="saveCV" name="txtLastName" value="<?php echo $candidateLoggedIn -> lastname; ?>" disabled = 'true'>
    </div>
    <div class="row rowMargin">
        <span>BirthDate</span>
        <input type="date" form="saveCV" name="txtBirthDate" value="<?php echo $candidateLoggedIn -> birthdate; ?>" disabled = 'true'>
    </div>
    <div class="row rowMargin">
        <span>Address</span>
        <input type="text" form="saveCV" name="txtAddress" value="<?php echo $candidateLoggedIn -> address; ?>" disabled = 'true'>
    </div>
    <div class="row rowMargin">
        <span>Phone</span>
        <input type="text" form="saveCV" name="txtPhone" value="<?php echo $candidateLoggedIn -> phone; ?>" disabled = 'true'>
    </div>
    <div class="row rowMargin">
        <span>Email</span>
        <input type="text" form="saveCV" name="txtEmail" value="<?php echo $candidateLoggedIn -> email; ?>" disabled = 'true'>
    </div>
    <br/>
    <div class="row rowMargin">
        <span>Career Level</span>
        <input type="text" form="saveCV" name="txtCareerLevel" value="<?php echo $cv !=null && $cv -> career_level!=null ? $cv -> career_level : '';?>" disabled = 'true'>
    </div>
    <br/><br/>
    <div class="row rowMargin">
        <span>Education</span>

        <!--            Education Info     -->
        <?php
        if ($cv != null &&  count($cv -> educations) > 0) {
            for ($i = 1; $i <= count($cv -> educations); $i++) {
                echo "
                    <div class=\"education\">
                        <div class=\"city\">
                            <span>City</span>
                            <input form='saveCV' type=\"text\" name=\"txtCity" . $i . "Edu" . "\" value=\"" . $cv -> educations[$i - 1]->city . "\" disabled = 'true'>
                        </div>
                        <div class=\"institution\">
                            <span>Institution</span>
                            <input form='saveCV' type=\"text\" name=\"txtInstitution" . $i . "Edu" . "\" value=\"" . $cv->educations[$i - 1]->institution . "\" disabled = 'true'>
                        </div>
                        <div class=\"startDate\">
                            <span>Start Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtStartDate" . $i . "Edu" . "\" value=\"" . $cv->educations[$i - 1]->startDate . "\" disabled = 'true'>
                        </div>
                        <div class=\"endDate\">
                            <span>End Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtEndDate" . $i . "Edu" . "\" value=\"" . $cv->educations[$i - 1]->endDate . "\" disabled = 'true'>
                        </div>
                    </div>
                    <br/>";
            }
        }
        ?>

    </div>

    <div class="row rowMargin">
        <span>Professional Experience</span>


        <!--            Professional Experience Info     -->
        <?php
        if ($cv != null && count($cv -> professional_experiences) > 0) {
            for ($i = 1; $i <= count($cv -> professional_experiences); $i++) {
                echo "
                <div id='professionalExperience'>
                    <div class='institution'>
                        <span>Institution</span>
                        <input form='saveCV' type='text' name='txtInstitution" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->institution . "\" disabled = 'true'>
                    </div>
                    <div class='city'>
                        <span>City</span>s
                        <input form='saveCV' type='text' name='txtCity>" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->city . "\" disabled = 'true'>
                    </div>
                    <div class='position'>
                        <span>Position</span>
                        <input form='saveCV' type='text' name='txtPosition" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->position . "\" disabled = 'true'>
                    </div>
                    <div class='startDate'>
                        <span>Start Date</span>
                        <input form='saveCV' type='date' name='txtStartDate" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->startDate . "\" disabled = 'true'>
                    </div>
                    <div class='endDate'>
                        <span>End Date</span>
                        <input form='saveCV' type='date' name='txtEndDate" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->endDate . "\" disabled = 'true'>
                    </div>
                </div>
                <br/>";
            }
        }
        ?>

    </div>
</div>