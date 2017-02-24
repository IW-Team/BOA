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
    public function form() {
        echo '<form class="contactForm" action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post" >';
        echo '<p>Nom* :</p>';
        echo '<input type="text" name="nameForm" class="_input" value="' . ( isset( $_POST["nameForm"] ) ? esc_attr( $_POST["nameForm"] ) : '' ) . '" size="40" />';
        echo '<p>Email* :</p>';
        echo '<input type="text" name="emailForm" class="_input" value="' . ( isset( $_POST["emailForm"] ) ? esc_attr( $_POST["emailForm"] ) : '' ) . '" size="40" />';
        echo '<p>Message* :</p>';
        echo '<textarea class="_content" rows="5" cols="50" name="messageForm">' . ( isset( $_POST["messageForm"] ) ? esc_attr( $_POST["messageForm"] ) : '' ) . '</textarea>';
        echo '<input class="_button _m-t-20" type="submit" name="submitForm" value="Envoyer">';
        echo '</form>';
    }

    /**
     * @param $name
     * @param $email
     * @param $message
     */
    public function validate_form( $name, $email, $message ) {

        if ( empty(trim($name)) || empty(trim($email)) || empty(trim($message)) ) {
            array_push( $this->form_errors, 'Les champs marqué d\'une * doivent être remplis' );
        }

        if ( strlen(trim($name)) < 2 ) {
            array_push( $this->form_errors, 'Le nom doit être supérieur à 2 caractères' );
        }
        if ( strlen(trim($message)) < 4 ) {
            array_push( $this->form_errors, 'Le message doit être supérieur à 4 caractères' );
        }

        if ( !filter_var(trim($email), FILTER_VALIDATE_EMAIL) ) {
            array_push( $this->form_errors, 'Format d\'email invalid ');
        }
    }

    /**
     * @param $name
     * @param $email
     * @param $message
     */
    public function send_email($name, $email, $message) {

        if ( count($this->form_errors) < 1 ) {

            //sanitize functions = wp checker
            $name = sanitize_text_field($name);
            $email = sanitize_email($email);
            $message = esc_textarea($message);

            $to = get_option('admin_email');
            $headers = "From: ". $name." <".$email."> " . "\r\n";

            if ( wp_mail( $to, 'Boa formulaire de contact', $message, $headers ) ) {
                echo '<div class="_text-center f-c-green _p-20">';
                echo '<p>Merci de nous avoir contacter</p>';
                echo '</div>';
            } else {
                echo 'Une erreur est survenue lors de l\'envoi du formulaire';
            }

        }
    }

    /**
     *
     */
    public function process_functions() {
        $this->form();
        if ( isset($_POST['submitForm']) ) {
            $this->validate_form($_POST['nameForm'], $_POST['emailForm'], $_POST['messageForm']);
            // display form error if it exist
            if (count($this->form_errors) >= 1) {
                foreach ($this->form_errors as $error) {
                    echo '<div class="_text-center f-c-red _p-20">';
                    echo $error . '<br/>';
                    echo '</div>';
                }
            }else{
                $this->send_email( $_POST['nameForm'], $_POST['emailForm'], $_POST['messageForm'] );
            }
        }
    }
    public function shortcode() {
        ob_start();
        $this->process_functions();
        return ob_get_clean();
    }
}

new Contact_form();
