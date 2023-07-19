<?php get_header();?>
    <h1 class="mb-4"><?= get_the_title();?>.</h1>
    <div class="row mx-0">
        <div class="col-3 px-0 d-flex flex-column gap-4">
            <?= get_sidebar();?>
        </div>
        <div class="col-9 d-flex flex-column gap-4">
            <section class="thumbail mb-4">
                <?= get_the_post_thumbnail();?>
            </section>
            <section class="infos d-flex gap-3">
                <div class="categories d-flex gap-2">
                    <?php foreach(get_the_category() as $category) :?>
                        <a href="<?=get_category_link($category->term_id)?>" class="main-color text-decoration-none">
                            <?= $category->cat_name;?>
                        </a>
                    <?php endforeach;?>
                </div>
                <span>-</span>
                <div class="date main-color">
                    <?= get_the_date();?>
                </div>
            </section>
            <section class="content mb-4">
                <?=get_the_content();?>
            </section>
            <section class="tags d-flex gap-2 mb-4">
                <?php foreach (get_tags() as $tag) :?>
                    <a href="<?=get_category_link($tag->term_id)?>" class="tag text-decoration-none main-text bg-light px-2 py-2">
                        <?= $tag->name;?>
                    </a>
                <?php endforeach; ?>
            </section>
            <section class="comments mb-4">
                <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
            </section>
        </div>
    </div>

<?php get_footer();?>
