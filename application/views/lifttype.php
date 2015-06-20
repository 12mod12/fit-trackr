
<html>
    <?php include '_includes/head.php' ?>
    <body>
    	<?php include '_includes/header.php'?>
    	<div class="content">
    		<div class="description">
        		<form class = "submission" method = "POST" action = "<?php echo $action ?>">
					Lift Name:<br> 
					<input type="text" name="liftname"><br>
					<input type="submit" value="Submit">
				</form>
				<?php echo $message ?><p>	
				<?php echo $result ?>
        	</div>
       	</div>
    </body>
</html>