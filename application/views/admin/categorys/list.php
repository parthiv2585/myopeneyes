<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-success btn-sm tooltips" href="<?php echo base_url('admin/categorys/add'); ?>" title="<?php echo lang('categorys tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('categorys button add_new_user'); ?></a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover-warning pad5">
        <thead> 
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=category_id&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('categorys col category_id'); ?></a>
                    <?php if ($sort == 'category_id') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=name&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('categorys col name'); ?></a>
                    <?php if ($sort == 'name') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td> 
				
                <td>
                    <a href="<?php echo current_url(); ?>?sort=status&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('categorys col status'); ?></a>
                    <?php if ($sort == 'status') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
				
				 
				 
			 <td>
                    <a href="<?php echo current_url(); ?>?sort=created&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('categorys input company date created'); ?></a>
                    <?php if ($sort == 'created') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
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
                        <?php echo form_input(array('name'=>'name', 'id'=>'name', 'class'=>'form-control input-sm', 'placeholder'=>lang('categorys input first name'), 'value'=>set_value('name', ((isset($filters['name'])) ? $filters['name'] : '')))); ?>
                    </th>
				 
                 <th<?php echo ((isset($filters['status'])) ? ' class="has-success"' : ''); ?>>
					 <?php echo form_dropdown('status', $statuslist, isset($filters['status']) ? $filters['status'] : '' , 'class="form-control"'); ?>
                 </th>  
					
					<th<?php echo ((isset($filters['created'])) ? ' class="has-success"' : ''); ?>>
                        <div class="input-group date" data-date="<?php echo date('m-d-Y'); ?>" data-date-format="mm-dd-yyyy">
                            <?php echo form_input(array('name'=>'created', 'id'=>'created', 'class'=>'form-control input-sm', 'readonly'=>'readonly', 'placeholder'=>lang('categorys input company date created'), 'value'=>set_value('created', ((isset($filters['created'])) ? $filters['created'] : '')))); ?>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
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
                <?php foreach ($categorys as $category) : ?>
                    <tr>
                        <td<?php echo (($sort == 'category_id') ? ' class="sorted"' : ''); ?>>
                            <?php echo $category['category_id']; ?>
                        </td>
                        <td<?php echo (($sort == 'name') ? ' class="sorted"' : ''); ?>>
                            <?php echo $category['name']; ?>
                        </td>  
						 
						  <td<?php echo (($sort == 'status') ? ' class="sorted"' : ''); ?>>
                            <?php echo ($category['status']) ? '<span class="active">' . lang('admin input active') . '</span>' : '<span class="inactive">' . lang('admin input inactive') . '</span>'; ?>
                        </td>
						 
<td<?php echo (($sort == 'created') ? ' class="sorted"' : ''); ?>>
                            <?php echo date($this->config->item('short_date_format'),strtotime($category['created'])); ?>
                        </td>						
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                    <a href="#modal-<?php echo $category['category_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    <a href="<?php echo $this_url; ?>/edit/<?php echo $category['category_id']; ?>" class="btn btn-warning btn-sm" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
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
    <?php foreach ($categorys as $category) : ?>
        <div class="modal fade" id="modal-<?php echo $category['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $category['category_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $category['category_id']; ?>"><?php echo lang('categorys title client_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('categorys msg delete_confirm'), $category['name']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
						<a href="<?php echo $this_url; ?>/delete/<?php echo $category['category_id']; ?>" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><?php echo lang('admin button delete'); ?></a>
						 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
