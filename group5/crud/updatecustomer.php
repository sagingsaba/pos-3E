<?php
require_once '../include/dbcon.php';
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION["Email"])) {
    header("location:../login.php");
    exit; 
}

// Redirect if customer ID is not provided
if (!isset($_GET['id'])) {
    header("location: customers.php");
    exit;
}

$customerId = $_GET['id'];

try {
    // Fetch customer data
    $pdoQuery = "SELECT * FROM customer_account WHERE id=:id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute(['id' => $customerId]);
    $customer = $pdoResult->fetch();
    
    // Redirect if customer not found
    if (!$customer) {
        header("location: customers.php");
        exit;
    }
} catch (PDOException $error) {
    // Handle database errors gracefully
    echo "Error: " . $error->getMessage();
    exit; 
}

// Handle form submission
if (!empty($_POST['modify'])) {
    try {
        $fullName = htmlspecialchars($_POST['FName']);
        $email = htmlspecialchars($_POST['Email']);
        $address = htmlspecialchars($_POST['Address']);
        $contact = htmlspecialchars($_POST['Contact']);
        $notes = htmlspecialchars($_POST['addNotes']);
        
        // Check if a new profile picture is uploaded
        $imgname = $customer['profpic']; // Initialize with existing image name
        if (!empty($_FILES['profile']["name"])) {
            $imgname = $_FILES["profile"]["name"];
            $imgtmpname = $_FILES["profile"]["tmp_name"];
            $imgfolder = '../uploaded_image/' . $imgname;
            move_uploaded_file($imgtmpname, $imgfolder);
        }
        
        // Update customer information in the database
        $pdoQuery = $pdoConnect->prepare("UPDATE customer_account SET Email = :email, Contact = :Contact, Address = :Address, FullName = :fullName, profpic = :img, Notes = :notes WHERE id = :id");
        $pdoResult = $pdoQuery->execute([
            'fullName' => $fullName,
            'email' => $email,
            'Address' => $address,
            'Contact' => $contact,
            'img' => $imgname,
            'notes' => $notes,
            'id' => $customerId
        ]);
        
        if ($pdoResult) {
            // Log the update action
            $loggedInUser = $_SESSION["Email"];
            $pdoQuery = "INSERT INTO `audit_trail`(`action`,`user`) VALUES ('User Updated', :user)";
            $pdoResult = $pdoConnect->prepare($pdoQuery);
            $pdoResult->execute([':user' => $loggedInUser]);
            
            // Redirect to customer list page after successful update
            header('location:../admin/customers.php');
            exit;
        } else {
            $message = 'Failed to update customer information.';
        }
    } catch (PDOException $error) {
        // Handle database errors gracefully
        echo "Error: " . $error->getMessage();
        exit; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminHub</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../admincss/styles.css">
    <link rel="stylesheet" href="../admincss/update.css">
</head>
<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../admin/Picsart_24-03-29_12-28-55-400.png">
            <span class="text">Clothing</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="../admin/dashboard.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
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

    <section id="content">
        <nav>
            <i class='bx bx-menu' ></i>
            <form action="#">
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <a href="#" class="profile">
                <img src="../image/default_profile.png">
            </a>
        </nav>

        <main>
            <div class="update-profile">
                <form action="updatecustomer.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
                    <?php
                        // Display customer's current profile picture
                        if (isset($customer['profpic'])) {
                            $imagePath = '../uploaded_image/' . $customer['profpic'];
                            echo '<img src="' . (file_exists($imagePath) ? $imagePath : "../image/profile.png") . '">';
                        } else {
                            echo '<img src="../image/profile.png">';
                        }
                        
                        // Display any error message
                        if (isset($message)) {
                            echo '<div class="message">' . $message . '</div>';
                        }
                    ?>
                    
                    <div class="flex">
                        <div class="inputBox">
                            <span>Fullname: </span>
                            <input type="text" name="FName" value="<?php echo $customer['FullName']; ?>" required placeholder="FullName" class="box">
                            <span>Email: </span>
                            <input type="email" name="Email" value="<?php echo $customer['Email']; ?>" required placeholder="Email" class="box">
                            <span>Address: </span>
                            <input type="text" name="Address" value="<?php echo $customer['Address']; ?>" required placeholder="Address" class="box">
                            <span>Contact: </span>
                            <input type="number" name="Contact" value="<?php echo $customer['Contact']; ?>" required placeholder="Contact" class="box">
                            <span>Notes: </span>
                            <input type="text" name="addNotes" value="<?php echo $customer['Notes']; ?>" placeholder="Notes" class="box">
                            <span>Change Profile: </span>
                            <input type="file" name="profile" accept="image/jpg, image/jpeg, image/png" class="box">
                        </div>
                    </div>
                    <input type="submit" name="modify" value="Save Changes" class="btn">
                    <a href="../admin/customers.php" class="delete-btn">Cancel</a>
                </form>
            </div>
        </main>
    </section>

    <script src="script.js"></script>
</body>
</html>
