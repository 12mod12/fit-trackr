
<html>
    <?php include '_includes/head.php' ?>
    <body>
    	<?php include '_includes/header.php'?>
    	<div class="content">
    		<div class="submission">
        		<form class = "submission" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardioType/submit">
					Cardio Name:<br> 
					<input type="text" name="cardioname"><br>
					<input type="submit" value="Submit">
				</form>
				<?php echo $message ?><p>	
				<?php echo $result ?><p><p>
				<a href="<?php echo $ROOT_URL ?>index.php/welcome"><== HOME</a>
        	</div>
        	<div class="dropdown">
        		<form class = "delete" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardioType/delete">
        			Current Cardio:<br>
        			<select name="cardio_type_id">
        			<?php foreach($excercises as $cardio): ?>
        				<option value="<?php echo $cardio->cardio_type_id ?>"><?php echo $cardio->cardio_name ?></option>
        			<?php endforeach; ?>
        			</select>
        			<input type="submit" value="DELETE">
        		</form>	
        	</div>
       	</div>
       	
    </body>
</html>