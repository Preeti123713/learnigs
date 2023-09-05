<?php 
include('include/header.php');
 ?>
 <div class="container">
  <!-- C:\xampp\htdocs\wordpress\wp-content\plugins\cab-booking\Cab_Booking_form_shortcode.php -->
    <form id="form" method="Post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" name="useremail"></div>
    <div class="form-group">
      <label>Cabs</label>
      <select id="cab" class="form-control" name="cab">
        <option selected>Choose Cabs</option>
        <option value="Regular Cab">Regular Cab</option>
        <option value="Extended Cab">Extended Cab</option>
        <option value="Crew Cab">Crew Cab</option>
      </select>
    </div>
    <div class="form-group">
      <label>Date And Time</label>
    <input id="input" width="234" name="datetime"/>
    </div>
        <div class="form-group">
    <label>Message</label>
    <textarea class="form-control" rows="3" name="message"></textarea>
  </div>
  <input type="hidden" id="path" value="http://localhost/wordpress/wp-content/plugins/cab-booking/ajax/insert.php" />
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
<?php include('include/footer.php'); ?>
<?php  wp_enqueue_script( 'insertajax', plugin_dir_url(__FILE__).'js/insertajax.js',NULL,NULL, true ); ?>

 <script>
  $('#input').datetimepicker({
    uiLibrary: 'bootstrap4',
    modal: true,
    footer: true
});
 </script>