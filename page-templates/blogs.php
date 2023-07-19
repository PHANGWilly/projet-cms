<?php
/*
 * Template Name: Blogs Template
 */
?>
<?php get_header();?>
<h1 class="mb-4"><?= get_the_title();?>.</h1>
    <div id="blogs" class="row mx-0">
        <div class="col-12 col-lg-3 px-0 d-flex flex-column gap-4 my-2">
            <?= get_sidebar();?>
        </div>
        <div class="col my-2 px-0 px-lg-2">
            <div class="d-flex flex-wrap">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'paged' => $paged,
                    );

                    $posts = new WP_Query($args);

                    if ($posts->have_posts()) {
                        while ($posts->have_posts()) {
                            ?>
                            <?= $posts->the_post(); ?>
                            <div class="col-12 col-lg-6 m-0 p-lg-2">
                                <a href="<?=get_post_permalink();?>" class="link-to-post m-0 text-decoration-none text-secondary p-0 d-flex flex-column gap-2">
                                    <div>
                                        <?= get_the_post_thumbnail($post_id); ?>
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <h3><?= the_title(); ?></h3>
                                        <div><?= wp_trim_words(get_the_content(),20);?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        echo "<div class='pagination'>";
                        echo  paginate_links(array(
                                'total' => $posts->max_num_pages
                            ));
                        echo "</div>";
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
