<?php 

get_header();

$title = get_the_title();
$description = get_field('description');
$image = get_field('image');
$ingredients = get_field('ingredients');
$allergens = get_field('allergens');
$nutritionals = get_field('nutritinal_information');

$type = get_queried_object()->post_type;

// echo '<pre>'; print_r(get_queried_object()); echo '</pre>';

?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-5">
            <img src="<?php echo site_url('/wp-content/uploads/2018/11/Redemption-Logo_Soup-2-01.png'); ?>" alt="Love Soup Logo" class="full"/>
        </div>
        <div class="col-7">
            <?php echo '<h2 class="caps large">' . $title . ' ' . $type . '</h2>'; ?>
            <?php echo '<p>' . $description . '</p>'; ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div style="background-image: url('<?php echo $image['url']; ?>');" class="parallax"></div>
</div>
<div class="container soup-single">
    <div class="row justify-content-center">
        <h3 class="w-100 text-center mt-4">Ingredients</h3>
        <p>
            <?php
            $count = count($ingredients);
            $i = 1;
            if ($ingredients) {
                foreach ($ingredients as $ingredient) {
                    echo ($i < $count) ? $ingredient['name'] . ', ' : $ingredient['name'];
                    $i++;
                }
            } else {
                echo "no ingredient information provided";
            }
            ?>
        </p>
    </div>
    <div class="row justify-content-center">
        <h3 class="w-100 text-center">Allergens</h3>
        <p>
            <?php
            $count = count($allergens);
            $i = 1;
            if ($allergens) {
                foreach ($allergens as $allergen) {
                    echo ($i < $count) ? $allergen['name'] . ', ' : $allergen['name'];
                    $i++;
                }
            } else {
                echo "no allergen information provided";
            }
            ?>
        </p>
    </div>
    <div class="row justify-content-center">
        <h3 class="w-100 text-center">Nutrition Information</h3>
        <p class="upper text-center">Typical Values per 100g</p>
        
            <?php 
            if ($nutritionals) {
                foreach ($nutritionals as $information) {
                    echo '<p class="w-100 d-flex justify-content-center">';
                    echo '<div class="p-2">' . $information['name'] . '</div>';
                    echo '<div class="p-2">' . $information['amount'] . '</div>';
                    echo '</p>';
                }
            } else {
                echo "no nutrition information provided";
            }
            ?>
        
    </div>
    <div class="row justify-content-center">
        <button class="green rounded5 p-2 mt-5 mb-medium"><a href="<?php echo site_url('/' . $type . '-seller-cards/' . str_replace(" ", '-', strtolower($title))); ?>">Download Soup Seller Card</a></button>
    </div>
</div>


<?php get_footer(); ?>