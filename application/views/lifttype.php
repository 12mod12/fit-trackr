
<html>
    <?php include '_includes/head.php' ?>
    <body>
    	<?php include '_includes/header.php'?>
    	<div class="content">
    		<div class="submission">
        		<form class = "submission" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/liftType/submit">
					Lift Name:<br> 
					<input type="text" name="liftname"><br>
					<input type="submit" value="Submit">
				</form>
				<?php echo $message ?><p>	
				<?php echo $result ?><p><p>
				<a href="<?php echo $ROOT_URL ?>index.php/welcome"><== HOME</a>
        	</div>
        	<div class="dropdown">
        		<form class = "delete" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/liftType/delete">
        			Current Lifts:<br>
        			<select name="lift_type_id">
        			<?php foreach($lifts as $lift): ?>
        				<option value="<?php echo $lift->lift_type_id ?>"><?php echo $lift->lift_name ?></option>
        			<?php endforeach; ?>
        			</select>
        			<input type="submit" value="DELETE">
        		</form>	
        	</div>
       	</div>
       	
    </body>
</html>