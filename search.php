<?php 
get_header(); 

$search_term = get_search_query();

$search_results = new WP_Query(array(
    's' => $search_term,
    'posts_per_page' => -1 
));

$results_by_type = array();
?>

<main id="site-content">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <?php if(isset($_GET["s"])){?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php 
                        if ($search_results->have_posts()) {
                            echo 'Résultats de la recherche pour : <br>'.get_search_query();
                        }else{
                            echo 'Aucun résultat';
                        }
                        ?>
                    </h1>
                </header>
                <div class="post-list-wrapper">
                    <section class="posts-list">
                        <?php
                            if ($search_results->have_posts()) {
                                while ($search_results->have_posts()) {
                                    $search_results->the_post();

                                    $post_type = get_post_type();

                                    if (!isset($results_by_type[$post_type])) {
                                        $results_by_type[$post_type] = array();
                                    }
                                    $results_by_type[$post_type][] = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                                }
                            }else{
                                ?> 
                                    <h2>Aucun article trouvé</h2>
                                <?php
                            }

                            foreach ($results_by_type as $post_type => $results) {
                                if (!empty($results)) {
                                    echo '<h2>'. count($results) . ' ' . ($post_type === 'post' ? 'article.s' : 'page.s') . ' trouvé.s</h2>';
                                    echo '<ul>';
                                    foreach ($results as $result) {
                                        echo '<li>' . $result . '</li>';
                                    }
                                    echo '</ul>';
                                }
                            }
                        ?>
                    </section>
                <?php }; ?>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
