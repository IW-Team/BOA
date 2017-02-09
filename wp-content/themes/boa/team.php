<?php
/**
 * Template Name: Team
 *
 * @package WordPress
 * @subpackage BOA
 * @since BOA 1.0
 */

get_header();
$cats = new Cats();
$catTeam = $cats->getById(3);
$catPartner = $cats->getById(4);

?>
<section class="bg-light-grey _p-t-20 _p-b-20">
<h2 class="font-playfair-display _text-center "><?php echo ($catTeam->name()) ?></h2>

<div class="_container-flex">
        <?php foreach ($catTeam->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->image(300,300);?>" class="img-circle _m-t-15 _m-b-15" width="50%"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
</div>
</section>
<section class="_container _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _text-center "><?php echo ($catPartner->name()) ?></h2>

    <div class="_container-flex">
        <?php foreach ($catPartner->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->thumbnail();?>" class=" _m-t-15 _m-b-15" width="50%"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</section>
<?php
get_footer();
?>
