<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-success btn-sm tooltips" href="<?php echo base_url('admin/joborders/add'); ?>" title="<?php echo lang('joborders tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('joborders button add_new_user'); ?></a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover-warning pad5">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=joborder_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('joborders col joborder_id'); ?></a>
                    <?php if ($sort == 'joborder_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				 <td>
                    <a href="<?php echo current_url(); ?>?sort=title&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('joborders col title'); ?></a>
                    <?php if ($sort == 'title') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
                <td>
                    <a href="<?php echo current_url(); ?>?sort=client_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('joborders col Company Name'); ?></a>
                    <?php if ($sort == 'client_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=position_type&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('joborders input position_type'); ?></a>
                    <?php if ($sort == 'position_type') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>  
				 
				<td>
                    <a href="<?php echo current_url(); ?>?sort=is_active&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('joborders input is_active'); ?></a>
                    <?php if ($sort == 'is_active') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
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
					
					<th<?php echo ((isset($filters['title'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'title', 'id'=>'title', 'class'=>'form-control input-sm', 'placeholder'=>lang('joborders col title'), 'value'=>set_value('title', ((isset($filters['title'])) ? $filters['title'] : '')))); ?>
                    </th>
					
                    <th<?php echo ((isset($filters['client_id'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'client_id', 'id'=>'client_id', 'class'=>'form-control input-sm', 'placeholder'=>lang('joborders col Company Name'), 'value'=>set_value('client_id', ((isset($filters['client_id'])) ? $filters['client_id'] : '')))); ?>
                    </th>
					
                    <th<?php echo ((isset($filters['position_type'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'position_type', 'id'=>'position_type', 'class'=>'form-control input-sm', 'placeholder'=>lang('joborders input position_type'), 'value'=>set_value('position_type', ((isset($filters['position_type'])) ? $filters['position_type'] : '')))); ?>
                    </th> 
					
					<th<?php echo ((isset($filters['is_active'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'is_active', 'id'=>'is_active', 'class'=>'form-control input-sm', 'placeholder'=>lang('joborders input is_active'), 'value'=>set_value('is_active', ((isset($filters['is_active'])) ? $filters['is_active'] : '')))); ?>
                    </th>
					 
					
				 
                   
                    <th colspan="4" width="90px">
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
                <?php   
				foreach ($joborders as $joborder) : ?>
                    <tr>
                        <td<?php echo (($sort == 'joborder_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $joborder['joborder_id']; ?>
                        </td>
                        <td<?php echo (($sort == 'title') ? ' class="sorted"' : ''); ?>>
                            <?php echo $joborder['title']; ?>
                        </td>
						 <td<?php echo (($sort == 'client_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $joborder['company_name']; ?>
                        </td>
                        
                        <td<?php echo (($sort == 'position_type') ? ' class="sorted"' : ''); ?>>
                            <?php echo $joborder['position_type']; ?>
                        </td>  
						<td<?php echo (($sort == 'is_active') ? ' class="sorted"' : ''); ?>>
                            <?php echo ($joborder['is_active']) ? '<span class="active text-success">' . lang('admin input active') . '</span>' : '<span class="inactive text-danger">' . lang('admin input inactive') . '</span>'; ?>
                        </td>
 					
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                   
								   <a href="#modal-<?php echo $joborder['joborder_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                   
								   <a href="<?php echo $this_url; ?>/edit/<?php echo $joborder['joborder_id']; ?>" class="btn btn-warning btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
								   
								   <a href="<?php echo $this_url; ?>/assign/<?php echo $joborder['joborder_id']; ?>" class="btn btn-info btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-user"></span></a>
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
    <?php foreach ($joborders as $joborder) : ?>
        <div class="modal fade" id="modal-<?php echo $joborder['joborder_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $joborder['joborder_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $joborder['joborder_id']; ?>"><?php echo lang('joborders title client_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('joborders msg delete_confirm'), $joborder['client_id'] .' '.$joborder['position_type']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<a href="<?php echo $this_url; ?>/delete/<?php echo $joborder['joborder_id']; ?>" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><?php echo lang('admin button delete'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
