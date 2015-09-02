<?php include '$_SERVER['DOCUMENT_ROOT']./garmr/connect.php' ?>
<html>
    <?php include '_includes/head.php' ?>
    <body>
		<?php include '_includes/header.php' ?>
    	<div class="content">
    		<div class="description">
        		<p><?php echo $message; ?></p>
        		<p>It's like Uber, but for fitness!</p>
        		<a href=/programs/fit-trackr/index.php/lifts>Click Here to track your lifts!</a><p>
        		<a href=/programs/fit-trackr/index.php/cardio>Click Here to track your cardio!</a><p> 
        		<a href=/programs/fit-trackr/index.php/liftType>Insert new lifts here.</a><p>
        		<a href=/programs/fit-trackr/index.php/cardioType>Insert new cardio here.</a><p>
        		
        		<?php
        		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
				{
     			?>
 
     			<h1>Member Area</h1>
     			<p>Thanks for logging in! You are <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code>.</p>
      
  			   <?php
				} else {
				?>
				<script type="text/javascript">		
					window.location = "/garmr"
				</script>
				<?php
				}
				?>
        	</div>
        </div>
    </body>
</html>