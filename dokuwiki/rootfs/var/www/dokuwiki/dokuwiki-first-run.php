<?php
// First-run landing page — served at the root while install.php exists.
// Redirects to install.php if setup is not yet done, or shows a restart
// prompt if the user has completed the installer but not yet restarted the add-on.

$users_file = '/share/dokuwiki/conf/users.auth.php';

$setup_complete = false;
if (file_exists($users_file)) {
    $fh = fopen($users_file, 'r');
    while (($line = fgets($fh)) !== false) {
        $line = trim($line);
        if ($line !== '' && $line[0] !== '#') {
            $setup_complete = true;
            break;
        }
    }
    fclose($fh);
}

if (!$setup_complete) {
    header('Location: install.php');
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DokuWiki — Restart Required</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.12);
            padding: 2.5rem 3rem;
            max-width: 480px;
            text-align: center;
        }
        h1 { color: #2d8a4e; margin-top: 0; }
        p  { color: #444; line-height: 1.6; }
        .hint { font-size: .875rem; color: #888; margin-top: 1.5rem; }
    </style>
</head>
<body>
    <div class="card">
        <h1>&#10003; Setup Complete</h1>
        <p>Your DokuWiki account has been created.</p>
        <p><strong>Restart the DokuWiki add-on</strong> in Home Assistant to finish.<br>
        The wiki will open automatically after restart.</p>
        <p class="hint">Settings → Add-ons → DokuWiki → Restart</p>
    </div>
</body>
</html>
