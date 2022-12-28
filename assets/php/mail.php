<?php

    if(isset($_POST["name"]) && !empty($_POST["name"]) &&
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["subject"]) && !empty($_POST["subject"]) &&
    isset($_POST["message"]) && !empty($_POST["message"])){

        $name = $_POST["name"];
        $mail = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $additional_headers = 'From: ' . $mail . "\r\n" . "Name: " . $name;

        $message = wordwrap($message, 70, "\r\n");

        $clean_message = spam_scrubber($message);

        $additional_headers = 'From: ' . $mail . "\r\n" . "Name: " . $name;

        $clean_message = wordwrap($clean_message, 70, "\r\n");

        mail( "contact@danielweb.es", $subject, $message, $additional_headers );

        echo "<script type='text/javascript'>alert('El email se envio correctamente.'); window.location.href = 'https://danielweb.es#contact';</script>";
        
    }

    function spam_scrubber($value) {
        // Palabras y caracteres comunes en el spam
        $spam_words = array('viagra', 'cialis', 'poker', 'casino', 'xxx', 'porn', '$$$', 'http', 'https', 'dinero', 'financi', 'message');
        $spam_characters = array('#', '%', '&', '*');
      
        // Elimina las palabras y caracteres comunes del mensaje
        $value = str_ireplace($spam_words, '', $value);
        $value = str_ireplace($spam_characters, '', $value);
      
        // Devuelve el mensaje sin spam
        return $value;
    }

?>