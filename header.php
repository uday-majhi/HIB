<?php
	session_start();
	include'connection.php';
	$username = $_SESSION["username"];

	$sql = "SELECT agent_id FROM agent WHERE agent_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	header("Location: clientHome.php");
   }
	
?>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom:2">
	
            <div class="navbar-header">
                	
                <a class="navbar-brand" href="index.php">Surya Life Insurance</a>
            </div>

            <div class="header-right">
			
                 <a href="<?php echo "logout.php" ?>" class="btn btn-danger" title="Logout">Logout</a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php
									if(!isset($_SESSION["username"])){
										header("Location: index.php");
									}else {
										echo "welcome, ".$_SESSION["username"];
									}
								?>
                            <br />
                              
                            </div>
                        </div>

                    </li>


                 <li>
                      <a href="client.php">Clients</a >  
                 </li> 
                 <li>
                      <a href="agent.php">Agents</a>
                            
                 </li>   
                 <li>
                      <a href="policy.php">Policy</a>
                          
                 </li>     
                 <li>
                      <a href="nominee.php">Nominee</a>
                            
                 </li> 
                 <li>
                      <a href="payment.php">Payments</a>
                            
                 </li>    
                    
                     
                </ul>

            </div>
		

        </nav>
		 
		  
	
   