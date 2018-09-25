<h3>Tweets</h3>
<div class="tweets">
    <?php
        $tweets = get_tweets();
        foreach ( $tweets as $tweet ) {
            echo '<div class="col-sm-6 no-pad">' . $tweet->text . '</div>';
        }

        echo "<div class='col-sm-8 no-pad'><a href='https://twitter.com/" . $tweet->user->screen_name . "'>View our Twitter</a></div>";

    ?>
</div>