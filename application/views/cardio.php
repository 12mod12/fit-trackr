
<html>
    <?php include '_includes/head.php' ?>
    <body>
		<?php include '_includes/header.php' ?>
		<div class="content">
    		<div class="submission">
        		<form class = "cardio_submission" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardio/submit">
					Excercise:<br> 
					Hours:<input type="number" name="duration_hours"><br>
					Minutes:<input type="number" name="duration_minutes"><br>
					Seconds: <input type="number" name="duration_seconds"><br>
					Distance: <input type="number" name="distance"><br>
					Calories Burned: <input type="number" name="burned_calories"><br>
					<select name="cardio_type_id">
        			<?php foreach($cardio_names as $excercise): ?>
        				<option value="<?php echo $excercise['cardio_type_id'] ?>"><?php echo $excercise['cardio_name'] ?></option>
        			<?php endforeach; ?>
        			</select>
					<input type="submit" value="Submit">
				</form>
				<?php echo $message ?><p>	
				<?php echo $result ?><p><p>
				<a href="<?php echo $ROOT_URL ?>index.php/welcome"><== HOME</a>
        	</div>
        	<form class = "delete_lifts" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardio/delete">
        	<div class="lift_table">
				<table name="tbl_lifts" cellpadding="1" class="lift_table_content">
					<tbody>
						<?php foreach($cardio as $instance): ?>
							<tr>
								<td>
								<input type="checkbox" name="cardio[]" 
								value="<?php echo $instance->cardio_id ?>" 
								id="<?php echo $instance->cardio_id ?>">
								<label for="<?php echo $instance->cardio_id ?>">
								<?php $cardio = Arr::get($cardio_names,$instance->cardio_type_id) ? $cardio_names[$instance->cardio_type_id]['cardio_name'] : "unknown" ?>
								<?php echo $cardio . " " .$instance->distance ." miles in ".$instance->duration_hours.":".$instance->duration_minutes.":".$instance->duration_seconds." <br> on<br>".$instance->date ?></label>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
        	</div>
        	<input type="submit" value="Delete">
			</form>
        </div>
    </body>
</html>