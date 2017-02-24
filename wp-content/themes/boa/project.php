<?php
/**
 * Template Name: Project
 *
 * @package WordPress
 * @subpackage BOA
 * @since BOA 1.0
 */

get_header();
$cats = new Cats();
$catVideo = $cats->getById(5);
$catFilm = $cats->getById(6);
$catClip = $cats->getById(7);
$catPhoto = $cats->getById(8);
?>
<section class="bg-light-grey _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _text-center "><?php echo ($catVideo->name()) ?></h2>

    <div class="_container-flex">
        <?php foreach ($catVideo->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->thumbnail();?>" class=" _m-t-15 _m-b-15" width="200px"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->excerpt() ?></p>
            </div>
        <?php }?>
    </div>
</section>
<section class="_container _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _text-center "><?php echo ($catFilm->name()) ?></h2>

    <div class="_container-flex">
        <?php foreach ($catFilm->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->thumbnail();?>" class=" _m-t-15 _m-b-15" width="200px"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</section>
<div class="bg-light-grey _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _text-center "><?php echo ($catClip->name()) ?></h2>

    <div class="_container-flex">
        <?php foreach ($catClip->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->thumbnail();?>" class="_m-t-15 _m-b-15" width="200px"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</div>
<div class="_container _p-t-20 _p-b-20">
    <h2 class="font-playfair-display _text-center "><?php echo ($catPhoto->name()) ?></h2>

    <div class="_container-flex">
        <?php foreach ($catPhoto->posts() as $post){ ?>
            <div class="_box-20 _768-box-50 _480-box-100 _text-center _p-r-15 _p-l-15">
                <img src="<?php echo $post->thumbnail();?>" class=" _m-t-15 _m-b-15" width="200px"/>
                <p class="font-playfair-display _f-s-21 _m-t-10 _m-b-10"><?php echo $post->title()?></p>
                <p class="font-robot"><?php echo $post->content() ?></p>
            </div>
        <?php }?>
    </div>
</div>

<?php
get_footer();
?>
