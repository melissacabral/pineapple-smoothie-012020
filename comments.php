<?php 
//check for password protected post
if( post_password_required() ){
	return;
}
?>

<section class="comments">
	<h3><?php comments_number(); ?> on this post</h3>
	<ol>
		<?php wp_list_comments(array(
			'type' => 'comment',
		)); ?>
	</ol>

<div class="pagination">
	<?php previous_comments_link(); ?>
	<?php next_comments_link(); ?>
</div>


</section>


<section class="comment-form">
	<?php comment_form(); ?>
</section>



<?php $pings = pineapple_pings_count();
if($pings >= 1){
?>
<section class="pings">
	<h3><?php echo pineapple_pings_count(); ?> Sites link to this article</h3>

	<ul>
		<?php wp_list_comments( array(
			'type' 			=> 'pings', //trackbacks and pingbacks
			'short_ping' 	=> true,
		) ); ?>
	</ul>
</section>
<?php } ?>