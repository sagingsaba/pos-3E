<?php 
include '../include/customerSessionProfile.php';
require_once '../customer_barcode/vendor/autoload.php'; // Include the Composer autoload file

use Picqer\Barcode\BarcodeGeneratorPNG; 

function generateBarcodeImage($barcode) {
    try {
        // Initialize the barcode generator
        $generator = new BarcodeGeneratorPNG();
        
        // Generate the barcode image
        $barcodeImage = $generator->getBarcode($barcode, $generator::TYPE_CODE_128);
        
        // Output the barcode image
        return $barcodeImage;
    } catch (Exception $e) {
        return false; // Return false if there's an error generating the barcode image
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../admincss/customers.css">
    <link rel="stylesheet" href="../admincss/customer_profile.css">

	<title>AdminHub</title>
</head>
<body>


		<!-- SIDEBAR -->
		<section id="sidebar">
		<a href="#" class="brand">
			<img src="Picsart_24-03-29_12-28-55-400.png">
			<span class="text">Banana</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="customers.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Customers</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="profile">
				<img src="../image/default_profile.png">
			</a>
		</nav>
		<!-- NAVBAR -->

         <!-- MAIN -->
        <main>
            <div class="head-title">
                <!-- Head title content -->
            </div>
            
                    <div class="container">
						<div class="profile-card">
							<div class="profile-picture">
								<?php
									if (!empty($customer['profpic'])) {
										echo '<img src="../uploaded_image/' . $customer['profpic'] . '" class="profile-image">';
									} else {
										echo '<img src="../image/default_profile.png" class="profile-image">';
									}
								?>
								
							</div>
							
							<div class="profile-details">
								
								<div class="profile-header">
									<h3><div class="profile-value"><?php echo $customer['FullName']; ?></div></h3>
								</div>
								<div class="profile-label">Email:</div>
								<div class="profile-value"><?php echo $customer['Email']; ?></div>

								<div class="profile-label">Address:</div>
								<div class="profile-value"><?php echo $customer['Address']; ?></div>

								<div class="profile-label">Contact:</div>
								<div class="profile-value"><?php echo $customer['Contact']; ?></div>	

								<div class="profile-label">Notes:</div>
								<div class="profile-value"><?php echo $customer['Notes']; ?></div>

								<div class="row">
									<div class="column">
										<div class="profile-label">Total Visits</div>
										<div class="profile-value"><?php echo $customer['TotalVisits']; ?></div>
									</div>

									<div class="column">
										<div class="profile-label">Loyalty Points</div>
										<div class="profile-value"><?php echo $customer['LoyaltyPoints']; ?></div>
									</div>

									<div class="column">
										<div class="profile-label">Purchase Total</div>
										<div class="profile-value"><?php echo $customer['TotalPurchase']; ?></div>
									</div>
								</div>

								<?php if (!empty($customer['barcode_image'])): ?>
									<div class="profile-label">Barcode:</div>
									<div class="profile-value">
										<?php 
										$barcodeImage = generateBarcodeImage($customer['barcode_image']);
										if ($barcodeImage !== false): ?>
											<img src="data:image/png;base64,<?php echo base64_encode($barcodeImage); ?>" class="barcode">
										<?php else: ?>
											<div class="error">Failed to generate barcode image.</div>
										<?php endif; ?>
									</div>
								<?php else: ?>
									<div class="profile-label">Barcode:</div>
									<div class="profile-value">No barcode available.</div>
								<?php endif; ?>
							<!-- Buttons -->
							<div class="buttons-container">
								<a href="../crud/updatecustomer.php?id=<?php echo $customer['id']; ?>" class="button-navigator">Edit profile</a>
								<a href="customer_history.php?id=<?php echo $customer['id']; ?>" class="button-navigator">View History</a>
								<a href="loyalty_card.php?id=<?php echo $customer['id']; ?>" class="button-navigator">Redeem Points</a>
								<a href="loyalty_card.php?id=<?php echo $customer['id']; ?>" class="button-navigator">Loyalty Card</a>
							</div>
								 
							</div>
							
						</div>
                    </div>
                </li>
            </ul>
        </main>
        <!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="script.js"></script>
</body>
</html>