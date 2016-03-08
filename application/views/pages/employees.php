<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li style = "font-weight: bold;" class="active"><a href="#" data-toggle="tab">Employee List</a></li>
                <li><a href="<?php echo site_url() ?>employees/add" role ="tab">Add Employee</a></li>
                        
                </ul>

                        <div class="tab-content  ">

                            <div class="tab-pane active" id="basic-info">
                                 <div class="box box-primary">
                                           
                                    <div class="box-body">
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        
          <div class = "panel-heading"><h5>Manage Employees Records</h5></div> 
                <div class="divider"></div>
                <br><br>
     


            <div class="box-body">
                <?php if(!empty($success) || !empty($_SESSION['success'])) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $_SESSION['success']; $_SESSION['success'] = '';?>
                </div>
                <?php } ?>
            </div>

            <!-- /.panel-heading -->
            <div class="box-body">
                  <div class="col-lg-6 pull-right">
                     <div class="col-lg-6">
                             <label>Department</label>

                             <form name="jump" class="center">
                                    <select class = "form-control "name="menu">
                                <?php if(!empty($dept)) { 
                                    foreach($dept as $_dept) {  ?>
                                                                  
                                    <option value="<?php echo site_url().'employees/print/'.$_dept['department']; ?>"><?php echo ucwords($_dept['department']);?></option>

                                <?php }} ?>
                                </select>

                    </div>
                    <br>
                    <div class="col-lg-6">
                    <input class="waves-effect waves-light btn" type="button" onClick="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="Print">
</form>
                     <!--   <button id = "but">Print</button> -->
                    </div>
                </div>

                <br>

                <br>

                <br>
                <div class="dataTables_wrapper">
             
                  
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                            	<th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $j=0;
                    		if(!empty($emp)) {
							$i=0;
							foreach($emp as $_emp) { 					
								if($i%2==0) { 
									$style = "odd";
									$i++;
								} else {
									$style = "even"; 
									$i++;
								}					
								$j++; ?>
                            <tr class="<?php echo $style; ?> gradeX">
                            	<td class="center"><?php echo $_emp['employeeid']; ?></td>
                                <td><?php echo $_emp['firstname'].$_emp['lastname'] ; ?></td>
                               	<td><?php echo $_emp['department']; ?></td>
                                <td><?php echo $_emp['jobtitle']; ?></td>
                                <td><?php echo $_emp['gender'];  ?></td>
                                <td><?php echo $_emp['contact_no'];  ?></td>
                                <td class="center"><a class="waves-effect waves-light btn" href="<?php echo site_url()."employees/edit/".$_emp['user_id']; ?>">Edit</a> | <a class="waves-effect waves-light btn" href="<?php echo site_url()."employees/delete/".$_emp['user_id']; ?>" onClick="return confirm('Are you sure you want to remove this employee <?php echo $_emp['employeeid']; ?>')">Delete</a></td>
                            </tr>
                            <?php }} ?>
                            
                        </tbody>
                    </table>
                </div>
               
            </div>
            <!-- /.panel-body -->
       
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
</div>
</div>
</div>
</div>
<!--
<script>
$(document).ready(function () {
            $('select.department').change(function(e){
              // this function runs when a user selects an option from a <select> element
              window.location.href = $("select.department option:selected").attr('value');
           });
    });
</script>