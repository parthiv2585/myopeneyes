<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<div class="row">
		<div class="col-md-12">
		<div class="page-header">
        </div>
		</div>
		<div class="col-md-8">
            <h2>Lorem Ipsum</h2>
			<h3 class="martop20">Consulting</h3>
			<p>is a field we focuses on advising businesses on how best to use information technology to meet their business objectives.</p>
			<h3>Analysis</h3>
			<p>is the first step towards identifying your needs by breaking them into smaller parts for better understanding.</p>
			<h3>Strategy</h3>
			<p>is important to understand the high level plan to achieve one or more goals under conditions of uncertainty </p>
			<h3>Services</h3>
			<p>Service Oriented Architecture Software as a Service Man power provider Services as a Library.</p>
        </div>
		<div class="col-md-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
	<?php echo form_open('', array('class'=>'form-signin')); ?>
    <div class="form-group"><?php echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'form-control', 'placeholder'=>lang('users input username_email'), 'maxlength'=>256)); ?></div>
    <div class="form-group">
		<?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>lang('users input password'), 'maxlength'=>72, 'autocomplete'=>'off')); ?>
	</div>	
    <?php echo form_submit(array('name'=>'submit', 'class'=>'btn btn-lg btn-success btn-block'), lang('core button login')); ?>
    <p class="text-center"><br /><a href="<?php echo base_url('admin/user/forgot'); ?>"><?php echo lang('users link forgot_password'); ?></a></p>
    <p class="text-center"><a href="<?php echo base_url('admin/user/register'); ?>"><?php echo lang('users link register_account'); ?></a></p>
	
 
	
<?php echo form_close(); ?>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
