<!DOCTYPE html>
<html lang="en">
<?php 
// session_start();
include('./config.php');
// ob_start();
// // if(!isset($_SESSION['system'])){
// 	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
// 	foreach($system as $k => $v){
// 		$_SESSION['system'][$k] = $v;
// 	}
// // }
// ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>student</title>
 	

<?php include('./header.php'); 

?>
<?php 
if(isset($_SESSION['login_id']))
header("location:studentpage.php");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}
	.text-black ,.text-center{
    color:black;
}
.control-label{
	color:black;
}
.size{
	font-size: 18Sspx;
}

</style>

<body class="bg-light">


<main id="main" >
  	
	  <div class="align-self-center w-100">
	<!-- <h4 class="text-black text-center"><b><?php echo $_SESSION['system']['name'] ?></b></h4> -->
    <h4 class="text-black text-center"><b>Student</b></h4> 
	  <div id="login-center" class=" row justify-content-center">
		  <div class="card col-md-4">
			  <div class="card-body">
				  <form id="login-form" >
					  <div class="form-group">
						  <label for="username" class="control-label">Username</label>
						  <input type="text" id="username" name="username" class="form-control">
						  
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Password</label>
						  <input type="password" id="password" name="password" class="form-control">
					  </div>
					  <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
				  </form>
			  </div>
			 
		  </div>
		  
	  </div>
	  <center><b class="size">If you are not register</b><br>
			  <a href="register.php" class="size">Register Here</a></center>
	  
	  </div>
</main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					
										location.href ='studentpage.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>