<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/sidebar.php"); ?>
    <?php
		$sticky_posts = get_option( 'sticky_posts' );
		$sticky_count = count($sticky_posts);

        if ( $paged == 0 ) {
            $offset1 = 0;
            $offset2 = 2 + $sticky_count;
			$posts_per_page = 2 - $sticky_count;
        } else {
            $off = $paged - 1;
            $offset1 = $off * 7;
            $offset2 = $off * 7 + 2;
        }
    ?>
    <!-- LOOP1 -->
    <?php if ( have_posts() ) : 

		for ( $i = 0; $i < 2; $i++ ) :
			the_post(); ?>

			<div class="post two p<?=$post->ID;?>">
				<?php
				if ( has_post_thumbnail() ) { ?>
					<div class="sepia">
							<?php 
							$imgsrcparam = array(
							'alt'	=> trim(strip_tags( $post->post_excerpt )),
							'title'	=> trim(strip_tags( $post->post_title )),
							);
							$thumbID = get_the_post_thumbnail( $post->ID, 'two', $imgsrcparam ); ?>
							<div class="preview"><a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a></div>
					</div><!-- .sepia -->
						
				<?php } ?>

				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content( 'read more', false ); ?>   
				<div class="time"><?php the_time('M, d'); ?> &middot; in <?php the_category(','); ?></div>
			</div>
		<?php endfor;
	endif; ?>
    <!-- #LOOP1 --> 
    
   	<!-- LOOP2 -->
    <?php if( have_posts() & $wp_query->post_count > 2 ) :
		for ( $i = 2; $i < 7; $i++ ) :
			the_post(); ?>
			<div class="post one"<?php echo (is_home())? 'style="border-bottom: none !important;"' : ''; ?>>

				<?php
				if ( has_post_thumbnail() ) { ?>
					<div class="sepia">
							<?php 
							$imgsrcparam = array(
							'alt'	=> trim(strip_tags( $post->post_excerpt )),
							'title'	=> trim(strip_tags( $post->post_title )),
							);
							$thumbID = get_the_post_thumbnail( $post->ID, 'one', $imgsrcparam ); ?>
							<div class="preview"><a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a></div>
					</div><!-- .sepia -->
				<?php } ?>

				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content( 'read more', false ); ?>
				<div class="time"><?php the_time('M, d'); ?></div>  
			</div>
		<?php endfor;
	endif; ?>
    <!-- #LOOP2 --> 
    <div style="clear: both;"></div>
    <?php include ( get_stylesheet_directory() . "/bottom.php"); ?>
             
<?php get_footer(); ?>
