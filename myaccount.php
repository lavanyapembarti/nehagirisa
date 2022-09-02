<?php include('config.php');
//  session_start(); 
// $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
include('adminclass.php');
?>

<div class="rightinnerdiv">
    <div id="myaccount" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
                                                                echo "display:none";
                                                            } else {
                                                                echo "";
                                                            } ?>">
        <!-- <Button class="greenbtn" >My Account</Button> -->

         <?php 
 $i = $username;
 $student = $conn->query("SELECT * FROM student where id ='".$username."' ");
 while ($row = $student->fetch_assoc()) :
        // $u = new Action;
        // // $u->setconnection();
        // $u->userdetail($userloginid);
        // $recordset = $u->userdetail($userloginid);
        // foreach ($recordset as $row) {

        //     $id = $row[0];
        //     $name = $row[1];
        //     $email = $row[2];
        //     $pass = $row[3];
        //     $type = $row[4];
        // }
       
        ?>
        <p> <b><?php echo $row['id_no'] ?></b></p>

        <!-- <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
        <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
        <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $username ?></p> -->
       
    </div>
    <?php endwhile; ?>
</div>