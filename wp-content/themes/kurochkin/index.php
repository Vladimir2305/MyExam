<?php get_header(); ?>
	
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

					<div class="list">
						<?php 
						if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
			                <div class="item">
			                    <?php 
								if ( function_exists( 'add_theme_support' ) )
							 	the_post_thumbnail( array(250,9999), array('class' => 'post-images img-thumbnail') ); 
								?>
			                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			                   	<?php the_content(); ?> 
			                    <span class="like">15</span>
			                    <span class="autor">
									<?php $author = get_the_author();
									echo "Автор: ". $author; ?>
								<?php echo get_the_date(); ?></span>
			                </div>
			                <?php endwhile; ?>
					<?php else : ?>
					<?php endif;?>
		                
	        		</div>
	        		<nav>
						  <ul class="pager">
						    <li class="previous"><a href="#">Prev</a></li>
						    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li class="next"><a href="#">Next</a></li>
						  </ul>
					</nav>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<?php dynamic_sidebar( 'sidebar-right' ); ?>
				</div>




			</div>
			</div>
	</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>