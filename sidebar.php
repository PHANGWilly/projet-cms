<aside class="d-flex flex-column gap-4">
    <div class="search-form">
        <h2 class="fs-4">Search</h2>
        <form role="search" method="get" id="searchform" class="searchform" action="<?=get_site_url();?>">
            <div class="d-flex flex-column gap-2">
                <div class="d-flex justify-content-between border-bottom border-light">
                    <input type="text" value="" name="s" id="s" placeholder="Type to search" required class="border-0 w-100">
                    <button type="submit" id="searchsubmit" class="border-0 bg-transparent">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6656 10.7188L15.7812 13.8344C16.0719 14.1281 16.0719 14.6031 15.7781 14.8969L14.8938 15.7812C14.6031 16.075 14.1281 16.075 13.8344 15.7812L10.7188 12.6656C10.5781 12.525 10.5 12.3344 10.5 12.1344V11.625C9.39688 12.4875 8.00937 13 6.5 13C2.90937 13 0 10.0906 0 6.5C0 2.90937 2.90937 0 6.5 0C10.0906 0 13 2.90937 13 6.5C13 8.00937 12.4875 9.39688 11.625 10.5H12.1344C12.3344 10.5 12.525 10.5781 12.6656 10.7188ZM2.5 6.5C2.5 8.7125 4.29063 10.5 6.5 10.5C8.7125 10.5 10.5 8.70938 10.5 6.5C10.5 4.2875 8.70938 2.5 6.5 2.5C4.2875 2.5 2.5 4.29063 2.5 6.5Z" fill="#969696"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="recent-posts d-flex flex-column gap-2">
        <h2 class="fs-4">Recent posts</h2>
        <ul class="p-0">
            <?php
                $args = array(
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                );

                $posts = new WP_Query($args);

                if ($posts->have_posts()) {
                    while ($posts->have_posts()) { ?>
                        <?= $posts->the_post(); ?>
                        <li class="row m-0 pb-3">
                            <a href="<?=get_permalink($post->id);?>" class="m-0 text-decoration-none text-secondary p-0">
                                <div class="row m-0 gap-2">
                                    <div class="col-3 p-0">
                                        <?= get_the_post_thumbnail($post->id,array(80,80)); ?>
                                    </div>
                                    <div class="col-8 p-0 d-flex flex-column align-items-start justify-content-between">
                                        <div><?= the_title(); ?></div>
                                        <div><?= get_the_date();?></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    wp_reset_postdata();
                }
            ?>
        </ul>
    </div>

    <div class="archives d-flex flex-column gap-2">
        <h2 class="fs-4">Archives</h2>
        <ul class="p-0 list-unstyled d-flex flex-column gap-3">
            <?php 
                $args = array(
                    'type' => 'monthly', 
                    'limit' => '', 
                    'format' => 'custom', 
                    'before' => "<li class='archive-li'>", 
                    'after' => '</li>',
                    'show_post_count' => false,
                    'echo' => false
                );
                
                $archives = wp_get_archives($args);
                
                $archives = str_replace('&nbsp;', '', $archives);
            ?>             
            <?= $archives ; ?>
        </ul>
    </div>

    <div class="categories d-flex flex-column gap-2">
        <h2 class="fs-4">Categories</h2>
        <ul class="p-0 list-unstyled d-flex flex-column gap-3">
            <?php foreach (get_categories() as $category) :?>
                <li class="category-li">
                    <a href="<?=get_category_link($category->term_id)?>" class="text-decoration-none text-secondary">
                        <?= $category->name;?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="tags d-flex flex-column gap-2">
        <h2 class="fs-4">Tags</h2>
            <div class="tags-list d-flex flex-wrap gap-2">
                <?php foreach (get_tags() as $tag) :?>
                    <a href="<?=get_category_link($tag->term_id)?>" class="tag text-decoration-none text-secondary bg-light px-2 py-2">
                        <?= $tag->name;?>
                    </a>
                <?php endforeach; ?>
            </div>
    </div>
</aside>
