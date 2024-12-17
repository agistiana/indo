<?php
$receiving_email_address = 'agistiananurohman@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// Sanitasi dan validasi input
$from_name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$from_email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$from_message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

try {
    $contact->to = $receiving_email_address;
    $contact->from_name = htmlspecialchars($from_name);
    $contact->from_email = filter_var($from_email, FILTER_SANITIZE_EMAIL);
    $contact->message = htmlspecialchars($from_message);

    // Menambahkan pesan dengan format yang diharapkan
    $contact->add_message('Name: ' . $from_name);
    $contact->add_message('Email: ' . $from_email);
    $contact->add_message('Message: ' . $from_message, 10);

    echo $contact->send();
} catch (Exception $e) {
    // Tangani kesalahan
    echo 'An error occurred: ' . $e->getMessage();
}
?>
