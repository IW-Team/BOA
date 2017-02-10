<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage BOA
 * @since BOA 1.0
 */

get_header();

?>

<h1>Contact</h1>

<form class="contactForm" method="POST" action="#">
    <p>Nom :</p>
    <input type="text" name="lastname" class="_input">
    <p>Prenom :</p>
    <input type="text" name="firstname" class="_input">
    <p>Email :</p>
    <input type="text" name="email" class="_input">
    <p>Message :</p>
    <textarea class="_input" rows="5" cols="50" name="content"></textarea><br>
    <input class="_button" type="submit" value="Envoyer">
</form>




<?php
get_footer();
?>


