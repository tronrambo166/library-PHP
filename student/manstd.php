<h3 class="py-5  display-3 font-weight-bold">All Students</h3>

<h3 class="text-center font-weight-bold bg-light"><?php if(isset($_SESSION['del'])){ echo $_SESSION['del']; $_SESSION['del']=""; }?></h3>

<?php    
//include "database.php";

// geiing active / inactive:
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
	
		$sel=" select * from blog where ID = '$id' ";
		$run=$connect->query($sel);
		$row=$run->fetch_assoc();
		//print_r($row);
		}

		// geiing active / inactive:
?>

<div class=" float-right"><a href="librarian/printstd.php" target="_blank" class="float-right my-3 px-4 text-danger font-weight-bold font-italic btn btn-dark">Print</a></div>


<table class="display table table-bordered " id="myTable">
	<thead>
		<tr>
			<th>Category Name</th>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Image</th>
			<th>Actions</th>
		
		</tr>
	</thead>
	
	<tbody>
	
	
	<?php  
	
		
		$sel="select * from students";
		
		$res=$connect->query($sel);
		
		
		while($row=$res->fetch_assoc()){ ?>
			
			<tr>
			
			<td><?php echo $row['Name'];?></td>
			<td><?php echo $row['ID'];?></td>
			<td><?php echo $row['Username'];?></td>
			<td><?php echo $row['Email'];?></td>
			<td><?php if( $row['Phone']==1) echo "Active"; else echo "Inactive";?></td>
			<td class="w-25"><img style="width:200px;height:130px" src="<?php echo 'images/'.$row['Image'];?>" alt="" /></td>
			
			<td> 
			
			<a href="index.php?page=editblog&id=<?php echo $row['ID'];?>" class="btn bg-info"> Edit</a>
			
			<a href="deleteblog.php?id=<?php echo $row['ID'];?>&filename=<?php echo $row['Image'];?>" class="btn bg-danger"> Delete</a>
			
			</td>
		</tr>
			
		<?php	
		}
		?>
		
	</tbody>
	
	
</table>


