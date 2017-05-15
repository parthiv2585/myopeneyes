<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <?php echo form_open_multipart('', array('role'=>'form'));?> 
 
 <?php echo form_hidden('id', $client_id); ?> 
  
 <div class="bggray">
  <div class="row"> 
		<div class="form-group col-sm-6<?php echo form_error('name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('clients input client name'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'name', 'value'=>set_value('name', (isset($client['name']) ? $client['name'] : '')), 'class'=>'form-control')); ?>
        </div>
		
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input client url'), 'url', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'url', 'value'=>set_value('url', (isset($client['url']) ? $client['url'] : '')), 'class'=>'form-control')); ?>
        </div> 
        
    </div>
	<div class="row"> 
	 <div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input client misc. notes'), 'notes', array('class'=>'control-label')); ?>
			<?php echo form_textarea(array('name'=>'notes', 'value'=>set_value('notes', (isset($client['notes']) ? $client['notes'] : '')), 'class'=>'form-control' , 'rows'=>4)); ?>
        </div>
		<div class="form-group col-sm-6<?php echo form_error('about_company') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('clients input client about_company'), 'about_company', array('class'=>'control-label')); ?>
			 <span class="required">*</span>
			<?php echo form_textarea(array('name'=>'about_company', 'value'=>set_value('about_company', (isset($client['about_company']) ? $client['about_company'] : '')), 'class'=>'form-control' , 'rows'=>4)); ?>
        </div>
	</div>
	<div class="row"> 
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input client no_of_employee'), 'no_of_employee', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'no_of_employee', 'value'=>set_value('no_of_employee', (isset($client['no_of_employee']) ? $client['no_of_employee'] : '')), 'class'=>'form-control')); ?>
        </div>
        <div class="form-group col-sm-6<?php echo form_error('industrie_id') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('clients input client industries'), 'industrie_id', array('class'=>'control-label')); ?> 
			 <span class="required">*</span>
			 <?php echo form_dropdown('industrie_id', $industriesDropDown , set_value('industrie_id', (isset($client['industrie_id']) ? $client['industrie_id'] : '')), 'class="form-control"'); ?>
			 
        </div>
    </div>
	<div class="row"> 
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input facebook'), 'facebook', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'facebook', 'value'=>set_value('facebook', (isset($client['facebook']) ? $client['facebook'] : '')), 'class'=>'form-control')); ?>
        </div>
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input linkedin'), 'linkedin', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'linkedin', 'value'=>set_value('linkedin', (isset($client['linkedin']) ? $client['linkedin'] : '')), 'class'=>'form-control')); ?>
        </div> 
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input client google_plus'), 'google_plus', array('class'=>'control-label')); ?>
            <?php echo form_input(array('name'=>'google_plus', 'value'=>set_value('google_plus', (isset($client['google_plus']) ? $client['google_plus'] : '')), 'class'=>'form-control')); ?>
        </div> 
		
		<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<?php echo form_label(lang('clients input client client_logo'), 'zip', array('class'=>'control-label')); ?> 
						<input type='file' name='client_logo' size='20' />
						<?php echo form_hidden('h_client_logo',$client['client_logo']); ?>
					</div>
					<div class="col-md-6">
						<?php 
						if(isset($client['client_logo']) && !empty($client['client_logo'])) {
					?>
				  <div class="martop20">
					<a class="btn btn-sm btn-danger pull-right" href="javascript://" onClick="deleteImage(<?php echo $client['client_id']; ?>)">Delete</a> <a class="btn btn-sm btn-success pull-right" href="<?php echo $this->config->item('base_url')."uploads/client_logo/".$client['client_logo']; ?>" target="_blank">View</a>
				
			</div>
			
		  <?php } ?>
					</div>
				</div>
		
					
					  
					  
		</div>
				
					
	</div> 
	
	<div class="row">  
        <div class="form-group col-sm-6">
            <?php echo form_label(lang('clients input client skills'), 'skills', array('class'=>'control-label')); ?> 
			
			  <?php echo form_textarea(array('name'=>'skills', 'value'=>set_value('skills', (isset($client['skills']) ? $client['skills'] : '')), 'class'=>'form-control', 'rows'=>4)); ?>
			  
			 
			 
        </div>
    </div>
	
	
 </div>

   
	<div class="bggray">
	<div class="row radio-block">
	 <div class="col-sm-6">
         <div class="form-group">
				<?php echo form_label(lang('clients input client default_company'), 'isHot', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'default_company', 'id'=>'default_company', 'value'=>'1', 'checked'=>(( 1 == $client['default_company']) ? 'checked' : FALSE))); ?>
			</div></div>
        <div class="col-sm-6">
            
			<div class="form-group">
				<?php echo form_label(lang('clients input client hot client'), 'isHot', array('class'=>'control-label')); ?>
				<?php echo form_checkbox(array('name'=>'is_hot', 'id'=>'is_hot', 'value'=>'1', 'checked'=>(( 1 == $client['is_hot']) ? 'checked' : FALSE))); ?>
			</div>
        </div> 

<div class="form-group col-sm-6<?php echo form_error('is_active') ? ' has-error' : ''; ?>">
                                    <?php echo form_label(lang('clients input is_active'), '', array('class'=>'control-label')); ?>
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
