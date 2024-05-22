<section class="blog_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>News + Events</h2>
        </div>
        <div class="btn-box-section">
            <a href="<?= get_permalink(17); ?>">View All</a>
        </div>
    </div>

    <div class="container">
        <div class="blog-data" data-ride="blog">
            <div class="row">
                <?php
                    $blog_posts = get_posts(array(
                        'post_type'			=> 'post',
                        'orderby'			=> 'menu_order',
                        'order'				=> 'ASC',
                        'posts_per_page'	=> 3
                    ));

                    $i = 0;
                    if( $blog_posts ) {
                        foreach( $blog_posts as $blog_key => $blog_post ) {

                        $addClass = $blog_key === 0 ? 'nopadding-1' : ($blog_key === 1 ? 'nopadding' : ($blog_key === 2 ? 'nopadding-2' : null));
                ?>
                    <div class="col-md-4 blog-item <?= ($i++ == 0) ? "active" : '' ?> <?= $addClass; ?>">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <?php
                                        if(has_post_thumbnail($blog_post->ID)) {
                                            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($blog_post->ID), '');
                                            echo '<img src="' . $image_url[0] . '" title="' . the_title_attribute('echo=0') . '" />';
                                        }
                                    ?>
                                </div>
                                <h5><?php echo $blog_post->post_title; ?></h5>
                                <div class="blog-date">
                                    <?= get_the_date( 'd.m.y' ); ?>
                                </div>
                            </div>
                            <div class="detail-box">
                                <p><?php echo $blog_post->post_content; ?></p>
                            </div>
                            <div class="detail-more">
                                <a href="<?= get_permalink($blog_post->ID); ?>">LEARN MORE</a>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    } 
                ?>
            </div>
        </div>
    </div>
</section>