<?php
/**
 * Plugin Name: contact-form
 * Plugin URI: __
 * Description: formulaire de contact
 * Version: 1.0
 * Author: BOA-ESGI
 * Author URI: --
 * License: MIT
 */

/**
 * Class Contact_form
 */
class Contact_form
{

    private $form_errors = array();

    /**
     * Contact_form constructor.
     */
    function __construct() {
        // création du shortcode
        add_shortcode('contact_form', array($this, 'shortcode'));
    }

    /**
     *
     */
    public static function form() {
        echo '<form class="contactForm" action="' . $_SERVER['REQUEST_URI'] . '" method="post" >';
        echo '<p>Nom* :</p>';
        echo '<input type="text" name="name" class="_input" value="' . ( isset( $_POST["name"] ) ? esc_attr( $_POST["name"] ) : '' ) . '" size="40" />';
        echo '<p>Email* :</p>';
        echo '<input type="text" name="email" class="_input" value="' . ( isset( $_POST["email"] ) ? esc_attr( $_POST["email"] ) : '' ) . '" size="40" />';
        echo '<p>Message* :</p>';
        echo '<textarea class="_content" rows="5" cols="50" name="message">' . ( isset( $_POST["message"] ) ? esc_attr( $_POST["message"] ) : '' ) . '</textarea><br/>';
        echo '<input class="_button" type="submit" name="submit" value="Envoyer">';
        echo '</form>';
    }

    /**
     * @param $name
     * @param $email
     * @param $subject
     * @param $message
     */
    public function validate_form( $name, $email, $message ) {

        if ( empty(trim($name)) || empty(trim($email)) || empty(trim($message)) ) {
            array_push( $this->form_errors, 'Les champs marqué d\'une * doivent être remplis' );
        }

        if ( strlen(trim($name)) < 4 ) {
            array_push( $this->form_errors, 'Le nom doit être supérieur à 2 caractères' );
        }

        if ( filter_var(trim($email), FILTER_VALIDATE_EMAIL) ) {
            array_push( $this->form_errors, 'Format d\'email invalid ');
        }
    }

    /**
     * @param $name
     * @param $email
     * @param $subject
     * @param $message
     */
    public function send_email($name, $email, $message) {

        if ( count($this->form_errors) < 1 ) {

            //sanitize functions = wp checker
            $name = sanitize_text_field($name);
            $email = sanitize_email($email);
            $message = esc_textarea($message);

            $to = get_option('admin_email');

            $headers = 'From:'. $name.' <'.$email.'>';

            if ( wp_mail( $to, 'Boa formulaire de contact', $message, $headers ) ) {
                var_dump($_REQUEST);
                die();
                echo '<div style="background: #F7F7F7; color:#fff; padding:2px;margin:2px">';
                echo '<p>Merci de nous avoir contacter</p>';
                echo '</div>';
            } else {
                echo 'Une erreur est survenue lors de l\'envoi du formulaire';
            }
            var_dump($this);
            die();
        }
        var_dump("toto");
        die();
    }

    /**
     *
     */
    public function process_functions() {
        if ( isset($_POST['submit']) ) {

            $this->validate_form($_POST['name'], $_POST['email'], $_POST['message']);
            // display form error if it exist
            if (is_array($this->form_errors)) {
                foreach ($this->form_errors as $error) {
                    echo '<div>';
                    echo $error . '<br/>';
                    echo '</div>';
                }
            }else{
                $this->send_email( $_POST['name'], $_POST['email'], $_POST['message'] );
            }
        }
        self::form();
    }
    public function shortcode() {
        ob_start();
        $this->process_functions();
        return ob_get_clean();
    }
}
new Contact_form();
