<?php 
$referringMessage = "You must be logged in to use fit-trackr";
include $_SERVER['DOCUMENT_ROOT'].'/garmr/redirect.php' ?>
<html>
    <?php include '_includes/head.php' ?>
    <body>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/scripts/header.php' ?>
    	<div class="content">
    		<div class="description">
        		<p><?php echo $message; ?></p>
        		<p>It's like Uber, but for fitness!</p>
        		<a href=/programs/fit-trackr/index.php/lifts>Click Here to track your lifts!</a><p>
        		<a href=/programs/fit-trackr/index.php/cardio>Click Here to track your cardio!</a><p> 
        		<a href=/programs/fit-trackr/index.php/liftType>Insert new lifts here.</a><p>
        		<a href=/programs/fit-trackr/index.php/cardioType>Insert new cardio here.</a><p>
        		
        	</div>
        </div>
    </body>
</html>