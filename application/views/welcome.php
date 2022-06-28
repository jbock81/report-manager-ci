<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="main_nav">
        
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL; ?>My_auth/login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL; ?>My_auth/register">Register</a></li>
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