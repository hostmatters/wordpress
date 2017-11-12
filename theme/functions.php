<?php


function boilerplate_setup() {
    // Hide the admin bar
	show_admin_bar(false);
	// Initialise the provider util classes
	\Utils\Provider::init();
}

add_action('init', 'boilerplate_setup');

function boilerplate_mailer(PHPMailer $mailer) {
    // Override the default email host
    if (MAIL_HOST) { $mailer->Host = MAIL_HOST; }
    // Override the default email port
    if (MAIL_PORT) { $mailer->Port = MAIL_PORT; }
    // Override the default email credentials
    // Only supply these if your email server requires creds
    if (MAIL_USERNAME) { $mailer->Username = MAIL_USERNAME; }
    if (MAIL_PASSWORD) { $mailer->Password = MAIL_PASSWORD; }
    // Add the auth flag if the email server requires authentication
    if (MAIL_AUTH) { $mailer->SMTPAuth = true; }
    // Flag as SMTP if required
    if (MAIL_SMTP) { $mailer->IsSMTP(); }
}

add_action('phpmailer_init', 'boilerplate_mailer');