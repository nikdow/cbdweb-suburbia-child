<div class="meta">
    <?php
        $values = get_post_custom_values("notes");
        if (isset($values[0])) : ?>
            <h3>Article notes</h3>
            <p><?php echo $values[0]; ?></p>
    <?php endif; ?>
    
    <h3>Information</h3>
    <p>This article was written on <?php the_time('d M Y'); ?>, and is filed under <?php the_category(', '); ?>.</p>
    
    <?php if ( get_the_tags() ) : ?>
    <h3>Current post is tagged</h3>
    	<p><?php the_tags('', ', ', ''); ?></p>
    <?php endif; ?>
        
    <?php if ( is_user_logged_in() ) : ?>
        <h3><?php edit_post_link(__('Edit this entry')); ?></h3>
    <?php endif; ?>

	<form role="search" method="get" id="searchform" class="searchform" action="<?=site_url();?>">
		<div>
			<label class="screen-reader-text" for="s">Search for:</label>
			<input type="text" name="s" id="s">
			<input type="submit" id="searchsubmit" value="Search">
		</div>
	</form>

</div>



	
