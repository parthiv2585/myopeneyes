<div class=""> 
    <section class="content">
        <form data-toggle="validator" class="form-horizontal" id="frm" name="frm" method="post" enctype="multipart/form-data">
<div class="col-md-12 clsSucess" style="display:none">
                                <div class="alert alert-success fade in alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> <strong>Success!</strong> Record saved successfully. </div>
                            </div>
                            <div class="col-md-12 clsError" style="display:none">
                                <div class="alert alert-danger fade in alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> <strong>Danger!</strong> Error in insert data. </div>
                            </div>
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#jobResponsibility" data-toggle="tab" role="tab">Job Responsibility</a>
                    </li>
                    <li role="presentation"><a href="#home1" data-toggle="tab" role="tab">Personal Detail</a>
                    </li>
                    <li role="presentation"><a href="#tabDropDownOne1" data-toggle="tab" role="tab">Academic Detail</a>
                    </li>
                    <li role="presentation"><a href="#tabDropDownfive" data-toggle="tab" role="tab">Employment Detail</a>
                    </li>
                    <li role="presentation"><a href="#tabDocument" data-toggle="tab" role="tab">Uploads</a>
                    </li>
                    <li role="presentation"><a href="#tabDropDownsix" data-toggle="tab" role="tab">Additional Info</a>
                    </li>

                </ul>
				
                <div id="tabContent1" class="tab-content">

                    <div role="tabpane0" class="tab-pane fade in active" id="jobResponsibility">
                        <h1>Job Title</h1>
                        <p>The process of writing a job description requires having a clear understanding of the job’s duties and responsibilities. The job posting should also include a concise picture of the skills required for the position to attract qualified job candidates. Organize the job description into five sections: Company Information, Job Description, Job Requirements, Benefits and a Call to Action. Be sure to include keywords that will help make your job posting searchable. A well-defined job description will help attract qualified candidates as well as help reduce employee turnover in the long run.</p>
                        <p>Use the sample job postings below to help write your job description and improve your job posting results. Then when you're ready, post your job on Monster to reach the right talent - act now and save 20% when you buy a 60-day job ad!

                        </p>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button class="btn btn-info pull-right next" data-text="home1" type="button" class="btn btn-info">Next</button>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade in" id="home1">
                        <div class="row">
                            
                            <input class="form-control" type="hidden" id="candidate_id" name="candidate_id" value="<?php echo (isset($candidate->candidate_id)) ? htmlspecialchars($candidate->candidate_id, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="last_name" class="col-sm-2 control-label">Last Name<strong>*</strong> </label>
                                            <div class="col-xs-10">
                                                <input maxlength="50" minlength="3" required pattern="[A-Za-z]{3,50}" title="Please enter only alphanumeric characters only" class="form-control" placeholder="Last Name" type="text" id="last_name" name="last_name" value="<?php echo (isset($candidate->last_name)) ? htmlspecialchars($candidate->last_name, ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                                            </div> 
                                        </div>
										
										<div class="form-group">
                                            <label for="last_name" class="col-sm-2 control-label">First Name<strong>*</strong> </label>
                                             
                                            <div class="col-xs-10">
                                                <input maxlength="50" minlength="3" required pattern="[A-Za-z]{3,50}" title="Please enter only alphanumeric characters only" class="form-control" placeholder="First Name" type="text" id="first_name" name="first_name" value="<?php echo (isset($candidate->first_name)) ? htmlspecialchars($candidate->first_name, ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                                            </div>
                                            
                                        </div>
										
										<div class="form-group">
                                            <label for="last_name" class="col-sm-2 control-label">Middle Name</label>
                                            
                                            <div class="col-xs-10">
                                                <input maxlength="50" minlength="3" pattern="[A-Za-z]{3,50}" title="Please enter only alphanumeric characters only" class="form-control" placeholder="Middle Name" type="text" id="middle_name" name="middle_name" value="<?php echo (isset($candidate->middle_name)) ? htmlspecialchars($candidate->middle_name, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-10">
                                                <textarea maxlength="250" minlength="3" class="form-control" id="address" name="address" placeholder="Address"><?php echo (isset($candidate->address)) ? htmlspecialchars($candidate->address, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">City <strong>*</strong>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" pattern="[A-Za-z]{3,50}" required class="form-control" id="city" name="city" placeholder="City" value="<?php echo (isset($candidate->city)) ? htmlspecialchars($candidate->city, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">State <strong>*</strong>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" pattern="[A-Za-z]{3,50}" required class="form-control" id="state" name="state" placeholder="State" value="<?php echo (isset($candidate->state)) ? htmlspecialchars($candidate->state, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip" class="col-sm-2 control-label"> Zip </label>
                                            <div class="col-sm-10">
                                                <input type="text" pattern=".{4,7}" title="Zip code 4 to 7 Characters and Number only" class="form-control" id="zip" name="zip" placeholder="Zip" value="<?php echo (isset($candidate->zip)) ? htmlspecialchars($candidate->zip, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="phone_home" class="col-sm-2 control-label">Home Phone</label>
                                            <div class="col-sm-10">
                                                <input pattern="[0-9]{10}" title="Home Phone: 555-555-5555" type="text" class="form-control" id="phone_home" name="phone_home" placeholder="Home Phone: 555-555-5555" value="<?php echo (isset($candidate->phone_home)) ? htmlspecialchars($candidate->phone_home, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-body">
										
										
                                        <div class="form-group">
                                            <label for="phone_work" class="col-sm-2 control-label">Work Phone</label>
                                            <div class="col-sm-10">
                                                <input pattern="[0-9]{10}" title="Work Phone: 555-555-5555" type="text" class="form-control" id="phone_work" name="phone_work" placeholder="Work Phone: 555-555-5555" value="<?php echo (isset($candidate->phone_work)) ? htmlspecialchars($candidate->phone_work, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label for="mobile" class="col-sm-2 control-label">Mobile<strong>*</strong>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required value="<?php echo (isset($candidate->mobile)) ? htmlspecialchars($candidate->mobile, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email<strong>*</strong>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo (isset($candidate->email)) ? htmlspecialchars($candidate->email, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_birth" class="col-sm-2 control-label">Date of Birth</label>
                                            <div class="col-sm-10">
                                                <input readonly type="text" class="form-control startYear" id="date_of_birth" name="date_of_birth" placeholder="Date of birth (mm/dd/yyyy)" value="<?php echo (isset($candidate->date_of_birth)) ? htmlspecialchars(date('m/d/Y',strtotime($candidate->date_of_birth)), ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="">-Select-</option>
                                                    <option value="Male" <?php if(isset($candidate->gender) && $candidate->gender == "Male") { echo ' selected'; } ?> >Male</option>
                                                    <option value="Female" <?php if(isset($candidate->gender) && $candidate->gender == "Female") { echo ' selected'; } ?> >Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="source" class="col-sm-2 control-label">Source</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="source" name="source">
                                                    <option value="">-Select-</option>
                                                    <option value="Facebook" <?php if(isset($candidate->source) && $candidate->source == "Facebook") { echo ' selected'; } ?> >Facebook</option>
                                                    <option value="Twitter" <?php if(isset($candidate->source) && $candidate->source == "Twitter") { echo ' selected'; } ?> >Twitter</option>
                                                    <option value="LinkedIn" <?php if(isset($candidate->source) && $candidate->source == "LinkedIn") { echo ' selected'; } ?> >LinkedIn</option>
                                                    <option value="Job Posting" <?php if(isset($candidate->source) && $candidate->source == "Job Posting") { echo ' selected'; } ?> >Job Posting</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group sourceName" style="display:none">
                                            <label for="city" class="col-sm-2 control-label">Source Name <strong>*</strong>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="source-name" name="source-name" placeholder="Source Name" value="<?php echo (isset($candidate->city)) ? htmlspecialchars($candidate->city, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="if_selected_when_join" class="col-sm-2 control-label">Join Date</label>
                                            <div class="col-sm-10">
                                                <input readonly type="text" class="form-control startMonth" id="if_selected_when_join" name="if_selected_when_join" placeholder="If selected, when can you join" value="<?php echo (isset($candidate->if_selected_when_join)) ? htmlspecialchars(date('m/d/Y',strtotime($candidate->if_selected_when_join)), ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="can_relocate" class="col-sm-2 control-label"> </label>
                                            <div class="col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="can_relocate" name="can_relocate" <?php if(isset($candidate->can_relocate) && $candidate->can_relocate ==1) { echo 'checked'; } ?>> Relocate </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="current_pay" class="col-sm-2 control-label">Current Salary
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="number" max="9999999" min="111" title="Number only" class="form-control" id="current_pay" name="current_pay" placeholder="Current Pay" value="<?php echo (isset($candidate->current_pay)) ? htmlspecialchars($candidate->current_pay, ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="row">

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button class="btn btn-info pull-right next" data-text="tabDropDownOne1" type="button" class="btn btn-info">Next</button>
                                    <button class="previous btn btn-info" data-text="jobResponsibility" type="button" class="btn btn-info">Previous</button>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tabDropDownOne1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" required class="form-control" id="college_name_1" name="college_name[]" placeholder="College Name" value="<?php echo (isset($finalCandidateEducational[0]['college_name'])) ? htmlspecialchars($finalCandidateEducational[0]['college_name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" required class="form-control" id="major_1" name="major[]" placeholder="Major" value="<?php echo (isset($finalCandidateEducational[0]['major'])) ? htmlspecialchars($finalCandidateEducational[0]['major'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" required class="form-control" id="university_1" name="university[]" placeholder="University" value="<?php echo (isset($finalCandidateEducational[0]['university'])) ? htmlspecialchars($finalCandidateEducational[0]['university'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="number" max="<?php echo date('Y'); ?>" min="<?php echo (date('Y')-100); ?>" title="Year: 2017"  required class="form-control" id="graduation_year_1" name="graduation_year[]" placeholder="Graduation Year (yyyy)" value="<?php echo (isset($finalCandidateEducational[0]['graduation_year'])) ? htmlspecialchars($finalCandidateEducational[0]['graduation_year'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="college_name_2" name="college_name[]" placeholder="College Name" value="<?php echo (isset($finalCandidateEducational[1]['college_name'])) ? htmlspecialchars($finalCandidateEducational[1]['college_name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="major_2" name="major[]" placeholder="Major" value="<?php echo (isset($finalCandidateEducational[1]['major'])) ? htmlspecialchars($finalCandidateEducational[1]['major'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="university_2" name="university[]" placeholder="University" value="<?php echo (isset($finalCandidateEducational[1]['university'])) ? htmlspecialchars($finalCandidateEducational[1]['university'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="number" title="Year: 2017" 
max="<?php echo date('Y'); ?>" min="<?php echo (date('Y')-100); ?>" class="form-control" id="graduation_year_2" name="graduation_year[]" placeholder="Graduation Year (yyyy)" value="<?php echo (isset($finalCandidateEducational[1]['graduation_year'])) ? htmlspecialchars($finalCandidateEducational[1]['graduation_year'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="college_name_3" name="college_name[]" placeholder="College Name" value="<?php echo (isset($finalCandidateEducational[2]['college_name'])) ? htmlspecialchars($finalCandidateEducational[2]['college_name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="major_3" name="major[]" placeholder="Major" value="<?php echo (isset($finalCandidateEducational[2]['major'])) ? htmlspecialchars($finalCandidateEducational[2]['major'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="university_3" name="university[]" placeholder="University" value="<?php echo (isset($finalCandidateEducational[2]['university'])) ? htmlspecialchars($finalCandidateEducational[2]['university'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="number" 
max="<?php echo date('Y'); ?>" min="<?php echo (date('Y')-100); ?>" title="Year: 2017" class="form-control" id="graduation_year_3" name="graduation_year[]" placeholder="Graduation Year (yyyy)" value="<?php echo (isset($finalCandidateEducational[2]['graduation_year'])) ? htmlspecialchars($finalCandidateEducational[2]['graduation_year'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button class="btn btn-info pull-right next" data-text="tabDropDownfive" type="button" class="btn btn-info">Next</button>
                                    <button class="previous btn btn-info" data-text="home1" type="button" class="btn btn-info">Previous</button>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tabDropDownfive">

                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Last employment detail only!</strong>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">Organization Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="organization_1" name="organization[]" placeholder="Organization Name" value="<?php echo (isset($finalPreviousEmployment[0]['organization'])) ? htmlspecialchars($finalPreviousEmployment[0]['organization'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="designation_1" name="designation[]" placeholder="Designation" value="<?php echo (isset($finalPreviousEmployment[0]['designation'])) ? htmlspecialchars($finalPreviousEmployment[0]['designation'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">From</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control datepicker" readonly id="jobFrom_1" name="jobFrom[]" placeholder="From (mm/dd/yyyy)" value="<?php echo (isset($finalPreviousEmployment[0]['pre_emp_from'])) ? htmlspecialchars($finalPreviousEmployment[0]['pre_emp_from'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">To</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control datepicker" readonly id="jobTo_1" name="jobTo[]" placeholder="To (mm/dd/yyyy)" value="<?php echo (isset($finalPreviousEmployment[0]['pre_emp_to'])) ? htmlspecialchars($finalPreviousEmployment[0]['pre_emp_to'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Reason for Leaving</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="leaving_1" name="leaving[]" placeholder="Reason for Leaving"><?php echo (isset($finalPreviousEmployment[0][ 'reason_for_leaving'])) ? htmlspecialchars($finalPreviousEmployment[0][ 'reason_for_leaving'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Add Reference!</strong>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_name_1" name="ref_name[]" placeholder="Name" value="<?php echo (isset($finalCandidateRefer[0]['ref_name'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_name'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_designation_1" name="ref_designation[]" placeholder="Designation" value="<?php echo (isset($finalCandidateRefer[0]['ref_designation'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_designation'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="reference_email_1" name="ref_email[]" placeholder="Email" value="<?php echo (isset($finalCandidateRefer[0]['ref_email'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_phone_number_1" name="ref_phone[]" placeholder="Phone: 555-555-5555" value="<?php echo (isset($finalCandidateRefer[0]['ref_phone'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_phone'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_name_2" name="ref_name[]" placeholder="Name" value="<?php echo (isset($finalCandidateRefer[0]['ref_name'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_name'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_designation_2" name="ref_designation[]" placeholder="Designation" value="<?php echo (isset($finalCandidateRefer[0]['ref_designation'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_designation'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="reference_email_2" name="ref_email[]" placeholder="Email" value="<?php echo (isset($finalCandidateRefer[0]['ref_email'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="reference_phone_number_2" name="ref_phone[]" placeholder="Phone: 555-555-5555" value="<?php echo (isset($finalCandidateRefer[0]['ref_phone'])) ? htmlspecialchars($finalCandidateRefer[0]['ref_phone'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button class="btn btn-info pull-right next" data-text="tabDropDownsix" type="button">Next</button>
                                    <button class="previous btn btn-info" data-text="tabDropDownfive" type="button" class="btn btn-info">Previous</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabDropDownsix">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Languages</h3>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" pattern="[A-Za-z]{3,30}" title="3 to 30 characters only" class="form-control" id="languages_1" value="<?php echo (isset($finalCandidateLanguages[0]['name'])) ? htmlspecialchars($finalCandidateLanguages[0]['name'], ENT_QUOTES, 'UTF-8') : ''; ?>" name="languages_1" placeholder="Language">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="speak_1" name="speak_1" placeholder="Speak" <?php if(isset($finalCandidateLanguages[0][ 'l_speak']) && $finalCandidateLanguages[0][ 'l_speak']==1) { echo 'checked'; } ?>> Speak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="read_1" name="read_1" placeholder="Read" <?php if(isset($finalCandidateLanguages[0][ 'l_read']) && $finalCandidateLanguages[0][ 'l_read']==1) { echo 'checked'; } ?>> Read </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="write_1" name="write_1" placeholder="Write" <?php if(isset($finalCandidateLanguages[0][ 'l_write']) && $finalCandidateLanguages[0][ 'l_write']==1) { echo 'checked'; } ?>> Write </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" pattern="[A-Za-z]{3,30}" title="3 to 30 characters only" class="form-control" id="languages_2" name="languages_2" placeholder="Language" value="<?php echo (isset($finalCandidateLanguages[1]['name'])) ? htmlspecialchars($finalCandidateLanguages[1]['name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="speak_2" name="speak_2" placeholder="Speak" <?php if(isset($finalCandidateLanguages[1][ 'l_speak']) && $finalCandidateLanguages[1][ 'l_speak']==1) { echo 'checked'; } ?>> Speak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="read_2" name="read_2" placeholder="Read" <?php if(isset($finalCandidateLanguages[1][ 'l_read']) && $finalCandidateLanguages[1][ 'l_read']==1) { echo 'checked'; } ?>> Read </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="write_2" name="write_2" placeholder="Write" <?php if(isset($finalCandidateLanguages[1][ 'l_write']) && $finalCandidateLanguages[1][ 'l_write']==1) { echo 'checked'; } ?>> Write </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" pattern="[A-Za-z]{3,30}" title="3 to 30 characters only" class="form-control" id="languages_3" name="languages_3" placeholder="Language" value="<?php echo (isset($finalCandidateLanguages[2]['name'])) ? htmlspecialchars($finalCandidateLanguages[2]['name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="speak_3" name="speak_3" placeholder="Speak" <?php if(isset($finalCandidateLanguages[2][ 'l_speak']) && $finalCandidateLanguages[2][ 'l_speak']==1) { echo 'checked'; } ?>> Speak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="read_3" name="read_3" placeholder="Read" <?php if(isset($finalCandidateLanguages[2][ 'l_read']) && $finalCandidateLanguages[2][ 'l_read']==1) { echo 'checked'; } ?>> Read </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" id="write_3" name="write_3" placeholder="Write" <?php if(isset($finalCandidateLanguages[2][ 'l_write']) && $finalCandidateLanguages[2][ 'l_write']==1) { echo 'checked'; } ?>> Write </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">


                                <div class="box box-primary">
                                    <div class="box-header with-border">

                                        <h3 class="box-title">Tell us</h3>
                                    </div>
                                </div>

                            </div>


                            <div class=" ">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="extracurricular_activity_1" name="extracurricular_activity[]" placeholder="Extracurricular activity" value="<?php echo (isset($finalCandidateExtracurricular[0]['extracurricular_activity'])) ? htmlspecialchars($finalCandidateExtracurricular[0]['extracurricular_activity'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="type_1" name="type[]" placeholder="Type (Sport/Event/Game/Social Cause)" value="<?php echo (isset($finalCandidateExtracurricular[0]['activity_type'])) ? htmlspecialchars($finalCandidateExtracurricular[0]['activity_type'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="position_hold_1" name="position_hold[]" placeholder="Position Hold" value="<?php echo (isset($finalCandidateExtracurricular[0]['position_hold'])) ? htmlspecialchars($finalCandidateExtracurricular[0]['position_hold'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="awards_1" name="awards[]" placeholder="Awards" value="<?php echo (isset($finalCandidateExtracurricular[0]['awards'])) ? htmlspecialchars($finalCandidateExtracurricular[0]['awards'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="extracurricular_activity_2" name="extracurricular_activity[]" placeholder="Extracurricular activity" value="<?php echo (isset($finalCandidateExtracurricular[1]['extracurricular_activity'])) ? htmlspecialchars($finalCandidateExtracurricular[1]['extracurricular_activity'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="type_2" name="type[]" placeholder="Type (Sport/Event/Game/Social Cause)" value="<?php echo (isset($finalCandidateExtracurricular[1]['activity_type'])) ? htmlspecialchars($finalCandidateExtracurricular[1]['activity_type'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="position_hold_2" name="position_hold[]" placeholder="Position Hold" value="<?php echo (isset($finalCandidateExtracurricular[1]['position_hold'])) ? htmlspecialchars($finalCandidateExtracurricular[1]['position_hold'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="awards_2" name="awards[]" placeholder="Awards" value="<?php echo (isset($finalCandidateExtracurricular[1]['awards'])) ? htmlspecialchars($finalCandidateExtracurricular[1]['awards'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="extracurricular_activity_3" name="extracurricular_activity[]" placeholder="Extracurricular activity" value="<?php echo (isset($finalCandidateExtracurricular[2]['extracurricular_activity'])) ? htmlspecialchars($finalCandidateExtracurricular[2]['extracurricular_activity'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="type_3" name="type[]" placeholder="Type (Sport/Event/Game/Social Cause)" value="<?php echo (isset($finalCandidateExtracurricular[2]['activity_type'])) ? htmlspecialchars($finalCandidateExtracurricular[2]['activity_type'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="position_hold_3" name="position_hold[]" placeholder="Position Hold" value="<?php echo (isset($finalCandidateExtracurricular[1]['position_hold'])) ? htmlspecialchars($finalCandidateExtracurricular[1]['position_hold'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="awards_3" name="awards[]" placeholder="Awards" value="<?php echo (isset($finalCandidateExtracurricular[2]['awards'])) ? htmlspecialchars($finalCandidateExtracurricular[2]['awards'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="city" class="col-sm-3 control-label">Why do you think you are the best fit for this position?</label>
                                            <div class="col-sm-9">
                                                <textarea id="best_fit" class="form-control" name="best_fit" placeholder="Why do you think you are the best fit for this position?"><?php echo (isset($candidate->best_fit)) ? htmlspecialchars($candidate->best_fit, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="city" class="col-sm-3 control-label">What is interesting about you?</label>
                                            <div class="col-sm-9">
                                                <textarea id="intersting_about_you" name="intersting_about_you" class="form-control" placeholder="What is interesting about you?"><?php echo (isset($candidate->intersting_about_you)) ? htmlspecialchars($candidate->intersting_about_you, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="col-md-12">
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success pull-right">Submit</button>
                                            <button type="reset" data-text="tabDropDownsix"  class="previous btn btn-info">Previous</button>
                                            &nbsp; <img src="<?php echo URL; ?>img/loding.gif" style="display:none" class="loding" /> </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabDocument">
					
						<div class="row">
						   <div class="col-md-12">
							 <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Document Title</th>
									<th>Action</th> 
								  </tr>
								</thead>
								<tbody>
								<?php 
									if(isset($finalCandidateDocument) && !empty($finalCandidateDocument)) {
									foreach($finalCandidateDocument as $dk=>$dv) { ?>
								  <tr id="tr-<?php echo $dv['candidates_document_id']; ?>">
									<td><?php echo $dv	['title'] ?></td>
									<td>
									<a class="btn btn-info" href="<?php echo URL."/document/".$dv['document']; ?>" target="_blank" title="Opens in a new window">
									<i class="fa fa-eye"></i> </a> <a class="btn btn-danger" href="javascript://" onClick="deleteDocument('<?php echo $dv['candidates_document_id']; ?>')"><i class="fa fa-trash"></i></a></td>
									<input type="hidden" id="hdocument-<?php echo $dv['candidates_document_id']; ?>" name="hdocument-<?php echo $dv['candidates_document_id']; ?>" value="<?php echo $dv['document']; ?>"/>
								  </tr> 
									<?php } }else { ?>
										<tr>
											<td colspan="2" align="center"> No record found! </td>
										</tr>
									<?php } ?>
								</tbody>
							  </table>
							</div>   
						</div>
					
                        <div class="row">

                            <div class="col-md-12 document">

                                <input type="hidden" id="documentCount" name="documentCount" value="1" />

                                <div class="form-group documentDiv-1">
                                    <label for="last_name" class="col-sm-2 control-label">Document </label>
                                    <div class="col-xs-4">
                                        <input class="form-control"  placeholder="Document Name" type="text" id="document-title-1" name="documenTitle[]">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="file" id="document-1" name="documentFile[]" />
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="button" id="btnAdd-1" name="btnAdd-1" value="+" class="addMore btn btn-success" />
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button class="btn btn-info pull-right next" type="button" class="btn btn-info">Next</button>
                                    <button class="previous btn btn-info" type="button">Previous</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


        </form>
    </section>
    </div>
    <script>
        $(document).ready(function() {
            
            $('#frm').validator().on('submit', function (e) {
			  if (e.isDefaultPrevented()) {
				 alert("Please enter all information");
			  } else {
					 if (confirm("Are you sure you are ready to submit your application?") == true) {
							var url = "<?php echo URL; ?>resume/ajaxSave";
							$.ajax({
								url: url,
								type: "POST",
								dataType: "json",
								data: new FormData(this),
								contentType: false,
								cache: false,
								processData: false,
								beforeSend: function() {
									//blockUi();
									$(".loding").show();
								},
								success: function(data) {
									if (data.status == "sucess") {
										setTimeout(function(){ window.location.href = "<?php echo URL; ?>/resume/"; },500);
									} else {
										$(".clsError").show();
										$(".clsError .alert-danger").html(data.message);
										$(".clsSucess").hide();
										$('html, body').animate({
											scrollTop: $(".clsError").offset().top
										}, 2000);
									}
								},
								error: function() {

								},
								complete: function() {
									//unBlockUi();
									$(".loding").hide();
								},

							});
						} 
						e.preventDefault(); 
				}
				e.preventDefault(); 
			})

            /* Check email exist or not  */

            $("#email").blur(function() {
                checkValueExist('candidates', 'email', $(this).val(), 'email', "candidate_id", $("#candidate_id").val());
            });

            /* End Check email exist or not  */


            /* Check mobile exist or not  */

            $("#mobile").blur(function() {
                checkValueExist('candidates', 'mobile', $(this).val(), 'mobile', "candidate_id", $("#candidate_id").val());
            });

            /* End Check email exist or not  */

            /* Start Calander  */
            $('.datepicker').datepicker({
               format: "mm/dd/yyyy"
            });

            $('.startYear').datepicker({
                autoclose: true,
                format: "mm/dd/yyyy",
                startView: 2
            });
			$('.startMonth').datepicker({
                autoclose: true,
                format: "mm/dd/yyyy",
                startView: 1
            });
            /* End Calander  */

            $("#source").change(function() {

                var Val = $(this).val();
                if (Val != "") {
                    $(".sourceName").show();
                    $("#source-name").attr("required", true);
                } else {
                    $(".sourceName").hide();
                    $("#source-name").attr("required", false);
                }
            });

            /*Add more Start */

            $(".addMore").click(function() {
                var coutnTotal = parseInt($("#documentCount").val()) + 1;
                var appString = '';
                appString = '<div class="form-group documentDiv-' + coutnTotal + '"><label for="last_name" class="col-sm-2 control-label">Document</label>';
                appString += '<div class="col-xs-4"><input ';
                appString += 'class="form-control" placeholder="Document Name" type="text" id="document-title-' + coutnTotal + '" name="documenTitle[]" required>';
                appString += '</div><div class="col-xs-4"><input type="file" id="documentFile-' + coutnTotal + '" name="documentFile[]" /></div><div class="col-xs-2">';
                appString += '<input onClick="removeDocument(' + coutnTotal + ');" class="btn btn-warning" type="button" id="btnLess-' + coutnTotal + '" name="btnLess-' + coutnTotal + '" value="-"/></div></div>'
                $(".document").append(appString);
                $("#documentCount").val(coutnTotal);
            });

            /*END more Start */
			
		   /* Start Click on next and previous */
		     
			$('.next').click(function(){
			  $('.nav-tabs > .active').next('li').find('a').trigger('click');
			});

			$('.previous').click(function(){
			  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
			});
			
			$("#source").trigger("change");
			
			 
		   
		   /* End Click on next and previous */
			
        });


        function removeDocument(countID) {
            $(".documentDiv-" + countID).remove();
            var coutnTotal = parseInt($("#documentCount").val()) - 1;
            $("#documentCount").val(coutnTotal);
        } 
		 
		function deleteDocument(documentID1){
			 if (confirm("Are you sure you won't delete document?") == true) {
				var trName = "tr-"+documentID1; 
				var documentName1 = $("#hdocument-"+documentID1).val();
				var url = "<?php echo URL; ?>resume/ajaxDeleteDocument"; 
				$.ajax({
					url: url,
					type: "POST",
					dataType: "json",
					data: {documentID:documentID1,documentName:documentName1},
					success: function(data) {
						if (data.status == "sucess") {
							$("#"+trName).hide(500);  
						}else {
							alert("Error: File is not delete.");
						}
					},						
				});  
			 }
		}
		
		$(document).ready(function(){
			$("#jobFrom_1").datepicker({
				todayBtn:  1,
				autoclose: true,
				format: "mm/dd/yyyy",
			}).on('changeDate', function (selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#jobTo_1').datepicker('setStartDate', minDate);
			});

			$("#jobTo_1").datepicker()
				.on('changeDate', function (selected) {
					var maxDate = new Date(selected.date.valueOf());
		    });
		});
    </script>