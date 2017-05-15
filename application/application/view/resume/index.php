 <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Candidates List </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box"> 
			 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
				  <th>State</th>
                  <th>City</th>
                  <th class="no-sort">Action</th>
                </tr>
                </thead>
                <tbody> 
				<?php foreach ($candidates as $candidate) { ?>
                <tr>
                  <td><?php if (isset($candidate->name)) echo htmlspecialchars($candidate->name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($candidate->email)) echo htmlspecialchars($candidate->email, ENT_QUOTES, 'UTF-8'); ?>
                  </td>
                  <td><?php if (isset($candidate->mobile)) echo htmlspecialchars($candidate->mobile, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($candidate->state)) echo htmlspecialchars($candidate->state, ENT_QUOTES, 'UTF-8'); ?></td>
				  <td><?php if (isset($candidate->city)) echo htmlspecialchars($candidate->city, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td> <a href="<?php echo URL . 'resume/editCandidate/' . htmlspecialchars($candidate->candidate_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-block btn-success btn-sm"> Edit </a> </td>
                </tr>  
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                 <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
				  <th>State</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <script> 
 $(function () { 
    var table = $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,      
      "info": true,
      "autoWidth": true,
	   'aoColumnDefs': [{
			'bSortable': false,
			'aTargets': [-1]/* 1st one, start by the right */
		}],
		"aaSorting": []
		
    });
  });
 </script>