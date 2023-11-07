<?php

echo '
<div class="left-dashboard ">
<ul>
  <li style="background-color: green; color: white"><i class="fa fa-link"></i> Quick Links <i class="fa fa-align-justify toggleDashboard" id="hideDash1"></i></li>
  <a href="admin_dashboard.php"><li><i class="fa fa-home"></i> Dashboard</li></a>
  <a href="#" ><li class="all-news"><i class="fa fa-pencil"></i> Academic</li></a>
  <a href="#" ><li class="getProjects"><i class="fa fa-book"></i> Projects</li></a>
  <a href="#" ><li id="getEvents"><i class="fa fa-group"></i> Events</li></a>
  <a href="#" ><li class="getGallery"><i class="fa fa-photo"></i> Gallery</li></a>
  <a href="#" ><li class="getContacts"><i class="fa fa-phone"></i> Contacts</li></a>
  <a href="admin_change_password.php"><li><i class="fa fa-lock"></i> Change Password</li></a>
  <a href="../assets/php/admin_logout.php"><li><i class="fa fa-sign-out"></i>Logout</li></a>
</ul>
</div>

';

?>