<?php if($comments):?>
    <section id="comments" class="mb-4">
        <h2 class="text-primary">
            <?= get_comments_number() > 1 ? 'Comments ' . (get_comments_number()) : 'Comment ' . (get_comments_number())  ;?>
        </h2>
        <div class="comments d-flex flex-column gap-4">
            <?php foreach ($comments as $comment) :?>
                <div class="comment bg-light mb-4">
                    <div class="p-4">
                        <h4 class="text-primary"><?= strtoupper(comment_author()); ?></h4>
                        <p><?= strtoupper(comment_text()); ?></p>
                        <div class="answer">
                            <?= wp_enqueue_script('comment-reply');?>
                            <a class="reply text-decoration-none d-flex gap-2 align-items-center" href="#comments" data-id="<?= $comment->comment_ID ?>">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.259652 4.93237L5.75978 0.182841C6.24122 -0.23294 7 0.104591 7 0.750466V3.25212C12.0197 3.30959 16 4.31562 16 9.07268C16 10.9927 14.7631 12.8948 13.3958 13.8893C12.9692 14.1997 12.3611 13.8102 12.5184 13.3071C13.9354 8.77547 11.8463 7.5724 7 7.50265V10.25C7 10.8969 6.24062 11.2329 5.75978 10.8176L0.259652 6.06762C-0.0863164 5.76881 -0.0867851 5.23159 0.259652 4.93237Z" fill="#050A3A"/>
                                </svg>
                                <span class="fs-bold text-primary">Reply</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach;?>
        </div>
    </section>
<?php endif;?>
<?php if(comments_open()) : ?>
    <div id="can-comment" class="mb-4">
        <?php if(!is_user_logged_in()) : ?>
            <div class="alert alert-info" role="alert">
                You must be 
                <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>" class="text-decoration-none text-primary fw-bold">
                    logged in
                </a>
                to post a comment.
            </div>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <div class="d-flex flex-column gap-4">
                    <h2 class="text-primary">Leave a reply</h2>
                    <div class="input-group border-bottom border-secondary">
                        <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Full Name" class="w-100 border-0" required>
                    </div>
                    <div class="input-group border-bottom border-secondary">
                        <textarea name="comment" id="comment" cols="100%" rows="10" class="w-100 border-0" placeholder="Message" required></textarea>
                    </div>
                    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"/>
                    <input name="submit" type="submit" id="submit" value="Submit" class="border-0 text-primary bg-transparent fw-bold text-start" required/>
                    <?php do_action('comment_form', $post->ID); ?>
                </div>
            </form>
        <?php endif; ?>
    </div>
<?php else : ?>
    <div id="can-comments" class="mb-4">
	    <div class="alert alert-info" role="alert">
            The comments are closed !
        </div>
    </div>
<?php endif; ?>