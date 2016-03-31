<?php
  $thisTitle = "Admin Panel";
  $thisPage = "dAdminPanel";

  require('../db_config.php')
?>

<?php include('admin_header.php'); ?>

<main>
	<h2>Admin Panel</h2>
	<a href="../login.php?action=logout">Logout</a>
</main>

<?php // include('footer.php'); ?>