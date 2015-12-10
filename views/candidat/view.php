<?php require_once dirname(__FILE__).'/../header.php'; ?>

<div class="container">
    <h3>View CV</h3>
    <br/>
    <div class="row rowMargin">
        <span>Career Level</span>
        <input type="text" form="saveCV" name="txtCareerLevel" value="<?php echo $_SESSION['cv']-> career_level;?>">
    </div>
    <div class="row rowMargin">
        <span>Education</span>

        <!--            Education Info     -->
        <?php
        if (isset($_SESSION["education"]) && $_SESSION["education"] > 0) {
            for ($i = 1; $i <= $_SESSION["education"]; $i++) {
                echo "
                    <div class=\"education\">
                        <div class=\"city\">
                            <span>City</span>
                            <input form='saveCV' type=\"text\" name=\"txtCity" . $i . "Edu" . "\" value=\"" . $_SESSION["cv"]->educations[$i - 1]->city . "\" disabled = 'true'>
                        </div>
                        <div class=\"institution\">
                            <span>Institution</span>
                            <input form='saveCV' type=\"text\" name=\"txtInstitution" . $i . "Edu" . "\" value=\"" . $_SESSION["cv"]->educations[$i - 1]->institution . "\" disabled = 'true'>
                        </div>
                        <div class=\"startDate\">
                            <span>Start Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtStartDate" . $i . "Edu" . "\" value=\"" . $_SESSION["cv"]->educations[$i - 1]->startDate . "\" disabled = 'true'>
                        </div>
                        <div class=\"endDate\">
                            <span>End Date</span>
                            <input form='saveCV' type=\"date\" name=\"txtEndDate" . $i . "Edu" . "\" value=\"" . $_SESSION["cv"]->educations[$i - 1]->endDate . "\" disabled = 'true'>
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
        if (isset($_SESSION["professionalExperience"]) && $_SESSION["professionalExperience"] > 0) {
            for ($i = 1; $i <= $_SESSION["professionalExperience"]; $i++) {
                echo "
                <div id='professionalExperience'>
                    <div class='institution'>
                        <span>Institution</span>
                        <input form='saveCV' type='text' name='txtInstitution" . $i . "ProfEdu" . "' value=\"" . $_SESSION["cv"]->professional_experiences[$i - 1]->institution . "\" disabled = 'true'>
                    </div>
                    <div class='city'>
                        <span>City</span>s
                        <input form='saveCV' type='text' name='txtCity>" . $i . "ProfEdu" . "' value=\"" . $_SESSION["cv"]->professional_experiences[$i - 1]->city . "\" disabled = 'true'>
                    </div>
                    <div class='position'>
                        <span>Position</span>
                        <input form='saveCV' type='text' name='txtPosition" . $i . "ProfEdu" . "' value=\"" . $_SESSION["cv"]->professional_experiences[$i - 1]->position . "\" disabled = 'true'>
                    </div>
                    <div class='startDate'>
                        <span>Start Date</span>
                        <input form='saveCV' type='date' name='txtStartDate" . $i . "ProfEdu" . "' value=\"" . $_SESSION["cv"]->professional_experiences[$i - 1]->startDate . "\" disabled = 'true'>
                    </div>
                    <div class='endDate'>
                        <span>End Date</span>
                        <input form='saveCV' type='date' name='txtEndDate" . $i . "ProfEdu" . "' value=\"" . $_SESSION["cv"]->professional_experiences[$i - 1]->endDate . "\" disabled = 'true'>
                    </div>
                </div>
                <br/>";
            }
        }
        ?>

    </div>
</div>