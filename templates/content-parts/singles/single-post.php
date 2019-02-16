<article class="blog_post">

    <header>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <main>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </main><!-- .entry-content -->

</article>