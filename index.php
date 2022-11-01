<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>SYED MUJTABA ALI HALL</title>
	</head>
		<body>
  
							<div class="container mt-4">
							
							<div class="card text-center">

									  <div class="card-body">
									  <img src="R.png" alt="..." style="height:50px;wight:50px;" >
										<h5 class="card-title">SHAHJALAL UNIVERSITY OF SCIENCE AND TECHNOLOGY</h5>
										<p class="card-text">SYED MUJTABA ALI HALL</p>
									  </div>

									</div>
							
							

								<?php include('message.php'); ?>

								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="card-header">
												<h4>Student List
													<a href="student-create.php" class="btn btn-primary float-end">Add Students</a>
												</h4>
											</div>
											<div class="card-body">
													<div class="table-responsive">
												<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
													<thead>
														<tr>
															<th>SL</th>
															<th>Student Name</th>
															<th>Department</th>
															<th>Registration No</th>
															<th>Mobile</th>
															<th>Room No</th>				
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															$query = "SELECT * FROM students";
															$query_run = mysqli_query($con, $query);

															if(mysqli_num_rows($query_run) > 0)
															{
																foreach($query_run as $student)
																{
																	?>
																	<tr>
																		<td><?= $student['sl']; ?></td>
																		<td><?= $student['name']; ?></td>
																		<td><?= $student['dep']; ?></td>
																		<td><?= $student['reg']; ?></td>
																		<td><?= $student['mobile']; ?></td>
																		<td><?= $student['room']; ?></td>
																		<td>
																			<a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
																			<a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
																			<form action="code.php" method="POST" class="d-inline">
																				<button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
																			</form>
																		</td>
																	</tr>
																	<?php
																}
															}
															else
															{
																echo "<h5> No Record Found </h5>";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>