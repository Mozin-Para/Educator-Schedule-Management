<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('admin/db_connect.php');
ob_start();
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Teacher Tracking System</title>
    

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php");

?>

</head>
<style>
    body{
        width: 100%;
        height: calc(100%);
        position:fixed;
    }
    #main{
        width: calc(100%);
        height: calc(100%);
        display:flex;
        align-items:center;
        justify-content:center
    }
    #login{
        
    }
    
.left-bottom-button {
    position: fixed;
    bottom: 20px;
    left: 20px;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.left-bottom-button:hover {
    background-color: #0056b3;
}

</style>

<body>


  <main id="main" class=" bg-dark">
        <div id="login" class="col-md-4">
            <div class="card">
                <div class="card-body">
                        
                    <form id="login-form" >
                      <h4><b>Welcome To Teacher Tracking System</b></h4>
                        <div class="form-group">
                            <label for="id_no" class="control-label">Please enter your Faculty ID No.</label>
                            <input type="number" id="id_no" name="id_no" class="form-control" required>
                        </div>
                        <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Check Now</button></center>
                    </form>
                </div>
            </div>
        </div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher ID</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .right-side-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .right-side-button:hover {
            background-color: #0056b3;
        }
 
 
    .bottom-right-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .bottom-right-button:hover {
        background-color: #0056b3;
    }
</style>


</head>
<body>
    <a href="#" class="right-side-button" data-toggle="modal" data-target="#teacherIdModal">Teacher ID</a>

    <!-- Modal -->
    <div class="modal fade" id="teacherIdModal" tabindex="-1" aria-labelledby="teacherIdModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherIdModalLabel">Teacher ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="teacherid.php" width="100%" height="500px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<a href="https://teachersrackingsystem.microtechedu.in/admin" class="left-bottom-button">Admin</a>
<a href="#" class="bottom-right-button" data-toggle="modal" data-target="#cronLogModal">Cron Log</a>

<!-- Cron Log Modal -->
<div class="modal fade" id="cronLogModal" tabindex="-1" aria-labelledby="cronLogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cronLogModalLabel">Reminder/Cron Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="https://teachersrackingsystem.microtechedu.in/admin/cron_log.txt" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>



</body>
<script>
    $('#login-form').submit(function(e){
        e.preventDefault()
        $('#login-form button[type="submit"]').attr('disabled',true).html('Logging in...');
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
        $.ajax({
            url:'admin/ajax.php?action=login_faculty',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err)
        $('#login-form button[type="submit"]').removeAttr('disabled').html('Check Now');

            },
            success:function(resp){
                if(resp == 1){
                    location.href ='index.php';
                }else{
                    $('#login-form').prepend('<div class="alert alert-danger">ID Number is incorrect.</div>')
                    $('#login-form button[type="submit"]').removeAttr('disabled').html('Check Now');
                }
            }
        })
    })
</script>   
</html>
<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('admin/db_connect.php');
ob_start();
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Teacher Tracking System</title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
		position:fixed;
	}
	#main{
		width: calc(100%);
	    height: calc(100%);
		display:flex;
		align-items:center;
		justify-content:center
	}
	#login{
		
	}
	

</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login" class="col-md-4">
  			<div class="card">
  				<div class="card-body">
  						
  					<form id="login-form" >
					  <h4><b>Welcome To Teacher Tracking System</b></h4>
  						<div class="form-group">
  							<label for="id_no" class="control-label">Please enter your Faculty ID No.</label>
  							<input type="text" id="id_no" name="id_no" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Check Now</button></center>
  					</form>
  				</div>
  			</div>
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
			url:'admin/ajax.php?action=login_faculty',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">ID Number is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>