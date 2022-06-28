<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>home">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Course ID Numbers</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Group_report/get_all_groups">Course ID Report</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Group_report/get_content_owners_by_group">All Course Content Owners by Course Report</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Group_report/get_members_by_group">All Course Members by Course Report</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">User Report</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>User_report/get_all_users">Generate Course ID Report</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>User_report/get_content_owners_by_user">All Content Owners by User Report</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>User_report/get_courses_by_user">All Courses by User Report</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Device Report</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Device_report/get_all_devices">Device Report All Devices</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Device_report/get_schedules_by_device">Device Schedules Report</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Media Report</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>Media_report/get_videos_by_course">All videos in each course</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Analytics Report</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Video View Report</a></li>
                        <li><a class="dropdown-item" href="">Visitor Report</a></li>
                    </ul>
                </li>
                <?php 
                    $isLoggedIn = $this->session->userdata('isLoggedIn');
                    $roleID = $this->session->userdata('role');
                    if (isset($isLoggedIn) && $isLoggedIn == TRUE && isset($roleID) && intval($roleID) == 1)
                    {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Admin</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>userListing">Manage Users</a></li>
                        <li><a class="dropdown-item" href="">Manage API Token</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
		            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $this->session->userdata('name');?></a>
	                <ul class="dropdown-menu dropdown-menu-right">
		                <li><a class="dropdown-item" href="<?php echo SITE_URL;?>profile">Profile</a></li>
		                <li><a class="dropdown-item" href="<?php echo SITE_URL;?>logout">Logout</a></li>
                
                    </ul>
                </li>
            </ul>
        </div> <!-- navbar-collapse.// -->

    </nav>
</div>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	// add padding top to show content behind navbar
	$('body').css('padding-top', $('.navbar').outerHeight() + 'px');

    //////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });

    // make it as accordion for smaller screens
    if ($(window).width() < 992) {
	  	$('.dropdown-menu a').click(function(e){
	  		e.preventDefault();
	        if($(this).next('.submenu').length){
	        	$(this).next('.submenu').toggle();
	        }
	        $('.dropdown').on('hide.bs.dropdown', function () {
			   $(this).find('.submenu').hide();
			})
	  	});
	}
	
}); // jquery end
</script>