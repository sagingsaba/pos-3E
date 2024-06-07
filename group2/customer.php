<?php
$page_title = 'All Customers';
require_once('includes/load.php');
require_once('../group5/include/dbcon.php'); // Ensure this path is correct

// Check what level user has permission to view this page
page_require_level(1);

// Function to fetch all customers
function find_all_customer() {
    global $pdoConnect;
    $sql = "SELECT c.id, c.FullName as name, c.Email as username, 'Customer' as group_name, 
                   'Active' as status, '' as last_login, c.Address, c.Contact, 
                   c.TotalVisits, c.LoyaltyPoints, c.TotalPurchase, c.Notes, c.profpic
            FROM posfinale.customer_account c
            ORDER BY c.FullName ASC";
    
    try {
        $stmt = $pdoConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Log the error and return an empty array
        error_log("Error fetching customers: " . $e->getMessage());
        return [];
    }
}

// Pull out all customers from database
$all_users = find_all_customer();
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
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Customers</span>
       </strong>
         <a href="add_customer.php" class="btn btn-warning pull-right">Add New Customer</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center" style="width: 15%;">Customer</th>
            <th class="text-center" style="width: 10%;">Status</th>
            <th style="width: 20%;">Address</th>
            <th style="width: 10%;">Contact</th>
            <th style="width: 10%;">Total Visits</th>
            <th style="width: 10%;">Loyalty Points</th>
            <th style="width: 10%;">Total Purchase</th>
            <th style="width: 20%;">Notes</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($all_users)): ?>
          <tr>
            <td colspan="13" class="text-center">No customers found or an error occurred while fetching customers.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($all_users as $a_user): ?>
            <tr>
              <td class="text-center"><?php echo count_id(); ?></td>
              <td class="text-center">
                <?php if (!empty($a_user['profpic'])): ?>
                  <img src="<?php echo htmlspecialchars($a_user['profpic']); ?>" alt="Profile Picture" style="width:50px; height:50px;">
                <?php else: ?>
                  <img src="path/to/default/profile/pic.jpg" alt="No Profile Picture" style="width:50px; height:50px;">
                <?php endif; ?>
              </td>
              <td>
                <a href="view_customer.php?id=<?php echo (int)$a_user['id']; ?>">
                  <?php echo remove_junk(ucwords(htmlspecialchars($a_user['name']))); ?>
                </a>
              </td>
              <td><?php echo remove_junk(ucwords(htmlspecialchars($a_user['username']))); ?></td>
              <td class="text-center"><?php echo remove_junk(ucwords(htmlspecialchars($a_user['group_name']))); ?></td>
              <td class="text-center">
                <?php if ($a_user['status'] === 'Active'): ?>
                  <span class="label label-success"><?php echo "Active"; ?></span>
                <?php else: ?>
                  <span class="label label-danger"><?php echo "Deactive"; ?></span>
                <?php endif; ?>
              </td>
              <td><?php echo remove_junk(ucwords(htmlspecialchars($a_user['Address']))); ?></td>
              <td><?php echo remove_junk(htmlspecialchars($a_user['Contact'])); ?></td>
              <td><?php echo remove_junk(htmlspecialchars($a_user['TotalVisits'])); ?></td>
              <td><?php echo remove_junk(htmlspecialchars($a_user['LoyaltyPoints'])); ?></td>
              <td><?php echo remove_junk(htmlspecialchars($a_user['TotalPurchase'])); ?></td>
              <td><?php echo remove_junk(ucwords(htmlspecialchars($a_user['Notes']))); ?></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="edit_customer.php?id=<?php echo (int)$a_user['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                  <a href="delete_customer.php?id=<?php echo (int)$a_user['id']; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure you want to delete this customer?');">
                    <i class="glyphicon glyphicon-remove"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
