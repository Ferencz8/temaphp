<?php require_once dirname(__FILE__).'/../header.php'; ?>

<div class="container form-horizontal">

    <div class="row-fluid">
        <h4 class=""><i class="icon-plus-sign-alt"></i> View CV</h4>
        <hr>
        <form method="post" action="create">
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name *</label>

                <div class="col-sm-10">
                    <input type="text" form="saveCV" class="form-control" placeholder="First Name" name="txtFirstName"
                           value="<?php echo $candidateLoggedIn -> firstname; ?>" disabled = 'true'>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name *</label>

                <div class="col-sm-10">
                    <input type="text" form="saveCV" name="txtLastName" placeholder="Last Name" class="form-control"
                           value="<?php echo $candidateLoggedIn -> lastname; ?>" disabled = 'true'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">BirthDate *</label>

                <div class="col-sm-10">
                    <input type="date" form="saveCV" class="form-control" name="txtBirthDate"
                           value="<?php echo $candidateLoggedIn -> birthdate; ?>" disabled = 'true'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>

                <div class="col-sm-10">
                    <textarea name="txtAddress" form="saveCV" placeholder="..." class="form-control"
                              value="<?php echo $candidateLoggedIn -> address; ?>" disabled = 'true'></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtPhone" form="saveCV" placeholder="Phone" class="form-control"
                           value="<?php echo $candidateLoggedIn->phone; ?>" disabled = 'true'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email *</label>

                <div class="col-sm-10">
                    <input type="text" name="txtEmail" form="saveCV" placeholder="Email" class="form-control"
                           value="<?php echo $candidateLoggedIn->email; ?>" disabled = 'true'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Career Level</label>

                <div class="col-sm-10">
                    <input type="text" name="txtCareerLevel" form="saveCV" placeholder="Career Level" class="form-control"
                           value="<?php echo $cv !=null && $cv -> career_level!=null ? $cv -> career_level : '';?>" disabled = 'true'>
                </div>
            </div>

            <br/><br/><br/>
            <!--            Education Info     -->
            <div class="form-group">
                <label class="col-sm-2 control-label">Education</label>
            </div>
        <!--            Education Info     -->
        <?php
        if ($cv != null &&  count($cv -> educations) > 0) {
            for ($i = 1; $i <= count($cv -> educations); $i++) {
                echo "
                        <div class=\"city  form-group\">
                            <label class=\"col-sm-2 control-label\">City</label>
                            <div class=\"col-sm-10\">
                                <input form='saveCV' type=\"text\" placeholder=\"City\" class=\"form-control\" name=\"txtCity" . $i . "Edu" . "\"  value=\"" . $cv -> educations[$i - 1]->city . "\" disabled = 'true'>
                            </div>
                        </div>
                        <div class=\"institution  form-group\">
                            <label class=\"col-sm-2 control-label\">Institution</label>
                            <div class=\"col-sm-10\">
                                <input form='saveCV' type=\"text\" placeholder=\"Institution\" class=\"form-control\"  name=\"txtInstitution" . $i . "Edu" . "\" value=\"" . $cv->educations[$i - 1]->institution . "\" disabled = 'true'>
                            </div>
                        </div>
                        <div class=\"startDate  form-group\">
                           <label class=\"col-sm-2 control-label\">Start Date</label>
                           <div class=\"col-sm-10\">
                                    <input form='saveCV' type=\"date\" placeholder=\"Start Date\" class=\"form-control\"  name=\"txtStartDate" . $i . "Edu" . "\" value=\"" . $cv->educations[$i - 1]->startdate . "\" disabled = 'true'>
                           </div>
                        </div>
                        <div class=\"endDate  form-group\">
                            <label class=\"col-sm-2 control-label\">End Date</label>
                            <div class=\"col-sm-10\">
                                    <input form='saveCV' type=\"date\" placeholder=\"End Date\" class=\"form-control\"  name=\"txtEndDate" . $i . "Edu" . "\"value=\"" . $cv->educations[$i - 1]->endDate . "\" disabled = 'true'>
                            </div>
                        </div>
                    <br/>";
            }
        }
        ?>


            <br/>

            <!--            Professional Experience Info     -->

            <div class="form-group">
                <label class="col-sm-2 control-label">Professional Experience</label>
            </div>
        <?php
        if ($cv != null && count($cv -> professional_experiences) > 0) {
            for ($i = 1; $i <= count($cv -> professional_experiences); $i++) {
                echo "
                    <div class='institution form-group'>
                        <label class=\"col-sm-2 control-label\">Institution</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"Institution\" class=\"form-control\" name='txtInstitution" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->institution . "\" disabled = 'true'>
                    </div>
                    </div>
                    <div class='city form-group'>
                        <label class=\"col-sm-2 control-label\">City</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"City\" class=\"form-control\" name='txtCity" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->city . "\" disabled = 'true'>
                    </div>
                    </div>
                    <div class='position form-group'>
                        <label class=\"col-sm-2 control-label\">Position</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='text' placeholder=\"Position\" class=\"form-control\" name='txtPosition" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->position . "\" disabled = 'true'>
                    </div>
                    </div>
                    <div class='startDate form-group'>
                        <label class=\"col-sm-2 control-label\">Start Date</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='date' placeholder=\"Start Date\" class=\"form-control\" name='txtStartDate" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->startDate . "\" disabled = 'true'>
                    </div>
                    </div>
                    <div class='endDate form-group'>
                        <label class=\"col-sm-2 control-label\">End Date</label>
                         <div class=\"col-sm-10\">
                        <input form='saveCV' type='date' placeholder=\"End Date\" class=\"form-control\" name='txtEndDate" . $i . "ProfEdu" . "' value=\"" . $cv->professional_experiences[$i - 1]->endDate . "\" disabled = 'true'>
                    </div>
                    </div>
                <br/>";
            }
        }
        ?>

    </div>
    </div>
</div>