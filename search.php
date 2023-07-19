<?php 
get_header(); 

$search_term = get_search_query();

$search_results = new WP_Query(array(
    's' => $search_term,
    'posts_per_page' => -1 
));

$results_by_type = array();
?>

<section class="search">
    <?php if(isset($_GET["s"])) :?>
        <header class="page-header">
            <h1 class="page-title">
                <?php if ($search_results->have_posts()) :?>
                    Search results for : <span><?=get_search_query();?></span>
                <?php else : ?>
                    Nothing for : <span><?=get_search_query();?></span>
                <?php endif;?>
            </h1>
        </header>
        <?php if ($search_results->have_posts()) : ?>
            <div class="post-list-wrapper my-5">
                <div class="posts-list">
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php while ($search_results->have_posts()) : ?>
                            <?php $search_results->the_post(); ?>
                            <div class="col-12 col-sm-6 col-md-4 my-3">
                                <article class="text-decoration-none border py-4 px-2 d-flex flex-column w-100 h-100">
                                    <h2><?= the_title(); ?></h2>
                                    <h6 class="pb-2"><?= get_the_date(); ?></h6>
                                    <p><?= wp_trim_words(get_the_content(), 20); ?></p>
                                    <a href="<?= get_permalink(); ?>" class="btn">See More</a>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif ; ?>
</section>

<?php get_footer(); ?>
