<?php
include( 'db.php' );
date_default_timezone_set("Asia/Colombo");

?>

<ul class="list-group">
	<?php
	// get messages
	$query = "select * from chat order by id desc";
	$run   = $con->query( $query );
	while ( $row = $run->fetch_array() ):
		?>
        <li class="list-group-item">
            <span class="text-muted"><?php echo $row['name'] ?>: </span>
            <span class="small"><?php echo $row['message'] ?></span>
            <span class="float-right badge badge-dark"><?php echo date_format( new DateTime( $row['date'] ), 'g:i a' ) ?></span>
        </li>
	<?php endwhile; ?>
</ul>