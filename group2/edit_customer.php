<?php
$page_title = 'Edit Customer';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php');

// Check what level user has permission to view this page
page_require_level(1);

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Function to fetch customer details by ID
    function find_customer_by_id($id) {
        global $pdoConnect;
        $sql = "SELECT * FROM customer_account WHERE id = :id";
        
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error and return null
            error_log("Error fetching customer details: " . $e->getMessage());
            return null;
        }
    }

    // Fetch customer details
    $customer = find_customer_by_id($customer_id);

    // Check if the form has been submitted
    if (isset($_POST['edit_customer'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $notes = $_POST['notes'];

        // Handle file upload for profile picture
        $profile_pic = $customer['profpic']; // Default to the existing profile picture
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
                    redirect('edit_customer.php?id=' . $customer_id, false);
                }
            } else {
                $session->msg('d', 'Invalid file type. Only JPG, JPEG, PNG, and GIF types are allowed.');
                redirect('edit_customer.php?id=' . $customer_id, false);
            }
        }

        // Update customer information in the database
        $sql = "UPDATE customer_account SET FullName = :name, Email = :email, Address = :address, Contact = :contact, Notes = :notes, profpic = :profpic WHERE id = :id";
        try {
            $stmt = $pdoConnect->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':address' => $address,
                ':contact' => $contact,
                ':notes' => $notes,
                ':profpic' => $profile_pic,
                ':id' => $customer_id
            ]);
            $session->msg('s', "Customer updated successfully.");
            redirect('customer.php', false);
        } catch (PDOException $e) {
            $session->msg('d', 'Failed to update customer.');
            error_log("Error updating customer: " . $e->getMessage());
            redirect('edit_customer.php?id=' . $customer_id, false);
        }
    }
} else {
    // Redirect if customer ID is not provided
    redirect('customer.php');
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
          <span>Edit Customer</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="edit_customer.php?id=<?php echo (int)$customer['id']; ?>" enctype="multipart/form-data" class="clearfix">
          <div class="form-group">
            <label for="name" class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($customer['FullName']); ?>" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($customer['Email']); ?>" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="address" class="control-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($customer['Address']); ?>" placeholder="Address">
          </div>
          <div class="form-group">
            <label for="contact" class="control-label">Contact</label>
            <input type="text" class="form-control" name="contact" value="<?php echo htmlspecialchars($customer['Contact']); ?>" placeholder="Contact">
          </div>
          <div class="form-group">
            <label for="notes" class="control-label">Notes</label>
            <textarea class="form-control" name="notes" placeholder="Notes"><?php echo htmlspecialchars($customer['Notes']); ?></textarea>
          </div>
          <div class="form-group">
            <label for="profpic" class="control-label">Profile Picture</label>
            <input type="file" class="form-control" name="profpic" placeholder="Upload picture">
            <?php if (!empty($customer['profpic'])): ?>
              <img src="<?php echo htmlspecialchars($customer['profpic']); ?>" alt="Profile Picture" style="width:100px; height:100px;">
            <?php endif; ?>
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="edit_customer" class="btn btn-primary">Update Customer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
