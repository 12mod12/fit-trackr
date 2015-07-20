
<html>
    <?php include '_includes/head.php' ?>
    <body>
		<?php include '_includes/header.php' ?>
		<div class="content">
    		<div class="submission">
        		<form class = "lift_submission" method = "POST" action = "<?php echo $ROOT_URL ?>index.php/lifts/submit">
					Excercise:<br> 
					Sets:<input type="number" name="sets"><br>
					Reps:<input type="number" name="reps"><br>
					Weight<input type="number" name="weight"><br>
					<select name="lift_type_id">
        			<?php foreach($lift_names as $lift): ?>
        				<option value="<?php echo $lift->lift_type_id ?>"><?php echo $lift->lift_name ?></option>
        			<?php endforeach; ?>
        			</select>
					<input type="submit" value="Submit">
				</form>
				<?php echo $message ?><p>	
				<?php echo $result ?><p><p>
				<a href="<?php echo $ROOT_URL ?>index.php/welcome"><== HOME</a>
        	</div>
        	<div class="lift_table">
				<table name="tbl_lifts" cellpadding="1" class="lift_table">
					<tbody>
						<?php foreach($lifts as $instance): ?>
							<tr>
								<td>
								<input type="checkbox" name="lifts" 
								value="<?php echo $instance->lift_id ?>" 
								id="<?php echo $instance->lift_id ?>">
								<label for="<?php echo $instance->lift_id ?>">
								<?php error_log(print_r($lift_names,TRUE));?>
								<?php echo $instance->sets ."x".$instance->reps."@".$instance->weight." " ?></label>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
        	</div>
        </div>
    </body>
</html>