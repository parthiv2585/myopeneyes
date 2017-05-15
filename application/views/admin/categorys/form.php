<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php //echo form_open('', array('role'=>'form')); ?>
 <?php echo form_open_multipart('', array('role'=>'form'));?>
 
    <?php // hidden id ?> 
    <?php echo form_hidden('id', $category_id); ?>
	<div class="bggray">
		<div class="row">
		<div class="form-group col-sm-6<?php echo form_error('name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('categorys input name'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span> 
            <?php echo form_input(array('name'=>'category_name','value'=>set_value('name', (isset($category['name']) ? $category['name'] : '')), 'class'=>'form-control')); ?>
			
			
			 
        </div>  
		</div> 
		
		<div class="row">
		 <div class="form-group col-sm-6<?php echo form_error('status') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('categorys input status'), '', array('class'=>'control-label')); ?>
           
            <div class="radio">
                <label>
                    <?php echo form_radio(array('name'=>'status', 'id'=>'radio-status-1', 'value'=>'1', 'checked'=>(( ! isset($category['status']) OR (isset($category['status']) && (int)$category['status'] == 1)) ? 'checked' : FALSE))); ?>
                    <?php echo lang('admin input active'); ?>
                </label>
            </div>
			
			<div class="radio">
                    <label>
                        <?php echo form_radio(array('name'=>'status', 'id'=>'radio-status-2', 'value'=>'0', 'checked'=>((isset($category['status']) && (int)$category['status'] == 0) ? 'checked' : FALSE))); ?>
                        <?php echo lang('admin input inactive'); ?>
                    </label>
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


