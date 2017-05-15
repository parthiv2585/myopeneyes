<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 
 <?php echo form_open_multipart('', array('role'=>'form'));?>
 
    <?php // hidden id ?>
    <?php if (isset($candidate_id)) : ?>
        <?php echo form_hidden('id', $candidate_id); ?>
    <?php endif; ?> 
	<div class="bggray">
		<div class="row">
		<div class="form-group col-sm-2<?php echo form_error('first_name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input first name'), 'first_name', array('class'=>'control-label')); ?>
            <span class="required">*</span> 
            <?php echo form_input(array('name'=>'first_name', 'value'=>set_value('first_name', (isset($candidate['first_name']) ? $candidate['first_name'] : '')), 'class'=>'form-control')); ?>
			 
        </div>
		
		<div class="form-group col-sm-2">
            <?php echo form_label(lang('candidates input middle name'), 'middle_name', array('class'=>'control-label')); ?>  
            <?php echo form_input(array('name'=>'middle_name', 'value'=>set_value('middle_name', (isset($candidate['middle_name']) ? $candidate['middle_name'] : '')), 'class'=>'form-control')); ?>
			 
        </div>
		
		 <div class="form-group col-sm-2<?php echo form_error('last_name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input last name'), 'last_name', array('class'=>'control-label')); ?> 
			<span class="required">*</span> 			
            <?php echo form_input(array('name'=>'last_name', 'value'=>set_value('last_name', (isset($candidate['last_name']) ? $candidate['last_name'] : '')), 'class'=>'form-control')); ?>			 
        </div>
	    <div class="form-group col-sm-6<?php echo form_error('phone_home') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input candidates phone home'), 'phone_home', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'phone_home', 'value'=>set_value('phone_home', (isset($candidate['phone_home']) ? $candidate['phone_home'] : '')), 'class'=>'form-control')); ?>
        </div> 
		</div>
		<div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('phone_cell') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input candidate cell phone'), 'phone_cell', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'phone_cell', 'value'=>set_value('phone_cell', (isset($candidate['phone_cell']) ? $candidate['phone_cell'] : '')), 'class'=>'form-control')); ?>
        </div>
        <div class="form-group col-sm-6<?php echo form_error('phone_work') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input candidates phone work'), 'phone_work', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'phone_work', 'value'=>set_value('phone_work', (isset($candidate['phone_work']) ? $candidate['phone_work'] : '')), 'class'=>'form-control')); ?>
        </div>
		</div>
		<div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('email1') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input E-Mail'), 'email1', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'email1', 'value'=>set_value('email1', (isset($candidate['email1']) ? $candidate['email1'] : '')), 'class'=>'form-control')); ?>
        </div>
        <div class="form-group col-sm-6<?php echo form_error('email2') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('candidates input 2nd E-Mail'), 'email2', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'email2', 'value'=>set_value('email2', (isset($candidate['email2']) ? $candidate['email2'] : '')), 'class'=>'form-control')); ?>
        </div>
		</div>
		<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input address'), 'email', array('class'=>'control-label')); ?>
            <?php echo form_textarea(array('name'=>'address', 'value'=>set_value('address', (isset($candidate['address']) ? $candidate['address'] : '')), 'class'=>'form-control' , 'rows'=>2)); ?>
        </div>
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input city'), 'city', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'city', 'value'=>set_value('city', (isset($candidate['city']) ? $candidate['city'] : '')), 'class'=>'form-control')); ?>
        </div>
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input state'), 'state', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'state', 'value'=>set_value('state', (isset($candidate['state']) ? $candidate['state'] : '')), 'class'=>'form-control')); ?>
        </div> 
		</div>
		<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input postal code'), 'zip', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'zip', 'value'=>set_value('zip', (isset($candidate['zip']) ? $candidate['zip'] : '')), 'class'=>'form-control')); ?>
        </div>
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input web url'), 'web_site', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'web_site', 'value'=>set_value('web_site', (isset($candidate['web_site']) ? $candidate['web_site'] : '')), 'class'=>'form-control')); ?>
        </div>
		</div>
		<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('candidates input Best Time to Call'), 'best_time_to_call', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'best_time_to_call', 'value'=>set_value('best_time_to_call', (isset($candidate['best_time_to_call']) ? $candidate['best_time_to_call'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <div class="row">
				<div class="col-md-6">
					<?php echo form_label(lang('candidates input import resume'), 'zip', array('class'=>'control-label')); ?> 
			
					<input type='file' name='importresume' size='20' />
					<?php echo form_hidden('h_importresume',$candidate['original_filename']); ?>
					  </div>
				
					<?php 
						if(isset($candidate['original_filename']) && !empty($candidate['original_filename'])) {
					?>
				  <div class="col-md-6 martop20">
					<a class="btn btn-sm btn-danger pull-right" href="javascript://" onClick="deleteImage(<?php echo $candidate['candidate_id']; ?>)">Delete</a>
					<a class="btn btn-sm btn-success pull-right" href="<?php echo $this->config->item('base_url')."uploads/".$candidate['original_filename']; ?>" target="_blank">View</a>
				
			</div>
			
		  <?php } ?>
		  </div>
        </div> 
		</div>
		<div class="row"> 
		<div class="form-group col-sm-11">
            <?php echo form_label(lang('candidates input paste resume'), 'resume-test', array('class'=>'control-label')); ?>
            <?php echo form_textarea(array('name'=>'resume-test', 'value'=>set_value('resume-test', (isset($candidate['resume-test']) ? $candidate['resume-test'] : '')), 'class'=>'form-control', 'rows'=>10)); ?>
        </div>
		</div>
	</div>
    
	<div class="bggray">
		<div class="row">
        <div class="col-sm-6">
			<div class="form-group">
				<?php echo form_label(lang('candidates input can relocate'), 'can_relocate', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'can_relocate', 'id'=>'is_hot', 'value'=>'1', 'checked'=>(( 1 == $candidate['can_relocate']) ? 'checked' : FALSE))); ?>
			</div>
            <div class="form-group">
				<?php echo form_label(lang('candidates input date available'), 'date_available', array('class'=>'control-label')); ?>
				<div class='input-group date'>
				<?php echo form_input(array('name'=>'date_available', 'value'=>set_value('date_available', (isset($candidate['date_available']) ? date($this->config->item('short_date_format'),strtotime($candidate['date_available'])) : '')), 'class'=>'form-control')); ?>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
				</div>
			</div>
			
		   <div class="form-group">
				<?php echo form_label(lang('candidates input current employer'), 'current_employer', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'current_employer', 'value'=>set_value('current_employer', (isset($candidate['current_employer']) ? $candidate['current_employer'] : '')), 'class'=>'form-control')); ?>
			</div>
			
			<div class="form-group">
				<?php echo form_label(lang('candidates input current pay'), 'current_pay', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'current_pay', 'value'=>set_value('current_pay', (isset($candidate['current_pay']) ? $candidate['current_pay'] : '')), 'class'=>'form-control')); ?>
			</div>
			
			<div class="form-group">
				<?php echo form_label(lang('candidates input desired pay'), 'desired_pay', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'desired_pay', 'value'=>set_value('desired_pay', (isset($candidate['desired_pay']) ? $candidate['desired_pay'] : '')), 'class'=>'form-control')); ?>
			</div>
			
			<div class="form-group">
				<?php echo form_label(lang('candidates input work authorization'), 'work_authorization', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'work_authorization', 'value'=>set_value('work_authorization', (isset($candidate['work_authorization']) ? $candidate['work_authorization'] : '')), 'class'=>'form-control')); ?>
			</div>
			
			
		
        </div>
       
        <div class="form-group col-sm-6">
			
			<div class="form-group">
				<?php echo form_label(lang('candidates input source'), 'source', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'source', 'value'=>set_value('source', (isset($candidate['source']) ? $candidate['source'] : '')), 'class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo form_label(lang('candidates input company key skills'), 'key_skills', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'key_skills', 'value'=>set_value('key_skills', (isset($candidate['key_skills']) ? $candidate['key_skills'] : '')), 'class'=>'form-control')); ?>
			</div>			
		<div class="form-group">
            <?php echo form_label(lang('candidates input company misc. notes'), 'notes', array('class'=>'control-label')); ?>
			<?php echo form_textarea(array('name'=>'notes', 'value'=>set_value('notes', (isset($candidate['notes']) ? $candidate['notes'] : '')), 'class'=>'form-control' , 'rows'=>2)); ?>
        </div>
		
		
		<div class="form-group">
				<?php echo form_label(lang('candidates input company Date of Birth'), 'date_of_birth', array('class'=>'control-label')); ?>
				
				<div class='input-group date'>
				<?php echo form_input(array('name'=>'date_of_birth', 'value'=>set_value('date_of_birth', (isset($candidate['date_of_birth']) ? $candidate['date_of_birth'] : '')), 'class'=>'form-control')); ?>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
				</div>
				
			</div>
			
			<div class="form-group">
				<?php echo form_label(lang('candidates input company SSN'), 'ssn', array('class'=>'control-label')); ?>
				<?php echo form_input(array('name'=>'ssn', 'value'=>set_value('ssn', (isset($candidate['ssn']) ? $candidate['ssn'] : '')), 'class'=>'form-control')); ?>
			</div>
		
		
		</div> 
		
	</div>
	 
	<div class="bggray">
		<div class="row">
		<div class="col-md-12">
        <a class="btn btn-default" href="<?php echo $cancel_url; ?>" data-toggle="tooltip" data-original-title="Cancel"><?php echo lang('core button cancel'); ?></a>
        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <?php echo lang('core button save'); ?></button>
		</div>
		</div>
		</div>
	  

<?php echo form_close(); ?>


