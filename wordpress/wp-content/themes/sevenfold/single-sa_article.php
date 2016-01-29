<?php
/**
 * Single post page
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
			<?php if (have_posts()) : 
			    while(have_posts()) : the_post();

					$tab = get_post_meta(get_the_ID(), '_ScientificArticle_article_auteurs', true); // a modifier pour afficher l'autheur et non l'admina ?>
					<?php
					$ids = unserialize($tab);
					if ($ids != null) {
						$count = count($ids);
						echo 'Auteurs: ';
						foreach ($ids as $id) {
							$user = get_user_by('id', $id);
							echo "<a href='$user->user_url' >$user->first_name $user->last_name </a>";
							if ($count > 1) echo ",";
							$count--;
						}
					} else {
						echo 'Pas d\'auteur pour cet article';
					}

					// Include the single post content template.
					get_template_part('template-parts/content', 'single');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) {
						comments_template();

					}

					if (is_singular('attachment')) {
						// Parent post navigation.
						the_post_navigation(array(
							'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen'),
						));
					} elseif (is_singular('post')) {
						// Previous/next post navigation.
						the_post_navigation(array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentysixteen') . '</span> ' .
								'<span class="screen-reader-text">' . __('Next post:', 'twentysixteen') . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentysixteen') . '</span> ' .
								'<span class="screen-reader-text">' . __('Previous post:', 'twentysixteen') . '</span> ' .
								'<span class="post-title">%title</span>',
						));
					}


					// End of the loop.
				endwhile;
				?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div><!-- Container -->
<?php get_footer(); ?>