<?php get_header("page"); ?>

    <div class="content">

        <div class="content-inner">

                <div id="main" role="main">
                    <?php
                        if(!empty($_GET['newSubscriber'])) {
                            echo '<p class="subscribe-cta">Thanks so much for signing up! You\'ll hear from us soon. In the mean time <a href="http://twitter.com/leadinapp">follow us on Twitter</a>, or check out our product <a href="http://leadin.com">LeadIn</a>.</p>';
                        }
                    ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                        <header class="article-header">

                            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <p class="byline vcard"><?php
                                printf( __( '<time class="updated">%3$s</span> wrote this on <datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
                            ?></p>

                        </header>

                    </article>
                    
                    <hr>

                    <?php endwhile; ?>

                            <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
                                    <?php bones_page_navi(); ?>
                            <?php } else { ?>
                                        <nav class="wp-prev-next">
                                            <ul class="clearfix">
                                                <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
                                                <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
                                            </ul>
                                        </nav>
                            <?php } ?>

                    <?php else : ?>

                        <article id="post-not-found" class="hentry clearfix">
                            <header class="article-header">
                                <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                            </header>
                                <section class="entry-content">
                                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                            </section>
                            <footer class="article-footer">
                                    <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
                            </footer>
                        </article>

                    <?php endif; ?>

                </div>

        </div>

    </div>

<?php get_footer("plain"); ?>
