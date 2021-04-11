<?php get_header(); ?>

<div class="space"></div>

<div class="content">
  <?php if (have_posts()): ?><?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p><?php the_time('j M, Y'); ?> - <?php the_category(', '); ?></p>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('biolab_single', array ('class' => 'img-res', 'alt' => get_the_title())); ?></a>
      
      <?php the_content(); ?>
      
      <?php $post_tags = wp_get_post_tags($post->ID);
        if(!empty($post_tags)) {?>
				<p class="tag"> <small> <strong><?php esc_html_e('Tag: ', 'miotema'); ?></strong>  </small> <br/> <?php the_tags('', ' ', ''); ?></p>
			<?php } ?>
      
      <hr>
      <div class="comments">
        <?php comments_template(); ?>
      </div>
      
    </article>
    
  <?php endwhile; ?>
  
  <div class="pagination">
  
    <?php   /* pagination  */
    global $wp_query;
    $big = 99999999;  //need an unlikely integer
    echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
    ?>
    
  </div>
  
  <?php else : ?>
  
  <h2>nessun post corrisponde ai criteri di sistema...</h2>
  
  <?php endif; ?>
  
</div>

<aside class="sidebar">
  <?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>