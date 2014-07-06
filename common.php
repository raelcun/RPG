<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    window.onload = function ()
    {
        setInterval(function() { $.post('refresh_session.php'); }, 600000); // refresh every 10 minutes
    };
</script>