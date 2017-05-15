<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form')); ?>

   
  <?php echo form_hidden('id', $contact_id); ?>
     
 
 <div class="bggray">
  <div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('client_id') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts col client_id'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span> 
			
			<?php echo form_dropdown('client_id', $leftCompany , set_value('client_id', (isset($client['client_id']) ? $client['client_id'] : '')), 'class="form-control"'); ?>

        </div>
        <div class="form-group col-sm-6<?php echo form_error('first_name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts col first_name'), 'first_name', array('class'=>'control-label')); ?>
			<span class="required">*</span>
            <?php echo form_input(array('name'=>'first_name', 'value'=>set_value('first_name', (isset($client['first_name']) ? $client['first_name'] : '')), 'class'=>'form-control')); ?>
        </div> 
        
    </div>
	
	<div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('last_name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts col last_name'), 'last_name', array('class'=>'control-label')); ?>
			<span class="required">*</span>
            <?php echo form_input(array('name'=>'last_name', 'value'=>set_value('last_name', (isset($client['last_name']) ? $client['last_name'] : '')), 'class'=>'form-control')); ?>
        </div>
        <div class="form-group col-sm-6<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts input title'), 'title', array('class'=>'control-label')); ?>
			<span class="required">*</span>
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title', (isset($client['title']) ? $client['title'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>
	 
	
	 
	
	<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('email_work') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts input email_work'), 'email_work', array('class'=>'control-label')); ?>
			<span class="required">*</span>
            <?php echo form_input(array('name'=>'email_work', 'value'=>set_value('email_work', (isset($client['email_work']) ? $client['email_work'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input email'), 'email', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'email', 'value'=>set_value('email', (isset($client['email']) ? $client['email'] : '')), 'class'=>'form-control')); ?>
        </div>  
	</div>
	
	
	<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('phone_work') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contacts input phone_work'), 'phone_work', array('class'=>'control-label')); ?>
			<span class="required">*</span>
            <?php echo form_input(array('name'=>'phone_work', 'value'=>set_value('phone_work', (isset($client['phone_work']) ? $client['phone_work'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input phone'), 'phone', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'phone', 'value'=>set_value('phone', (isset($client['phone']) ? $client['phone'] : '')), 'class'=>'form-control')); ?>
        </div>  
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input address'), 'address', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'address', 'value'=>set_value('address', (isset($client['address']) ? $client['address'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input address1'), 'address1', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'address1', 'value'=>set_value('address1', (isset($client['address1']) ? $client['address1'] : '')), 'class'=>'form-control')); ?>
        </div>  
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input city'), 'city', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'city', 'value'=>set_value('city', (isset($client['city']) ? $client['city'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input state'), 'state', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'state', 'value'=>set_value('state', (isset($client['state']) ? $client['state'] : '')), 'class'=>'form-control')); ?>
        </div>  
	</div>
	
	
	<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input zip'), 'zip', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'zip', 'value'=>set_value('zip', (isset($client['zip']) ? $client['zip'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('contacts input country'), 'country', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'country', 'value'=>set_value('country', (isset($client['country']) ? $client['country'] : '')), 'class'=>'form-control')); ?>
        </div>  
	</div>
	
	<div class="row">
	 
	<div class="form-group col-sm-6">
		<?php echo form_label(lang('contacts input misc. notes'), 'notes', array('class'=>'control-label')); ?>
		<?php echo form_textarea(array('name'=>'notes', 'value'=>set_value('notes', (isset($client['notes']) ? $client['notes'] : '')), 'class'=>'form-control','rows'=>2)); ?>
	</div> 
	
	<div class="form-group col-sm-6<?php echo form_error('owner') ? ' has-error' : ''; ?>">
		<?php echo form_label(lang('contacts input owner'), 'owner', array('class'=>'control-label')); ?>
			 <span class="required">*</span>
	   <?php echo form_dropdown('owner', $leftCompany , set_value('owner', (isset($client['owner']) ? $client['owner'] : '')), 'class="form-control"'); ?>
	</div> 
	
	</div>
	
	<div class="row"> 
	
	<div class="form-group col-sm-6<?php echo form_error('report_to') ? ' has-error' : ''; ?>">
		<?php echo form_label(lang('contacts input report_to'), 'report_to', array('class'=>'control-label')); ?>
			 <span class="required">*</span>
			<?php echo form_dropdown('report_to', $leftCompany , set_value('report_to', (isset($client['report_to']) ? $client['report_to'] : '')), 'class="form-control"'); ?>
	</div>
	
	<div class="form-group col-sm-6<?php echo form_error('left_company') ? ' has-error' : ''; ?>">
		<?php echo form_label(lang('contacts input left_company'), 'left_company', array('class'=>'control-label')); ?>
			 
			<?php echo form_dropdown('left_company', $leftCompany , set_value('left_company', (isset($client['left_company']) ? $client['left_company'] : '')), 'class="form-control"'); ?>
	</div>
	
 
	
	</div>
	
	
	
	 
 </div>

   
	<div class="bggray">
	<div class="row radio-block">
	 <div class="col-sm-6">
         <div class="form-group">
				<?php echo form_label(lang('contacts input is_hot'), 'isHot', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'is_hot', 'id'=>'is_hot', 'value'=>'1', 'checked'=>(( 1 == $client['is_hot']) ? 'checked' : FALSE))); ?>
			</div></div>
        

			<div class="form-group col-sm-6<?php echo form_error('is_active') ? ' has-error' : ''; ?>">
                                    <?php echo form_label(lang('contacts input is_active'), '', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <div class="radio">
                                            <label>
                                                <?php echo form_radio(array('name'=>'is_active', 'id'=>'radio-is_active-1', 'value'=>'1', 'checked'=>(( ! isset($client['is_active']) OR (isset($client['is_active']) && (int)$client['is_active'] == 1)) ? 'checked' : FALSE))); ?>
                                                    <?php echo lang('admin input active'); ?>
                                            </label>
                                        </div> 
                                            <div class="radio">
                                                <label>
                                                    <?php echo form_radio(array('name'=>'is_active', 'id'=>'radio-is_active-2', 'value'=>'0', 'checked'=>((isset($client['is_active']) && (int)$client['is_active'] == 0) ? 'checked' : FALSE))); ?>
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
	
	 

  

<?php echo form_close(); ?>
