<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    window.onload = function ()
    {
        // refresh session every 10 minutes so users don't have to relog in
        setInterval(function() { $.post('refresh_session.php'); }, 600000);
    };
</script>

<?php

    \Classes\Environment::setMode(\Classes\Environment::MODE_DET_DEV);

?>