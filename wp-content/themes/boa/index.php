<?php
/**
 * Template Name: Index
 *
 * @package WordPress
 * @subpackage BOA
 * @since BOA 1.0
 */

get_header();
$cats = new Cats();
$catPartners = $cats->getById(9);
?>

    <h1>Index</h1>
<div class="_container _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _m-b-20 _text-center "><b><?php echo ($catPartners->name()) ?></b></h2>

    <div class="_container-flex six-grid-border">
        <?php foreach ($catPartners->posts() as $post){ ?>
            <div class="_box-33 _768-box-33 _480-box-100 _text-center _p-r-15 _p-l-15 _p-t-15 _p-b-15 ">
                <?php switch ($post->id()){
                    case 128:
                        echo "<i class=\"fa fa-desktop fa-4x gradien-partner\" aria-hidden=\"true\"></i>";
                        break;
                    case 126:
                        echo "<i class=\"fa fa-paint-brush fa-4x gradient-partner\" aria-hidden=\"true\"></i>";
                        break;
                    case 124:
                        echo "<i class=\"fa fa-mobile fa-4x\" aria-hidden=\"true\"></i>";
                        break;
                    case 122:
                        echo "<i class=\"fa fa-pie-chart fa-4x\" aria-hidden=\"true\"></i>";
                        break;
                    case 120:
                        echo "<i class=\"fa fa-gamepad fa-4x\" aria-hidden=\"true\"></i>";
                        break;
                    case 109:
                        echo "<i class=\"fa fa-heart-o fa-4x\" aria-hidden=\"true\"></i>";
                        break;
                }
                ?>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</div>

<?php
get_footer();
?>