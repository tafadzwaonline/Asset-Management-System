<div class="container">

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-header">
<b style="color:#fff;"> <b style="color:black; font-size:25px;"><h3><p><center>Vehicle bought</center><h3><p>

<h4><p><center>The following are the buy's made</center><p>
<h4></b></b>	
</div>	
<div class="panel-body">
	
		<div class="table-responsive">
		    <table  class="table table-hover table-striped table-bordered" id="dataTables-example">
		        <thead>
		        <tr>
					<th>ORDER ID</th>
		        	<th>MODEL</th>
		            <th>NO PLATE</th>
					<th>PRICE</th>
					<th>ORDERED BY</th>
					<th>PHONE NUMBER</th>
					<th>ADDRESS</th>
					<th>EMAIL</th>
					<th>STATUS</th>
					
		        </tr>
		    </thead>
		    <tbody>

		 <?php

			
			require("db/connect.php");
			
			
		    $sql_sel=mysql_query("SELECT * FROM `order` WHERE status='Accepted' && user ='".$_SESSION['username']."' ");
			
			if($sql_sel == false){
		       die(mysql_error());
		   }
		    
		    while($row=mysql_fetch_array($sql_sel)){
		    //$id = $row['rlship'];
		    ?>	
			 <tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['model'];?></td>
		            <td><?php echo $row['no_plate'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['phone_no'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['status'];?></td>
					

		           

		            <!--<td>
		            	
						<button type="submit" name="btn" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#accept<?php echo $row['id'];?>">Accept/Reject</button>
		            	<!--<input type="hidden" name="rlship" value="<?php echo $row['rlship']; ?>">
		            </td>-->
		        </tr>
				
				
				
				
				
				
<div class="modal fade" id="accept<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id'];?>" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['id'];?>">
      	<center><STRONG>ACCEPT/REJECT THIS VEHICLE<BR>
			TO BE TRADED IN THIS PLATFORM</STRONG></center></h4>
      </div>
      <form action="update.php" method="POST" >
      <div class="modal-body" style="FONT-size:20px; overflow:hidden;">		
					<div class="col-lg-10">
					
					
							
						<?php //echo '<img height = "200" width = "220" src = "data:image;base64,'.$row['7'].'">';?>
							
					
					
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">ID:</span>
								<input type="text" name="id" id="m<?php echo $row['id'];?>" value="<?php echo $row['id'];?>" class="form-control input-sm" >
							</div>
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">CONDITION:</span>
								<input type="text" name="condition" id="m<?php echo $row['condition'];?>" value="<?php echo $row['condition'];?>" class="form-control input-sm" >
							</div>
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">MODEL:</span>
								<input type="text" name="model" id="m<?php echo $row['model'];?>" value="<?php echo $row['model'];?>" class="form-control input-sm" >
							</div>
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">DESCRIPTION:</span>
								<input type="text" name="description" id="m<?php echo $row['description'];?>" value="<?php echo $row['description'];?>" class="form-control input-sm" >
							</div>
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">NUMBER PLATE:</span>
								<input type="text" name="no_plate" value="<?php echo $row['no_plate'];?>" class="form-control input-sm" />
							</div>
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">PRICE (KSHS):</span>
								<input type="text" name="price" value="<?php echo $row['price'];?>" class="form-control input-sm" />
							</div>
							
							<div class="input-group input-sm">
								<span class="input-group-addon input-sm">QUANTITIES:</span>
								<input type="text" name="quantity"value="1" class="form-control input-sm" />
							</div>
							<div class="input-group input-sm">
							<span class="input-group-addon input-sm">STATUS:</span>
								<select name="status" class="form-control input-sm" rows="1">
									<option value="Pending">Status Pending</option>
									<option value="Accepted">Accept</option>
									<option value="Rejected">Reject</option>
								</select>
							</div>
						</div>
        </div>
	<div class="modal-footer">
	      <div class="row">
			   <div class="form-group">
	                <div class="col-lg-2 pull-right">
	                    <button type="submit" class="btn btn-success  input-sm" name="btn">Submit</button> 
	                </div>
	            </div>
	        </div>
	</div>
</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->	

				
				
				
		        
				<?php
				}
				?>
			</tbody>
			</table>
			</div>
			</div>


</div>
</div>
</div>
</div>