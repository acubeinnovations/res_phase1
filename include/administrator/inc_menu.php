<a href="index.php">Home</a>
<?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>
<a href="contents_search.php" title="Dynamic Contents">Dynamic Contents</a>
<a href="settings.php" title="Settings">Settings</a>
<a href="change_password.php" title="Settings">Change Password</a>
<a  href="logout.php" title="logout">Logout</a>
<?php }else{ ?>
<a  href="index.php" title="Login">Login</a>
<?php } ?>

