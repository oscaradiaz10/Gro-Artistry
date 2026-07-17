<?php
/**
 * SMTP configuration template.
 *
 * Copy this file to "mailer-config.php" (same folder) and fill in your
 * real credentials. mailer-config.php is gitignored so secrets never
 * get committed.
 */

return [
    // SMTP server host, e.g. 'smtp.gmail.com', 'smtp.office365.com', or your host's mail server
    'host' => 'smtp.example.com',

    // Usually 587 (TLS) or 465 (SSL)
    'port' => 587,

    // 'tls' or 'ssl'
    'encryption' => 'tls',

    // Full SMTP login (often the full email address)
    'username' => 'your-smtp-username@example.com',

    // SMTP password or app password (NOT your regular account password for Gmail/Outlook - use an app password)
    'password' => 'your-smtp-password',

    // "From" address shown on outgoing mail (often must match the SMTP username)
    'from_email' => 'your-smtp-username@example.com',
    'from_name' => 'Gro Artistry Website',

    // Where contact form submissions are delivered
    'to_email' => 'oscar.di@me.com',
    'to_name' => 'Oscar Diaz',
];
