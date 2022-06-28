<?php
    if (isset($_SESSION['once_login']))
        $once_login = $_SESSION['once_login'];
    else
        $once_login = 0;
    $_SESSION['once_login'] = 0;
?>
<script language="javascript">
    var once_login = '<?php echo $once_login;?>';
    $(document).ready(function(){
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
        if (eval(once_login) == 1)
            toastr.success('Login successful!');
    });
</script>