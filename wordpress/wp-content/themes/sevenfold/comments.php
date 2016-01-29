<?php 
wp_reset_postdata();
if(comments_open( ) || have_comments()) : ?>
<div class="comments-area">
	<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments ', 'sevenfold' ); ?></p>
			</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;?>

		<?php if(!(is_page( ) && get_comments_number( ) == 0)) : ?>
	    	<h3><?php comments_number( '0', '1', '%' ) ?> <?php _ex('Comments','blog','sevenfold') ?></h3>
		<?php endif; ?>
		<?php if ( have_comments() && comments_open()) : ?>
			<div class="comments_navigation page-numbers center">
				<?php paginate_comments_links(); ?>
			</div>
            <ul class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'70','style'=>'ul') ); ?>
			</ul>
		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) && have_comments()) :?>
			<div class="comments_navigation">
				<?php paginate_comments_links(); ?>
			</div>
            <ul class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments_closed' , 'avatar_size'=>'70','style'=>'ul') ); ?>
			</ul>
		<?php endif; ?>

		<?php
		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="row"><div class="col-md-6"><input class="comments-line" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" placeholder="'.__('Name','sevenfold').'" aria-required="true"></div>',
				'email' => '<div class="col-md-6"><input class="comments-line" name="email" type="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" placeholder="'.__('Email','sevenfold').'" aria-required="true"></div></div>',
				'url' => '<input class="comments-line"  placeholder="'.__('Website','sevenfold').'" name="website" type="text" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '">'
					)
			),
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'title_reply' => '<i class="icon-473" title="473"></i>' . __('Add new comment','sevenfold'),
			'comment_field' => '<textarea name="comment" class="comments-area" placeholder="'.__('Comment','sevenfold').'"></textarea>',
			'label_submit' => _x('Write','comment-form','sevenfold')
		);
		comment_form( $args );
		?>
</div><!-- .comments area -->
<?php endif; ?>