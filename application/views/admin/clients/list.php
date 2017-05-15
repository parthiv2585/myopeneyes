<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-success btn-sm tooltips" href="<?php echo base_url('admin/clients/add'); ?>" title="<?php echo lang('clients tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('clients button add_new_user'); ?></a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover-warning pad5">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=client_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('clients col client_id'); ?></a>
                    <?php if ($sort == 'client_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('clients col name'); ?></a>
                    <?php if ($sort == 'name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				  <td>
                    <a href="<?php echo current_url(); ?>?sort=url&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('clients input client url'); ?></a>
                    <?php if ($sort == 'url') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=no_of_employee&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('clients input client no_of_employee'); ?></a>
                    <?php if ($sort == 'no_of_employee') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                 
				<td>
                    <a href="<?php echo current_url(); ?>?sort=industrie_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('clients input client industries'); ?></a>
                    <?php if ($sort == 'industrie_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=is_active&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('admin col status'); ?></a>
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
                    <th<?php echo ((isset($filters['name'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'name', 'id'=>'name', 'class'=>'form-control input-sm', 'placeholder'=>lang('clients input client name'), 'value'=>set_value('name', ((isset($filters['name'])) ? $filters['name'] : '')))); ?>
                    </th>
					
					 <th<?php echo ((isset($filters['url'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'url', 'id'=>'url', 'class'=>'form-control input-sm', 'placeholder'=>lang('clients input client url'), 'value'=>set_value('url', ((isset($filters['url'])) ? $filters['url'] : '')))); ?>
                    </th>
					
					 <th<?php echo ((isset($filters['no_of_employee'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'no_of_employee', 'id'=>'no_of_employee', 'class'=>'form-control input-sm', 'placeholder'=>lang('clients input client no_of_employee'), 'value'=>set_value('no_of_employee', ((isset($filters['no_of_employee'])) ? $filters['no_of_employee'] : '')))); ?>
                    </th>
                    
					 
					
					<th<?php echo ((isset($filters['industrie_id'])) ? ' class="has-success"' : ''); ?>>
					 <?php echo form_dropdown('industrie_id', $industriesDropDown, isset($filters['industrie_id']) ? $filters['industrie_id'] : '' , 'class="form-control"'); ?>
					 
					 <th<?php echo ((isset($filters['is_active'])) ? ' class="has-success"' : ''); ?>>
					 <?php echo form_dropdown('is_active', $statuslist, isset($filters['is_active']) ? $filters['is_active'] : '' , 'class="form-control"'); ?>
                   
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
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td<?php echo (($sort == 'id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $client['client_id']; ?>
                        </td>
                        <td<?php echo (($sort == 'name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $client['name']; ?>
                        </td>
						<td<?php echo (($sort == 'url') ? ' class="sorted"' : ''); ?>>
                            <?php echo $client['url']; ?>
                        </td>
						
						 <td<?php echo (($sort == 'no_of_employee') ? ' class="sorted"' : ''); ?>>
                            <?php echo $client['no_of_employee']; ?>
                        </td>
						
						 <td<?php echo (($sort == 'industrie_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $client['title']; ?>
                        </td>
						
						 <td<?php echo (($sort == 'is_active') ? ' class="sorted"' : ''); ?>>
                            <?php echo ($client['is_active']) ? '<span class="active text-success">' . lang('admin input active') . '</span>' : '<span class="inactive text-danger">' . lang('admin input inactive') . '</span>'; ?>
                        </td>
                         
 						
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                    <a href="#modal-<?php echo $client['client_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="<?php echo $this_url; ?>/edit/<?php echo $client['client_id']; ?>" class="btn btn-warning btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
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
    <?php foreach ($clients as $client) : ?>
        <div class="modal fade" id="modal-<?php echo $client['client_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $client['client_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $client['client_id']; ?>"><?php echo lang('clients title client_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('clients msg delete_confirm'), $client['name']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<a href="<?php echo $this_url; ?>/delete/<?php echo $client['client_id']; ?>" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><?php echo lang('admin button delete'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
