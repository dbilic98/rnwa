<?php
include 'backend/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BANK</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="index.php"></script>
    <script src="employee.js"></script>
</head>

<body>

</table>
<div class="container">
    <p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Employee</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Create employee</span></a>
                    <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                </th>
                <th>ID</th>
                <th>end_date</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>start_date</th>
                <th>title</th>
                <th>assigned_branch_id</th>
                <th>dept_id</th>
                <th>superior_emp_id</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result = mysqli_query($conn,"SELECT * FROM employee");
            $i=1;
            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr emp_id="<?php echo $row["emp_id"]; ?>">
                    <td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-emp_id="<?php echo $row["emp_id"]; ?>">
								<label for="checkbox2"></label>
							</span>
                    </td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["end_date"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["start_date"]; ?></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td><?php echo $row["assigned_branch_id"]; ?></td>
                    <td><?php echo $row["dept_id"]; ?></td>
                    <td><?php echo $row["superior_emp_id"]; ?></td>
                    <td>



                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons update" data-toggle="tooltip"
                               data-emp_id="<?php echo $row["emp_id"]; ?>"
                               data-end_date="<?php echo $row["end_date"]; ?>"
                               data-first_name="<?php echo $row["first_name"]; ?>"
                               data-last_name="<?php echo $row["last_name"]; ?>"
                               data-start_date="<?php echo $row["start_date"]; ?>"
                               data-title="<?php echo $row["title"]; ?>"
                               data-assigned_branch_id="<?php echo $row["assigned_branch_id"]; ?>"
                               data-dept_id="<?php echo $row["dept_id"]; ?>"
                               data-superior_emp_id="<?php echo $row["superior_emp_id"]; ?>"

                               title="Edit">&#xE254;</i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-emp_id="<?php echo $row["emp_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                                                                                                                  title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="employee_form">
                <div class="modal-header">
                    <h4 class="modal-title">Create employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="emp_id" id="emp_id" name="emp_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>end_date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>first_name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>last_name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>start_date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>assigned_branch_id</label>
                        <input type="number" id="assigned_branch_id" name="assigned_branch_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>dept_id</label>
                        <input type="number" id="dept_id" name="dept_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>superior_emp_id</label>
                        <input type="number" id="superior_emp_id" name="superior_emp_id" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-success" id="btn-add">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_form">
                <div class="modal-header">
                    <h4 class="modal-title">Update employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="emp_id_u" name="emp_id_u" class="form-control" required>
                    <div class="form-group">
                        <label>end_date</label>
                        <input type="date" id="end_date_u" name="end_date_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>first_name</label>
                        <input type="text" id="first_name_u" name="first_name_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>last_name</label>
                        <input type="text" id="last_name_u" name="last_name_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>start_date</label>
                        <input type="date" id="start_date_u" name="start_date_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" id="title_u" name="title_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>assigned_branch_id</label>
                        <input type="number" id="assigned_branch_id_u" name="assigned_branch_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>dept_id</label>
                        <input type="number" id="dept_id_u" name="dept_id_u" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>superior_emp_id</label>
                        <input type="number" id="superior_emp_id_u" name="superior_emp_id_u" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-info" id="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="emp_id_d" name="emp_id" class="form-control">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
