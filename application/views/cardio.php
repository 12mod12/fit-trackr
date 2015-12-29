
<html>
    <?php include '_includes/head.php' ?>
    <body>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/scripts/header.php' ?>
		<div class="content">
    		<div class="cardio_submission">
    			<?php echo $message ?><p>	
				<?php echo $result ?><p><p>
				<a href="<?php echo $ROOT_URL ?>index.php/welcome"><== HOME</a>
        		<form class = "cardio_submission" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardio/submit">
					Excercise:<br> 
					Hours: <input type="number" name="duration_hours" style="margin-left: 22.75%;"><br>
					Minutes: <input type="number" name="duration_minutes" style="margin-left: 18%;"><br>
					Seconds: <input type="number" name="duration_seconds" style="margin-left: 17.75%;"><br>
					Distance: <input type="text" name="distance" style="margin-left: 16.75%;"><br>
					Calories Burned: <input type="number" name="burned_calories"><br>
					<select name="cardio_type_id">
        			<?php foreach($cardio_names as $excercise): ?>
        				<option value="<?php echo $excercise['cardio_type_id'] ?>"><?php echo $excercise['cardio_name'] ?></option>
        			<?php endforeach; ?>
        			</select>
					<input type="submit" value="Submit">
				</form>
        	</div>
        	<form class = "delete_cardio" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/cardio/delete">
        	<div class="cardio_table">
				<table name="tbl_lifts" cellpadding="1" class="cardio_table_content">
					<tbody>
						<?php foreach($cardio as $instance): ?>
							<tr>
								<td>
								<input type="checkbox" name="cardio[]" 
								value="<?php echo $instance->cardio_id ?>" 
								id="<?php echo $instance->cardio_id ?>">
								<label for="<?php echo $instance->cardio_id ?>">
								<?php $cardio = Arr::get($cardio_names,$instance->cardio_type_id) ? $cardio_names[$instance->cardio_type_id]['past_tense'] : "unknown" ?>
								<?php echo $cardio . " " .$instance->distance ." miles in ".$instance->duration_hours.":".$instance->duration_minutes.":".$instance->duration_seconds ." burning ".$instance->burned_calories." calories on ".$instance->date ?></label>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
        	</div>
        	<div align="center">
        	<input type="submit" value="Delete"
        	</div>
			</form>
        </div>
    </body>
</html>