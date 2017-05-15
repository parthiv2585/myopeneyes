<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-success btn-sm tooltips" href="<?php echo base_url('admin/contacts/add'); ?>" title="<?php echo lang('contacts tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('contacts button add_new_user'); ?></a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover-warning pad5">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=contact_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts col contact_id'); ?></a>
                    <?php if ($sort == 'contact_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=client_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts col client_id'); ?></a>
                    <?php if ($sort == 'client_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				 <td>
                    <a href="<?php echo current_url(); ?>?sort=first_name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts col first_name'); ?></a>
                    <?php if ($sort == 'first_name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
                <td>
                    <a href="<?php echo current_url(); ?>?sort=last_name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts col last_name'); ?></a>
                    <?php if ($sort == 'last_name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=email_work&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts input email_work'); ?></a>
                    <?php if ($sort == 'email_work') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				<td>
                    <a href="<?php echo current_url(); ?>?sort=phone_work&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('contacts input phone_work'); ?></a>
                    <?php if ($sort == 'phone_work') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
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
					
					<th<?php echo ((isset($filters['client_id'])) ? ' class="has-success"' : ''); ?>>
					 <?php echo form_dropdown('client_id', $leftCompany, isset($filters['client_id']) ? $filters['client_id'] : '' , 'class="form-control"'); ?>
                 </th> 
					
					
                    <th<?php echo ((isset($filters['first_name'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control input-sm', 'placeholder'=>lang('contacts col first_name'), 'value'=>set_value('first_name', ((isset($filters['first_name'])) ? $filters['first_name'] : '')))); ?>
                    </th>
					
				    <th<?php echo ((isset($filters['last_name'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control input-sm', 'placeholder'=>lang('contacts col last_name'), 'value'=>set_value('last_name', ((isset($filters['last_name'])) ? $filters['last_name'] : '')))); ?>
                    </th>
					
					
					 <th<?php echo ((isset($filters['email_work'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'email_work', 'id'=>'email_work', 'class'=>'form-control input-sm', 'placeholder'=>lang('contacts input email_work'), 'value'=>set_value('email_work', ((isset($filters['email_work'])) ? $filters['email_work'] : '')))); ?>
                    </th>
					
					 <th<?php echo ((isset($filters['phone_work'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'phone_work', 'id'=>'phone_work', 'class'=>'form-control input-sm', 'placeholder'=>lang('contacts input phone_work'), 'value'=>set_value('phone_work', ((isset($filters['phone_work'])) ? $filters['phone_work'] : '')))); ?>
                    </th>
					
					
					
					<th<?php echo ((isset($filters['is_active'])) ? ' class="has-success"' : ''); ?>>
					 <?php echo form_dropdown('is_active', $statuslist, isset($filters['is_active']) ? $filters['is_active'] : '' , 'class="form-control"'); ?>
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
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td<?php echo (($sort == 'id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['contact_id']; ?>
                        </td>
                        <td<?php echo (($sort == 'client_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['name']; ?>
                        </td>
                        <td<?php echo (($sort == 'first_name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['first_name']; ?>
                        </td>
						 <td<?php echo (($sort == 'last_name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['last_name']; ?>
                        </td>
						
						 <td<?php echo (($sort == 'email_work') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['email_work']; ?>
                        </td>
						
						 <td<?php echo (($sort == 'phone_work') ? ' class="sorted"' : ''); ?>>
                            <?php echo $contact['phone_work']; ?>
                        </td>
						
                         <td<?php echo (($sort == 'is_active') ? ' class="sorted"' : ''); ?>>
                            <?php echo ($contact['is_active']) ? '<span class="active text-success">' . lang('admin input active') . '</span>' : '<span class="inactive text-danger">' . lang('admin input inactive') . '</span>'; ?>
                        </td>
						 
 						
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                    <a href="#modal-<?php echo $contact['contact_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="<?php echo $this_url; ?>/edit/<?php echo $contact['contact_id']; ?>" class="btn btn-warning btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
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
    <?php foreach ($contacts as $contact) : ?>
        <div class="modal fade" id="modal-<?php echo $contact['contact_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $contact['contact_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $contact['contact_id']; ?>"><?php echo lang('contacts title client_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('contacts msg delete_confirm'), $contact['name']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<a href="<?php echo $this_url; ?>/delete/<?php echo $contact['contact_id']; ?>" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><?php echo lang('admin button delete'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
