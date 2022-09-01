<?php
	session_start();
	include'connection.php';
	$username = $_SESSION["email"];

	// $sql = "SELECT agent_email FROM agent WHERE agent_email = '$username'";
	// $result = $conn->query($sql);
// 	if ($result->num_rows > 0) {
//         header("Location: home.php");
//     }
//     else {
// 	header("Location: index.php");
//    }
	
?>

<body>
    <div id="wrapper">
        <nav id="top-nav" class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom:2">



            <a class="navbar-brand" href="index.php">Health Insurance Board</a>


            <div class="btn btn-success">
                <?php
									if(!isset($_SESSION["email"])){
										header("Location: index.php");
									}else {
										echo "welcome, ".$_SESSION["email"];
									}
								?>
            </div>

            <a href="addClient.php" class="btn btn-primary">Add Clients</a>
            <a href="addAgent.php" class="btn btn-primary">Add Agents</a>
            <a href=" policy.php" class="btn btn-primary">Policy</a>



            <div class=" header-right">

                <a href="<?php echo "logout.php" ?>" class="btn btn-danger" title="Logout">Logout</a>

            </div>

        </nav>
        <!-- <nav id="side-nav" class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">

                            <div class="inner-text">
                                <?php
									if(!isset($_SESSION["email"])){
										header("Location: index.php");
									}else {
										echo "welcome, ".$_SESSION["email"];
									}
								?>
                                <br />

                            </div>
                        </div>

                    </li>


                    <li>
                        <a href="client.php">Clients</a>
                    </li>
                    <li>
                        <a href="agent.php">Agents</a>

                    </li>
                    <li>
                        <a href="policy.php">Policy</a>

                    </li>
                    <li>
                        <a href="nominee.php">Family Members</a>

                    </li>
                    <li>
                        <a href="payment.php">Payments</a>
                    </li>

                </ul>

            </div>


        </nav> -->