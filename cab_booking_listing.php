<?php include ('include/header.php'); ?>
  <div class="container">
  <?php 
$selectedCity="";
global $wpdb;
global $table_prefix;
$id= (isset($_GET['id']) ? $_GET['id'] : '');
$table = $table_prefix. 'cab';
$sql = "SELECT * FROM $table WHERE id=$id;";
$result = $wpdb->get_results($sql);
if($_GET['form'] == 'true'){ 
foreach ($result as $print){ 
  $selectedCity= $print->cabs;
    ?>
    <form id="update" method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $print->name;?>">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" value="<?php echo $print->email; ?>"></div>
    <div class="form-group">
      <label>Cabs</label>
      <select id="cab" class="form-control" name="cab" >
      <option selected>Choose Cabs</option>
      <option value="Regular Cab"<?php echo ($selectedCity == "Regular Cab") ? "selected" : ""; ?>>Regular Cab</option>
      <option value="Extended Cab" <?php echo ($selectedCity == "Extended Cab") ? "selected" : ""; ?>>Extended Cab</option>
      <option value="Crew Cab" <?php echo ($selectedCity == "Crew Cab") ? "selected" : ""; ?>>Crew Cab</option>
  </select>
    </div>
    <div class="form-group">
      <label>Date And Time</label>
    <input id="input" width="234" name="datetime" value="<?php echo $print->datetime; ?>"/>
    </div>
        <div class="form-group">
    <label>Message</label>
    <textarea class="form-control" rows="3" name="message" id="message"><?php echo $print->message; ?></textarea>
  </div>
  <input type="hidden" id="id" value="<?php echo $print->id; ?>"/>
    <input type="hidden" id="path" value="http://localhost/wordpress/wp-content/plugins/cab-booking/ajax/update.php" />
    <input type="hidden" id="delete" value="http://localhost/wordpress/wp-content/plugins/cab-booking/ajax/delete.php" />
   <button type="submit" class="btn btn-primary" id="update" name="update">update</button>
</form>

<?php }?>
<?php }else {
global $wpdb, $table_prefix;
$table = $table_prefix. 'cab';
$sql = "SELECT * FROM $table";
$result = $wpdb->get_results( $sql );
?>

<table class ='table'>
<thead>
<tr>
<!-- <th scope //= 'col'>Id</th> -->
<th scope = 'col'>Name</th>
<th scope = 'col'>Email</th>
<th scope = 'col'>Cabs</th>
<th scope = 'col'>Datetime</th>
<th scope = 'col'>Message</th>
<th scope = 'col'>Update</th>
<th scope = 'col'>Delete</th>
</tr>
</thead>
<tbody>
<?php foreach ( $result as $var ) {
    ?>
    <tr>
    <!-- <td><?php //echo $var->id ?></td> -->
    <td><?php echo $var->name ?></td>
    <td><?php echo $var->email ?></td>
    <td><?php echo $var->cabs?></td>
    <td><?php echo $var->datetime?></td>
    <td><?php echo $var->message?></td>
        <td>
    <a href="http://localhost/wordpress/wp-admin/admin.php?page=cab-booking%2Fcab-booking.php&id=<?php echo $var->id; ?>&form=true">
        <button type="button" class="btn btn-primary">Update</button>
    </a>
</td>
    <td>
  
    <a href="http://localhost/wordpress/wp-admin/admin.php?page=cab-booking%2Fcab-booking.php&id=<?php echo $var->id; ?>">
        <button type="button" class="btn btn-danger">Delete</button>
    </a>
</td>

    </tr>
    <?php }
    ?>
    </tbody>
    </table>
   <?php } ?>
</div>
<?php  wp_enqueue_script( 'updateajax', plugin_dir_url(__FILE__).'js/updateajax.js',NULL,NULL, true ); ?>
<?php  wp_enqueue_script( 'deleteajax', plugin_dir_url(__FILE__).'js/deleteajax.js',NULL,NULL, true ); ?>

<?php include('include/footer.php'); ?>


