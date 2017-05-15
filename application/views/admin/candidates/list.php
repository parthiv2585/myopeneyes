<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-success btn-sm tooltips" href="<?php echo base_url('admin/candidates/add'); ?>" title="<?php echo lang('candidates tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('candidates button add_new_user'); ?></a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover-warning pad5">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=candidate_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates col candidate_id'); ?></a>
                    <?php if ($sort == 'candidate_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=first_name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates col first name'); ?></a>
                    <?php if ($sort == 'first_name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=last_name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates col last name'); ?></a>
                    <?php if ($sort == 'last_name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
                <td>
                    <a href="<?php echo current_url(); ?>?sort=city&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates col city'); ?></a>
                    <?php if ($sort == 'city') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=state&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates input state'); ?></a>
                    <?php if ($sort == 'state') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				<td>
                    <a href="<?php echo current_url(); ?>?sort=key_skills&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates input company key skills'); ?></a>
                    <?php if ($sort == 'key_skills') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
			 <td>
                    <a href="<?php echo current_url(); ?>?sort=date_created&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('candidates input company date created'); ?></a>
                    <?php if ($sort == 'date_created') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                
                <td class="pull-right">
                    <?php echo lang('admin col actions'); ?>
                </td> 
            </tr>

            <?php // search filters ?>
            <tr>
                <?php echo form_open("{$this_url}?sort={$sort}&dir={$dir}&limit={$limit}&offset=0{$filter}", array('role'=>'form', 'id'=>"filters")); ?>
                    <th>
                    </th>
                    <th<?php echo ((isset($filters['first_name'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control input-sm', 'placeholder'=>lang('candidates input first name'), 'value'=>set_value('first_name', ((isset($filters['first_name'])) ? $filters['first_name'] : '')))); ?>
                    </th>
					<th<?php echo ((isset($filters['last_name'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control input-sm', 'placeholder'=>lang('candidates input last name'), 'value'=>set_value('last_name', ((isset($filters['last_name'])) ? $filters['last_name'] : '')))); ?>
                    </th>
                    <th<?php echo ((isset($filters['city'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'city', 'id'=>'city', 'class'=>'form-control input-sm', 'placeholder'=>lang('candidates input city'), 'value'=>set_value('city', ((isset($filters['city'])) ? $filters['city'] : '')))); ?>
                    </th>
					
					<th<?php echo ((isset($filters['state'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'state', 'id'=>'state', 'class'=>'form-control input-sm', 'placeholder'=>lang('candidates input state'), 'value'=>set_value('state', ((isset($filters['state'])) ? $filters['state'] : '')))); ?>
                    </th>
					
					<th<?php echo ((isset($filters['key_skills'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'key_skills', 'id'=>'key_skills', 'class'=>'form-control input-sm', 'placeholder'=>lang('candidates input company key skills'), 'value'=>set_value('key_skills', ((isset($filters['key_skills'])) ? $filters['key_skills'] : '')))); ?>
                    </th>
					 
					
					<th<?php echo ((isset($filters['date_created'])) ? ' class="has-success"' : ''); ?>>
                        <div class="input-group date" data-date="<?php echo date('m-d-Y'); ?>" data-date-format="mm-dd-yyyy">
                            <?php echo form_input(array('name'=>'date_created', 'id'=>'date_created', 'class'=>'form-control input-sm', 'readonly'=>'readonly', 'placeholder'=>lang('candidates input company date created'), 'value'=>set_value('date_created', ((isset($filters['date_created'])) ? $filters['date_created'] : '')))); ?>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </th>
                   
                    <th colspan="4" width="250px">
                        <div class="text-right">
							<div class="btn-group">
                                <a href="<?php echo $this_url; ?>" class="btn btn-sm btn-danger tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter_reset'); ?>"><span class="glyphicon glyphicon-refresh"></span></a>
                                <button type="submit" name="submit" value="<?php echo lang('core button filter'); ?>" class="btn btn-success btn-sm tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter'); ?>"><span class="glyphicon glyphicon-filter"></span> </button>
                            </div>
                            
                        </div>
                    </th>
                <?php echo form_close(); ?>
            </tr>

        </thead>
        <tbody>

            <?php // data rows ?>
            <?php if ($total) : ?>
                <?php foreach ($candidates as $candidate) : ?>
                    <tr>
                        <td<?php echo (($sort == 'candidate_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['candidate_id']; ?>
                        </td>
                        <td<?php echo (($sort == 'first_name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['first_name']; ?>
                        </td>
						 <td<?php echo (($sort == 'last_name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['last_name']; ?>
                        </td>
                        <td<?php echo (($sort == 'city') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['city']; ?>
                        </td>
                        <td<?php echo (($sort == 'state') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['state']; ?>
                        </td>  
						 <td<?php echo (($sort == 'key_skills') ? ' class="sorted"' : ''); ?>>
                            <?php echo $candidate['key_skills']; ?>
                        </td> 
<td<?php echo (($sort == 'date_created') ? ' class="sorted"' : ''); ?>>
                            <?php echo date($this->config->item('short_date_format'),strtotime($candidate['date_created'])); ?>
                        </td>						
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                    
									<a href="#modal-<?php echo $candidate['candidate_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    
									<a href="<?php echo $this_url; ?>/edit/<?php echo $candidate['candidate_id']; ?>" class="btn btn-warning btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
									
									<a href="#assign-<?php echo $candidate['candidate_id']; ?>" data-toggle="modal" class="btn btn-info btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-user"></span></a>
									
                                </div>
								
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">
                        <?php echo lang('core error no_results'); ?>
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>

    <?php // list tools ?>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-2 text-left">
                <label><?php echo sprintf(lang('admin label rows'), $total); ?></label>
            </div>
            <div class="col-md-2 text-left">
                <?php if ($total > 10) : ?>
                    <select id="limit" class="form-control">
                        <option value="10"<?php echo ($limit == 10 OR ($limit != 10 && $limit != 25 && $limit != 50 && $limit != 75 && $limit != 100)) ? ' selected' : ''; ?>>10 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="25"<?php echo ($limit == 25) ? ' selected' : ''; ?>>25 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="50"<?php echo ($limit == 50) ? ' selected' : ''; ?>>50 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="75"<?php echo ($limit == 75) ? ' selected' : ''; ?>>75 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="100"<?php echo ($limit == 100) ? ' selected' : ''; ?>>100 <?php echo lang('admin input items_per_page'); ?></option>
                    </select>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo $pagination; ?>
            </div>
            <div class="col-md-2 text-right">
                <?php if ($total) : ?>
                    <a href="<?php echo $this_url; ?>/export?sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?><?php echo $filter; ?>" class="btn btn-success btn-sm tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip csv_export'); ?>"><span class="glyphicon glyphicon-export"></span> <?php echo lang('admin button csv_export'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<?php // delete modal ?>
<?php if ($total) : ?>
    <?php foreach ($candidates as $candidate) : ?>
        <div class="modal fade" id="modal-<?php echo $candidate['candidate_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $candidate['candidate_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $candidate['candidate_id']; ?>"><?php echo lang('candidates title client_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('candidates msg delete_confirm'), $candidate['first_name'] .' '.$candidate['last_name']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<a href="<?php echo $this_url; ?>/delete/<?php echo $candidate['candidate_id']; ?>" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><?php echo lang('admin button delete'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div> 
		
		<div class="modal fade" id="assign-<?php echo $candidate['candidate_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $candidate['candidate_id']; ?>" aria-hidden="true">
		
			<div class="alert alert-success assign-message-popup" style="display:none">
				  Assign candidate successfully.
			</div>
			
			<div class="alert alert-danger assign-message-popup-false" style="display:none">
				Candidate already assigned
			</div>
		
            <div class="modal-dialog">
			<?php 
				$canId = $candidate['candidate_id'];
			?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $candidate['candidate_id']; ?>"><?php echo lang('candidates title assign');  ?></h4>
                    </div> 
		
                    <div class="modal-body">
                        <p><?php echo form_dropdown('popup_client_id_'.$candidate['candidate_id'], $clientList,'','class="form-control" id="popup_client_id_'.$canId.'" onchange="getJobsList('.$canId.')"'); ?></p>
						
						
						<p><?php echo form_dropdown('popup_joborder_id_'.$candidate["candidate_id"], $jobOrdersList,'','class="form-control" id="popup_joborder_id_'.$canId.'"'); ?></p>
						
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						
						<a href="javascript://" class="btn btn-info" title="<?php echo lang('admin button assign'); ?>" onClick="assignCandidates('<?php echo $candidate['candidate_id']; ?>')"><?php echo lang('admin button assign'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div>
		
		
    <?php endforeach; ?>
<?php endif; ?>
