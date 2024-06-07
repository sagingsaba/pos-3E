<?php
$page_title = 'Add Customer';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php'); // Ensure this path is correct

// Check what level user has permission to view this page
page_require_level(1);

if(isset($_POST['add_customer'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $notes = $_POST['notes'];
    $Barcode = $_POST['addBarcode'];
    // $Barcode = "!". "2024".(rand(0,999999999)); // random barcode
    
    // Handle file upload
    $profile_pic = '';
    if (isset($_FILES['profpic']) && $_FILES['profpic']['error'] == 0) {
        // File upload directory
        $upload_dir = 'uploads/customerprofile/';

        // Allowed file extensions
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

        // Get file extension
        $file_ext = strtolower(pathinfo($_FILES['profpic']['name'], PATHINFO_EXTENSION));

        // Check if file extension is allowed
        if (in_array($file_ext, $allowed_ext)) {
            // Generate unique filename
            $profile_pic = $upload_dir . uniqid() . '.' . $file_ext;

            // Move uploaded file to destination directory
            if (!move_uploaded_file($_FILES['profpic']['tmp_name'], $profile_pic)) {
                $session->msg('d', 'Failed to move uploaded file.');
                redirect('add_customer.php', false);
            }
        } else {
            $session->msg('d', 'Invalid file type. Only JPG, JPEG, PNG, and GIF types are allowed.');
            redirect('add_customer.php', false);
        }
    }

    if(empty($name) || empty($email)){
        $session->msg('d', 'Name and Email are required fields.');
        redirect('add_customer.php', false);
    } else {
        $sql  = "INSERT INTO customer_account (barcode_image, FullName, Email, Address, Contact, Notes, profpic)";
        $sql .= " VALUES (:barcode, :name, :email, :address, :contact, :notes, :profpic)";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->execute([
                ':barcode' => $Barcode,
                ':name' => $name,
                ':email' => $email,
                ':address' => $address,
                ':contact' => $contact,
                ':notes' => $notes,
                ':profpic' => $profile_pic
            ]);
            $session->msg('s', "Customer added successfully.");
            redirect('customer.php', false);
        } catch (PDOException $e) {
            $session->msg('d', 'Sorry, failed to add customer.');
            error_log("Error adding customer: " . $e->getMessage());
            redirect('add_customer.php', false);
        }
    }
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Customer</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_customer.php" enctype="multipart/form-data" class="clearfix">
          <div class="form-group">
            <label for="name" class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="address" class="control-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address">
          </div>
          <div class="form-group">
            <label for="contact" class="control-label">Contact</label>
            <input type="text" class="form-control" name="contact" placeholder="Contact">
          </div>
          <div class="form-group">
            <label for="notes" class="control-label">Notes</label>
            <textarea class="form-control" name="notes" placeholder="Notes"></textarea>
          </div>
          <div class="form-group">
            <label for="Barcode" class="control-label">Barcode</label>
            <textarea class="form-control" name="addBarcode" placeholder="Barcode"></textarea>
          </div>
          <div class="form-group">
            <label for="profpic" class="control-label">Profile Picture</label>
            <input type="file" class="form-control" name="profpic" placeholder="upload picture">
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="add_customer" class="btn btn-primary">Add Customer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
