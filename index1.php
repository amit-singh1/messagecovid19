<?php
session_start();
include('dbcon.php');

?>

<?php 

												if(isset($_POST['s'])){


													unset($_SESSION['sender']);

        												$_SESSION['sender'] = $_POST['sender'];
//echo $_SESSION['sender']." ".$_SESSION['user'];
        								

        												//echo "Sender = ".$_SESSION['sender'];
/*
        												$queryy = "SELECT * FROM `$_SESSION[user]` WHERE user='".$_POST[sender]."'";
        												$result = mysqli_query($conn,$queryy);

        												while($row=mysqli_fetch_array($result)){

                													
		
											echo $row['msg'];


        												}*/

												}



?>

		<?php




												 //echo $_SESSION['sender'];

    					if(isset($_POST['subb'])){

    						//echo "user".$_SESSION[user];
    						//echo "$_SESSION[sender]";
    						//$_SESSION['message'] = "hi";
    						$m = $_POST['message'];
    						unset($_SESSION['message']);
    						$_SESSION['message'] = $_POST['message'];
    							
          		$q = "INSERT INTO `$_SESSION[user]`(msg,user,sendto) VALUES('".$_SESSION['message']."','".$_SESSION['user']."','".$_SESSION['sender']."')";
          						$rr = mysqli_query($conn,$q);

          						if($rr){

          							header("Location: index1.php");
          							


          						}



           // echo $_POST[message];
          		$qq = "INSERT INTO `$_SESSION[sender]`(msg,user,sendto) VALUES('".$_SESSION['message']."','".$_SESSION['user']."','".$_SESSION['sender']."')";
          						$rrr = mysqli_query($conn,$qq);
          							if($rrr){

          									header("Location:index1.php");
          									exit();

          							}

          					//$mssg = "You're Chatting with ".$_SESSION['sender'];
          				//	unset($_POST['message']);



   													 }?>

     								










<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Swipe – The Simplest Chat Platform</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body>
		<main>
			<div class="layout">
				<!-- Start of Navigation -->
				<div class="navigation" style="background-color:#8C80FC">
					<div class="container">
						<div class="inside">
							<div class="nav nav-tab menu">
								<div class="dropdown">
								<button class="btn">


											<?php
$data = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['user']."')");

while($row=mysqli_fetch_array($data)){

//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  class="img-thumnail" /> ';  

echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'" alt="avatar" height="50" width="50" class="avatar-x1" /> ';  

}















//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  height="20" width="20" class="avatar-x1" /> ';  

?>
								<!--	<img class="avatar-xl" src="dist/img/avatars/avatar-male-1.jpg" alt="avatar">--></button>

							    </div>
								
								<a href="#members" data-toggle="tab"><i class="material-icons">account_circle</i></a>
								<a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active">chat_bubble_outline</i></a>
								<a href="#notifications" data-toggle="tab" class="f-grow1"><i class="material-icons">notifications_none</i></a>
								<a href="#settings" data-toggle="tab"><i class="material-icons">settings</i></a>
							<a href="signout.html" class="btn power" ><i class="material-icons" >power_settings_new</i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Navigation -->
				<!-- Start of Sidebar -->
				<div class="sidebar" id="sidebar" >
					<div class="container">
						<div class="col-md-12">
							<div class="tab-content">
								<!-- Start of Contacts -->
								<div class="tab-pane fade" id="members">
									<div class="search">
										<form class="form-inline position-relative">
											<input type="search" class="form-control" id="people" placeholder="Search for people...">
											<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
										</form>
										
									</div>
									<div class="list-group sort">
										<button class="btn filterMembersBtn active show" data-toggle="list" data-filter="all">All</button>
										
									</div>						
									<div class="contacts">
										<h1>USERS</h1>
										<div class="list-group" id="contacts" role="tablist" style="color:blue">
											

													<?php

																	$resu = mysqli_query($conn,"SELECT * FROM registration");
																	while($row = mysqli_fetch_array($resu)){

																			echo $row['email'];
																			echo "<br><br><hr>";

																	}







													?>








										</div>
									</div>
								</div>
								<!-- End of Contacts -->
								<!-- Start of Discussions -->
								<div id="discussions" class="tab-pane fade active show">
									<div class="search">




										






										<form class="form-inline position-relative" method="post">
										<input type="search" class="form-control" id="conversations" placeholder="Search for conversations..." name="sender">
									<button type="submit" class="btn btn-link loop" name="s"><i class="material-icons">search</i></button>
										</form>
										
									</div>
									<div class="list-group sort">
										<button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
										
									</div>						
									<div class="discussions">
										<h1>Discussions</h1>
										<div class="list-group" id="chats" role="tablist">
											<a href="#list-chat" class="filterDiscussions all unread single active" id="list-chat-list" data-toggle="list" role="tab">
												
												Search your contact and the chat history will be displayed on the right side.
											<br>	
											
												
												
										</div>
									</div>
								</div>
								<!-- End of Discussions -->
								<!-- Start of Notifications -->
								<div id="notifications" class="tab-pane fade">
									<div class="search">
										<form class="form-inline position-relative">
											<input type="search" class="form-control" id="notice" placeholder="Filter notifications...">
											<button type="button" class="btn btn-link loop"><i class="material-icons filter-list">filter_list</i></button>
										</form>
									</div>
									<div class="list-group sort">
										<button class="btn filterNotificationsBtn active show" data-toggle="list" data-filter="all">All</button>
										
									</div>						
									<div class="notifications">
										<h1>Notifications</h1>
										<div class="list-group" id="alerts" role="tablist">
											<a href="#" class="filterNotifications all latest notification" data-toggle="list">
												
												
													<?php 


															if($_SESSION['sender']!=""){


													  echo "You started Chatting with  user : ".$_SESSION['sender'];   

													  		}

													  			else {echo "Click on the message icon to start chatting !";}



																			?>

											</a>
										</div>
									</div>
								</div>
								<!-- End of Notifications -->
								<!-- Start of Settings -->
								<div class="tab-pane fade" id="settings">			
									<div class="settings">
										<div class="profile">
											




															<?php
$data = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['user']."')");

while($row=mysqli_fetch_array($data)){

//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  class="img-thumnail" /> ';  

echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'" alt="avatar" height="50" width="50" class="avatar-x1" /> ';  

}















//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  height="20" width="20" class="avatar-x1" /> ';  

?>






											<h1><?php echo "<br>"; echo $_SESSION['user']; ?></h1>
											<span>          



														<?php


																	
														$r = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['user']."')");

																	while($row=mysqli_fetch_assoc($r)){

																			echo $row['status'];


																	}






														?>















											</span>
											
										</div>
										<div class="categories" id="accordionSettings">
											<h1>Settings</h1>
											<!-- Start of My Account -->
											<div class="category">
												<a href="#" class="title collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													<i class="material-icons md-30 online">person_outline</i>
													<div class="data">
														<h5>My Account</h5>
														<p>Update your profile details</p>
													</div>
													<i class="material-icons">keyboard_arrow_right</i>
												</a>
												<div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionSettings">
													<div class="content">
														<div class="upload">
															<div class="data">


																				<?php
$data = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['user']."')");

while($row=mysqli_fetch_array($data)){

//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  class="img-thumnail" /> ';  

echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'" alt="avatar" height="30" width="30" class="avatar-x1" /> ';  

}















//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  height="20" width="20" class="avatar-x1" /> ';  

?>







						<p  style="margin-left:15px">For best results, use an image at least 256px by 256px in either .jpg or .png format!</p>

															</div>





																<?php


							if(isset($_POST['btns'])){

  								$pic = addslashes(file_get_contents($_FILES["filex"]["tmp_name"]));
  												//$pics = $_POST['filex'];
//$xx = $_SESSION['user'];
//echo $xx;

  								if(mysqli_query($conn,"UPDATE registration SET pic='$pic' WHERE (email='".$_SESSION[user]."') ")){

     										echo "Added";

									}
								
								else{

    									     echo "Not";

									}



													}





																?>	







															
															
															<form method="post" enctype="multipart/form-data">
 
    															<input type="file"   name="filex">
    															<br>
  																<input type="submit"  name="btns">
															</form>








															















														</div>


<?php
if(isset($_POST['btnxx'])){       
	$status = $_POST['status'];
	
if(mysqli_query($conn,"UPDATE registration SET status='$status' WHERE (email='".$_SESSION['user']."')  ")){

		echo "Added";


}

}
?>



														<form method="post">
															
															
															<div class="field">
																<label for="location">Status</label>
						<input name="status" type="text" class="form-control" id="location" placeholder="Ex. How're You Feeling?"  required>
															</div>
															
															<button type="submit" class="btn button w-100" name="btnxx">Apply</button>
														</form>
													</div>
												</div>
											</div>
											<!-- End of My Account -->
											
											
											
											
											
											
											<!-- Start of Logout -->
											<div class="category">
												<a href="signout.html" class="title collapsed">

													
													<i class="material-icons md-30 online">power_settings_new</i>
													<div class="data">
														<h5>Power Off</h5>
														<p>Log out of your account</p>
													</div>
													<i class="material-icons">keyboard_arrow_right</i>
												</a>
											</div>
											
											<!-- End of Logout -->
										</div>
									</div>
								</div>
								<!-- End of Settings -->
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
				<!-- Start of Add Friends -->
				
				<!-- End of Add Friends -->
				<!-- Start of Create Chat -->
				
				<!-- End of Create Chat -->
				<div class="main">
					<div class="tab-content" id="nav-tabContent">
						<!-- Start of Babble -->
						<div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat1" style="background-color:#8C80FC;color:white;height:100%">
								<div class="top" style="background-color:#8C80FC">
									<div class="container" style="background-color:#8C80FC">
										<div class="col-md-12" style="background-color:#8C80FC">
											<div class="inside" style="background-color:#8C80FC">
												<a href="#"><!--<img class="avatar-md" src="dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">-->
													

														<?php



											$data = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['sender']."')");

while($row=mysqli_fetch_array($data)){

//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  class="img-thumnail" /> ';  

echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'" alt="avatar" height="50" width="50" class="avatar-x1" /> ';  

}








														?>













												</a>
												
												<div class="data" style="margin-left: 15px" ><?php echo $_SESSION['sender']; ?></a></h5>
													<span>Active now</span>
												</div>
						<button  class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>
												<button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button>
												<div class="dropdown">
													<button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button>
													<div class="dropdown-menu dropdown-menu-right">
													
													<a href="tel:<?php echo $_SESSION['p']; ?>" class="btn option"><i class="material-icons md-30">mic</i></a>
														<a href="vc1.html" class="btn option"><i class="material-icons md-30">videocam</i></a>
									
														
														<hr>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="content" id="content" style="float:left;color:white;height:450px;">
									<div class="container" style="background-color:#8C80FC">
										<div class="col-md-12" style="background-color:#8C80FC;">
											
											
											
									

 										

											<!-- MESSAGES here  -->
											
											
											
											
											
										</div>
									</div>
									<?php




												 //echo $_SESSION['sender'];

    			/*		if(isset($_POST['subb'])){

    						//echo "user".$_SESSION[user];
    						//echo "$_SESSION[sender]";
    						//$_SESSION['message'] = "hi";
    						$m = $_POST['message'];
    						unset($_SESSION['message']);
    						$_SESSION['message'] = $_POST['message'];
    							
          		$q = "INSERT INTO `$_SESSION[user]`(msg,user,sendto) VALUES('".$_SESSION['message']."','".$_SESSION['user']."','".$_SESSION['sender']."')";
          						$rr = mysqli_query($conn,$q);

          						if($rr){

          							header("Location: index.php");
          							exit();


          						}



           // echo $_POST[message];
          		$qq = "INSERT INTO `$_SESSION[sender]`(msg,user,sendto) VALUES('".$_SESSION['message']."','".$_SESSION['user']."','".$_SESSION['sender']."')";
          						$rrr = mysqli_query($conn,$qq);


          					//$mssg = "You're Chatting with ".$_SESSION['sender'];
          				//	unset($_POST['message']);



   													 }

     								

$queryy = "SELECT * FROM `$_SESSION[user]` WHERE (user='".$_SESSION['user']."' AND sendto= '".$_SESSION['sender']."' OR user='".$_SESSION['sender']."' AND sendto= '".$_SESSION['user']."') ";
       								$result = mysqli_query($conn,$queryy);

//echo $row['msg'][0];
        								
	while($row=mysqli_fetch_array($result)){
//echo $row['msg'][0];

        										
        										//echo $row['user']." : ".$row['msg']."<br>";
        								echo $row['user']." : ".$row['msg']."<br>";
        								}
               									 //echo "<div style='float:left'>".$row['msg']."</div>";
               									 //echo "<br>";*/

        								
$queryy = "SELECT * FROM `$_SESSION[user]` WHERE (user='".$_SESSION['user']."' AND sendto= '".$_SESSION['sender']."' OR user='".$_SESSION['sender']."' AND sendto= '".$_SESSION['user']."') ";
       								$result = mysqli_query($conn,$queryy);

//echo $row['msg'][0];
        								
	while($row=mysqli_fetch_array($result)){
//echo $row['msg'][0];

        										
        										//echo $row['user']." : ".$row['msg']."<br>";
        								echo $row['user']." : ".$row['msg']."<br>";
        								}
               									 //echo "<div style='float:left'>".$row['msg']."</div>";
               									 //echo "<br>";

        								






									







									?>
								</div>





									<?php




												 //echo $_SESSION['sender'];

    				/*	if(isset($_POST['subb'])){

          						$q = "INSERT INTO `$_SESSION[user]`(msg,user) VALUES('".$_POST['message']."','".$_SESSION['sender']."')";
          						$rr = mysqli_query($conn,$q);
           // echo $_POST[message];
          						$qq = "INSERT INTO `$_SESSION[sender]`(msg,user) VALUES('".$_POST['message']."','".$_SESSION['user']."')";
          						$rrr = mysqli_query($conn,$qq);
   													 }


     								$queryy = "SELECT * FROM `$_SESSION[sender]` WHERE user='".$_SESSION['user']."'";
       								$result = mysqli_query($conn,$queryy);

        							while($row=mysqli_fetch_array($result)){

        										//echo "<div style=""></div>";
               									 echo $row['msg'];
               									 echo "<br>";

        								}



        								
*/






									?>

















								<div class="container" style="background-color:#8C80FC">
									<div class="col-md-12" style="background-color:#8C80FC">

										<div class="bottom" style="margin-top:500px;background-color:#8C80FC">
											<form class="position-relative w-100" method="post">
	<textarea style="background-color:white;border-style:solid;border-color: white;border-right:0px;margin-bottom:25px" class="form-control" placeholder="Start typing for reply..." rows="1" name="message"></textarea>
												<button style="margin-bottom: 25px" class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
												<button style="margin-bottom: 25px" type="submit" class="btn send" name="subb"><i class="material-icons">send</i></button>
											</form>
											<label>
												<input type="file">
									<span style="margin-bottom: 25px" class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
											</label> 
										</div>
									</div>
								</div>
							</div>
							<!-- End of Chat -->
							<!-- Start of Call -->
							<div class="call" id="call1">
								<div class="content">
									<div class="container">
										<div class="col-md-12">
											<div class="inside">
												<div class="panel">
													<div class="participant">
														<!--<img class="avatar-xxl" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">-->


<?php
$data = mysqli_query($conn,"SELECT * FROM registration WHERE (email='".$_SESSION['sender']."')");

while($row=mysqli_fetch_array($data)){

//echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'"  class="img-thumnail" /> ';  

echo ' <img src="data:image/png;base64,'.base64_encode($row['pic'] ).'" alt="avatar" height="150" width="150" class="avatar-x1" /> ';  

}








														?>









														<span><br>Connecting<br>Pick mode of calling from below</span>
													</div>							
													<div class="options">
														<a href="tel:123-456-7890" class="btn option"><i class="material-icons md-30">mic</i></a>
														<a href="vc1.html" class="btn option"><i class="material-icons md-30">videocam</i></a>
									
													</div>
										<a href="index.php" class="btn option call-end"><i class="material-icons md-30">call_end</i></a>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End of Call -->
						</div>
						<!-- End of Babble -->
						<!-- Start of Babble -->
							<!-- Start of Chat -->
							
							<!-- End of Chat -->
							<!-- Start of Call -->
							
							<!-- End of Call -->
						</div>
						<!-- End of Babble -->
						<!-- Start of Babble -->
						<div class="babble tab-pane fade" id="list-request" role="tabpanel" aria-labelledby="list-request-list">
							<!-- Start of Chat -->
							<div class="chat" id="chat3">
								<div class="top">
									<div class="container">
										<div class="col-md-12">
											<div class="inside">
												<a href="#"><img class="avatar-md" src="dist/img/avatars/avatar-female-6.jpg" data-toggle="tooltip" data-placement="top" title="Louis" alt="avatar"></a>
												<div class="status">
													<i class="material-icons offline">fiber_manual_record</i>
												</div>
												<div class="data">
													<h5><a href="#">Louis Martinez</a></h5>
													<span>Inactive</span>
												</div>
												<button class="btn disabled d-md-block d-none" disabled><i class="material-icons md-30">phone_in_talk</i></button>
												<button class="btn disabled d-md-block d-none" disabled><i class="material-icons md-36">videocam</i></button>
												<button class="btn d-md-block disabled d-none" disabled><i class="material-icons md-30">info</i></button>
												<div class="dropdown">
													<button class="btn disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled><i class="material-icons md-30">more_vert</i></button>
													<div class="dropdown-menu dropdown-menu-right">
														<button class="dropdown-item"><i class="material-icons">phone_in_talk</i>Voice Call</button>
														<button class="dropdown-item"><i class="material-icons">videocam</i>Video Call</button>
														<hr>
														<button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
														<button class="dropdown-item"><i class="material-icons">block</i>Block Contact</button>
														<button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="container">
									<div class="col-md-12">
										<div class="bottom">
											<form class="position-relative w-100">
												<textarea class="form-control" placeholder="Messaging unavailable" rows="1" disabled></textarea>
												<button class="btn emoticons disabled" disabled><i class="material-icons">insert_emoticon</i></button>
												<button class="btn send disabled" disabled><i class="material-icons">send</i></button>
											</form>
											<label>
												<input type="file" disabled>
												<span class="btn attach disabled d-sm-block d-none"><i class="material-icons">attach_file</i></span>
											</label> 
										</div>
									</div>
								</div>
							</div>
							<!-- End of Chat -->
						</div>
						<!-- End of Babble -->
					</div>
				</div>
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/swipe.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script>
			function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
			scrollToBottom(document.getElementById('content'));

		//	history.pushState({}, "","");
		</script>
	</body>

</html>