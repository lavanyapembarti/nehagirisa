


<?php include('config.php'); ?>
<style>
    input[type=checkbox] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3);
        /* IE */
        -moz-transform: scale(1.3);
        /* FF */
        -webkit-transform: scale(1.3);
        /* Safari and Chrome */
        -o-transform: scale(1.3);
        /* Opera */
        transform: scale(1.3);
        padding: 10px;
        cursor: pointer;
    }
</style>
<div class="container-fluid">

    <div class="col-lg-14">
        <div class="row mb-4 mt-4">
            <div class="col-md-14">

            </div>
        </div>
        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header">
                        <b>List of Students </b>
                        <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="manage_students.php" id="new_student">
                                <i class="fa fa-plus"></i> New
                            </a></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                <th class="text-center">#</th>
                                    <th> Id No</th>
                                    <th> Full Name</th>
                                    <th>Mother Name</th>
                                    <th>Address</th>            
                                    <th>email</th>
                                    <th>Phone number</th>
                                    <th>gender</th>
                                    <th>Course</th>
                                    <th>Birth Date</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $student = $conn->query("SELECT * FROM student order by name asc ");
                                while ($row = $student->fetch_assoc()) :
                                ?>
                                    <tr>

                                        <td class="text-center"><?php echo $i++ ?></td>

                                        <td>
                                            <p> <b><?php echo $row['id_no'] ?></b></p>
                                        </td>
                                        <td>
                                            <p> <b><?php echo ucwords($row['name']) ?></b></p>
                                        
                                            <p> <b><?php echo ucwords($row['lastname']) ?></b></p>
                                          <p> <b><?php echo ucwords($row['mname']) ?></b></p>
                                        </td>
                                        <td>
                                            <p> <b><?php echo ucwords($row['mothername']) ?></b></p>
                                        </td>
                                        <td class="">
                                            <p><small><i><b><?php echo $row['address'] ?></i></small></p>
                                        
                                            <p><small> <i><b><?php echo $row['pincode'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['email'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['phonenumber'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['gender'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['course'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['bithday'] ?></i></small></p>
                                        </td>
                                        <td class="">
                                            <p><small> <i><b><?php echo $row['username'] ?></i></small></p>
                                        </td>
                                         <td class="text-center">
                                        <!-- <span ><a class="btn btn-sm btn-outline-primary edit_student" href="manage_studentedit.php" id="new_student"> -->
                                 <!-- EDIT -->
                            <!-- </a></span> --> 
                                            <!-- <button class="btn btn-sm btn-outline-primary edit_student" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>  -->
                                            <button class="btn btn-sm btn-outline-danger delete_student" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>

</div>
<style>
    td {
        vertical-align: middle !important;
    }

    td p {
        margin: unset
    }

    img {
        max-width: 100px;
        max-height: 150px;
    }
</style>
<script>
    $(document).ready(function() {
        $('table').dataTable()
    })
    // $('#new_student').click(function() {
    //     uni_modal("New Student ", "manage_student.php", "mid-large")

    // })
    // $('.edit_student').click(function() {
    //     uni_modal("Manage Student  Details", "manage_studentsedit.php?id=" + $(this).attr('data-id'), "mid-large")

    // })
    $('.delete_student').click(function() {
        _conf("Are you sure to delete this Student ?", "delete_student", [$(this).attr('data-id')])
    })

    function delete_student($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_student',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 1500)

                }
            }
        })
    }
</script>