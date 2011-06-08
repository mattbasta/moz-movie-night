<?php

require("include.php");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Movie Night Voting</title>
<link type="text/css" rel="stylesheet" href="http://frame.serverboy.net/latest/" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script src="http://github.com/RobertFischer/JQuery-PeriodicalUpdater/raw/master/jquery.periodicalupdater.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(document).ready(function() {
    var $pu = $.PeriodicalUpdater('scorecard.php', {
        method: 'get',
        data: '',
        minTimeout: 1000,
        maxTimeout: 15000,
        multiplier: 1.5,
        type: 'text',
        maxCalls: 0,
        autoStop: 0
    }, function(data) {
    	  $('#scorecard').html(data);
    });
    // TODO: Mouseover/mouseout is not so great.
    //       This would be a perfect use of hoverIntent here.
    $('#scorecard').mouseover(function() {
        $pu.stop();
    }).mouseout(function() {
        $pu.restart();
    })
});
-->
</script>
</head>
<body class="sans-serif">
<div id="container">
<?php if ($cookie) { ?>

	<p>Vote on the movies that you're interested in.</p>
	<div class="clear"></div>
	<div class="g3">&nbsp;</div>
	<div id="scorecard" class="g6">
		<?php

		require("scorecard.php");

		?>
	</div>
	<div class="clear"></div>
	<p>Or add a movie:</p>
	<form action="add_movie.php" method="post" class="notice_box">
		<label>Movie Name</label>
		<input type="text" name="name" />

		<p class="buttons"><input type="submit" value="Save" /></p>
	</form>

<?php } else { ?>
	<p>Yeah, that's right, you need a Facebook to login. Don't like it? You can write the LDAP driver.</p>
<pre>
Press here -.
            |
            |
  ,---------+
  V
</pre>
	<fb:login-button></fb:login-button>
<?php } ?>
</div>


<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '<?= FACEBOOK_APP_ID ?>', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });
</script>
</body>
</html>
