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
$post = new Posts();
$boaIntro = $post->getById(130);
$boaSavoirFaire = $post->getById(132);
$boaTournage = $post->getById(135);
?>

<section class="_text-center pos-relative background_cover " style="background-image: url(<?php echo ($boaIntro->thumbnail()); ?>); max-width: none ">
    <div class="pos-absolute center_element">
        <h2 class="font-playfair-display _m-b-20 f-c-white"><b>
                <?php echo ($boaIntro->title()); ?></b></h2>
        <hr class="hr-colored hr-small-center">
        <p class="font-robot f-c-white _m-t-20 _p-l-40 _p-r-40"><?php echo ($boaIntro->content()) ?></p>
    </div>

</section>
<section class="_container _container-flex _p-t-30 _p-b-30 _text-center aligncenter _p-t-20 _p-b-20">
    <div class="_box-50 _480-box-100">
        <img src="<?php echo ($boaSavoirFaire->thumbnail()); ?>" >
    </div>
    <div class="_box-50 _480-box-100  ">
        <h2 class="font-playfair-display _m-b-20">
            <b><?php echo ($boaSavoirFaire->title()); ?></b>
        </h2>
        <p class="font-robot _p-l-20 _p-r-20"><?php echo ($boaSavoirFaire->content()); ?></p>
        <div class="_text-left _480-text-center">
            <a class="font-robot _m-l-30 _m-t-20 _button-project _button-3d-project inline-block">NOS PROJETS</a>

        </div>
    </div>

</section>

<section class=" _text-center pos-relative background_cover" style="background-image: url(<?php echo ($boaTournage->thumbnail());?>);">
    <div class="pos-absolute center_element">
        <span class="border-circle-white _p-l-20 _p-t-10 _p-b-10 _p-r-10 f-c-white _f-s-50">
            &#9658;
        </span>
        <p class="font-robot f-c-white _m-t-20 _p-l-40 _p-r-40 _p-t-20"><?php echo ($boaTournage->title()) ?></p>
    </div>
</section>

<section class="_container _p-t-30 _p-b-30">
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
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><b><?php echo $post->title()?></b></p>
                <p class="font-robot _p-b-20"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</section>

<?php
get_footer();
?>