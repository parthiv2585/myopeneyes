<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php //echo form_open('', array('role'=>'form')); ?>
 <?php echo form_open_multipart('', array('role'=>'form'));?>
 
    <?php // hidden id ?>
    <?php if (isset($joborder_id)) : ?>
        <?php echo form_hidden('id', $joborder_id); ?>
    <?php endif; ?> 
	<div class="bggray">
		<div class="row">
		
		<div class="form-group col-sm-6<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders col title'), 'title', array('class'=>'control-label')); ?>
            <span class="required">*</span> 
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title', (isset($joborder['title']) ? $joborder['title'] : '')), 'class'=>'form-control')); ?>
			 
        </div>
  
	    <div class="form-group col-sm-6<?php echo form_error('client_id') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders col Company Name'), 'client_id', array('class'=>'control-label')); ?>
			 <span class="required">*</span> 
            
			<?php echo form_dropdown('client_id', $comanylist, isset($joborder['client_id']) ? $joborder['client_id'] : '' , 'class="form-control"'); ?>
			
        </div> 
		</div>
		 
		<div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('city') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders input City'), 'city', array('class'=>'control-label')); ?>
			 <span class="required">*</span> 
            <?php echo form_input(array('name'=>'city', 'value'=>set_value('city', (isset($joborder['city']) ? $joborder['city'] : '')), 'class'=>'form-control')); ?>
        </div>
        <div class="form-group col-sm-6<?php echo form_error('state') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders input State'), 'state', array('class'=>'control-label')); ?>
			 <span class="required">*</span> 
            <?php echo form_input(array('name'=>'state', 'value'=>set_value('state', (isset($joborder['state']) ? $joborder['state'] : '')), 'class'=>'form-control')); ?>
        </div>
		</div>
		<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('recruiter') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders input Recruiter'), 'recruiter', array('class'=>'control-label')); ?>
			 <span class="required">*</span> 
            
			
			<?php echo form_dropdown('recruiter', $usersList, isset($joborder['recruiter']) ? $joborder['recruiter'] : '' , 'class="form-control"'); ?>
			
        </div>
		 
		 
		</div>
		<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input Start Date'), 'start_date', array('class'=>'control-label')); ?>
			
			<div class='input-group date'>
            <?php echo form_input(array('name'=>'start_date', 'value'=>set_value('start_date', (isset($joborder['start_date']) ? $joborder['start_date'] : '')), 'class'=>'form-control')); ?>
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
			</div>
			
        </div>
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input Duration'), 'duration', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'duration', 'value'=>set_value('duration', (isset($joborder['duration']) ? $joborder['duration'] : '')), 'class'=>'form-control')); ?>
        </div>
		</div>
		
		
		<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('rate_max') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders input Maximum Rate'), 'rate_max', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'rate_max', 'value'=>set_value('rate_max', (isset($joborder['rate_max']) ? $joborder['rate_max'] : '')), 'class'=>'form-control')); ?>
        </div> 
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input position_type'), 'position_type', array('class'=>'control-label')); ?>
              
			<?php echo form_dropdown('position_type', $jobTypeList,isset($joborder['position_type']) ? $joborder['position_type'] : '', 'class="form-control"'); ?>
        </div> 
		</div>
		
		
		<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('pay_rate') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('joborders input Salary'), 'pay_rate', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'pay_rate', 'value'=>set_value('pay_rate', (isset($joborder['pay_rate']) ? $joborder['pay_rate'] : '')), 'class'=>'form-control')); ?>
        </div> 
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input Openings'), 'openings', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'openings', 'value'=>set_value('openings', (isset($joborder['openings']) ? $joborder['openings'] : '')), 'class'=>'form-control')); ?>
        </div> 
		</div>
		
		
		<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input Company Job ID'), 'client_job_id', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'client_job_id', 'value'=>set_value('client_job_id', (isset($joborder['client_job_id']) ? $joborder['client_job_id'] : '')), 'class'=>'form-control')); ?>
        </div>  
	 <div class="form-group col-sm-6">
            <?php echo form_label(lang('joborders input visa_type'), 'visa_type', array('class'=>'control-label')); ?>
              
			<?php echo form_dropdown('visa_type', $visaType,isset($joborder['visa_type']) ? $joborder['visa_type'] : '', 'class="form-control"'); ?>
        </div> 
		   
		</div> 
		
		<div class="row"> 
		
		<div class="form-group col-sm-12">
            <?php echo form_label(lang('joborders input Key Skills'), 'key_skills', array('class'=>'control-label')); ?>
            <?php echo form_textarea(array('name'=>'key_skills', 'value'=>set_value('key_skills', (isset($joborder['key_skills']) ? $joborder['key_skills'] : '')), 'class'=>'form-control', 'rows'=>2)); ?>
        </div> 
		   
		</div> 
		 
	</div>
    
	<div class="bggray">
		<div class="row">
        <div class="col-sm-12"> 
			 
		   <div class="form-group">
				<?php echo form_label(lang('joborders input Description'), 'description', array('class'=>'control-label')); ?>
				<?php echo form_textarea(array('name'=>'description', 'value'=>set_value('description', (isset($joborder['description']) ? $joborder['description'] : ''), FALSE), 'class'=>'form-control')); ?>
			</div>  
        </div>  
	</div>
	</div>
	
	<div class="bggray">
		<div class="row">
        <div class="col-sm-12"> 
			 
		   <div class="form-group">
				<?php echo form_label(lang('joborders input Internal Notes'), 'notes', array('class'=>'control-label')); ?>
				<?php echo form_textarea(array('name'=>'notes', 'value'=>set_value('notes', (isset($joborder['notes']) ? $joborder['notes'] : ''), FALSE), 'class'=>'form-control')); ?>
			</div>  
        </div>  
	</div>
	</div>
	
	<div class="bggray">
	<div class="row radio-block">
	 <div class="col-sm-6">
         <div class="form-group">
				<?php echo form_label(lang('joborders input is_hot'), 'is_hot', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'is_hot', 'id'=>'is_hot', 'value'=>'1', 'checked'=>(( 1 == $joborder['is_hot']) ? 'checked' : FALSE))); ?>
			</div></div>
        <div class="col-sm-6">
            
	  <div class="form-group">
				<?php echo form_label(lang('joborders input is_public'), 'is_public', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'is_public', 'id'=>'is_public', 'value'=>'1', 'checked'=>(( 1 == $joborder['is_public']) ? 'checked' : FALSE))); ?>
			</div>
        </div> 
		 <div class="col-sm-6">
		<div class="form-group">
				<?php echo form_label(lang('joborders input is_admin_hiden'), 'is_admin_hiden', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'is_admin_hiden', 'id'=>'is_admin_hiden', 'value'=>'1', 'checked'=>(( 1 == $joborder['is_admin_hiden']) ? 'checked' : FALSE))); ?>
			</div>
        </div> 
		
		<div class="form-group col-sm-6<?php echo form_error('is_active') ? ' has-error' : ''; ?>">
                                    <?php echo form_label(lang('joborders input is_active'), '', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <div class="radio">
                                            <label>
                                                <?php echo form_radio(array('name'=>'is_active', 'id'=>'radio-is_active-1', 'value'=>'1', 'checked'=>(( ! isset($joborder['is_active']) OR (isset($joborder['is_active']) && (int)$joborder['is_active'] == 1)) ? 'checked' : FALSE))); ?>
                                                    <?php echo lang('admin input active'); ?>
                                            </label>
                                        </div> 
                                            <div class="radio">
                                                <label>
                                                    <?php echo form_radio(array('name'=>'is_active', 'id'=>'radio-is_active-2', 'value'=>'0', 'checked'=>((isset($joborder['is_active']) && (int)$joborder['is_active'] == 0) ? 'checked' : FALSE))); ?>
                                                        <?php echo lang('admin input inactive'); ?>
                                                </label>
                                            </div>
                                            
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
	  
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.replace( 'notes' );
</script>
<?php echo form_close(); ?>


