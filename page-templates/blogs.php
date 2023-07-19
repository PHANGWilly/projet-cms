<?php
/*
 * Template Name: Blogs Template
 */
?>
<?php get_header();?>
<h1 class="mb-4"><?= get_the_title();?>.</h1>
    <div id="blogs" class="row mx-0 gap-2">
        <div class="col-12 col-lg-3 px-0 d-flex flex-column gap-4 my-2 pe-lg-2 pb-4 border-lg-end border-bottom border-lg-bottom-none">
            <?= get_sidebar();?>
        </div>
        <div class="col my-2 px-0 px-lg-2">
            <div class="row row-cols-1 row-cols-md-2">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'paged' => $paged,
                    );
                    $posts = new WP_Query($args);
                ?>
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) : ?>
                        <?= $posts->the_post(); ?>
                        <div class="col-12 col-md-6 my-3">
                            <article class="w-100 h-100 m-0 border">
                                <a href="<?=get_post_permalink();?>" class="link-to-post m-0 text-decoration-none text-secondary p-0 d-flex flex-column gap-2 py-4 px-2">
                                    <div>
                                        <?= get_the_post_thumbnail($post_id); ?>
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <h3><?= the_title(); ?></h3>
                                        <div><?= wp_trim_words(get_the_content(),20);?></div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    <?php endwhile;?>
                    <div class='pagination'>
                        <?php 
                            paginate_links(array(
                                'total' => $posts->max_num_pages
                            ));
                        ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
