<article class="blog_post">
    <header>
        <?php the_title(); ?>
        <div class="sub">
            <?php the_date(); ?>
        </div>
    </header>
    <main>
        <?php the_excerpt(); ?>
    </main>
    <footer>
        <a href="<?php the_permalink(); ?>">Read More...</a>
    </footer>
</article>