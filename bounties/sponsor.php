<?php
include '../config/defaults.php';
include 'bounties.php';
include $fs_base . '/libs/Util.php';
$toolbar_mode = 'bounties';
$content_file = './sponsor.html';
$sponsor  = Util::getFormData('sponsor');

/* Send sponsorship request by email. */
if (isset($sponsor['submit'])) {
    $error = array();
    if (!empty($sponsor['name']) && !empty($sponsor['link']) &&
        !empty($sponsor['email']) && !empty($sponsor['prize']) &&
        !empty($sponsor['id'])) {
        /* Blacklist. */
        if (preg_match('/sandra-..@mail\.com|vilyam..@darksites\.com/i', $sponsor['email'])) {
            die('Spammer!');
        }

        $message  = 'Bounty: ' . $sponsor['id'] . "\n";
        $message .= 'Prize: ' . $sponsor['prize'] . "\n";
        $message .= 'Name: ' . $sponsor['name'] . "\n";
        $message .= 'Company: ' . $sponsor['company'] . "\n";
        $message .= 'Link: ' . $sponsor['link'] . "\n";
        $message .= 'Email: ' . $sponsor['email'] . "\n";
        $message .= 'Notes: ' . $sponsor['notes'] . "\n";
        mail('bounties@horde.org', 'Bounty Sponsorship: ' . $sponsor['id'],
             $message, 'From: ' . $sponsor['email'] . "\r\n");

        /* PayPal url and params. */
        $url = 'https://www.paypal.com/cgi-bin/webscr';
        $params['cmd'] = '_xclick';
        $params['business'] = 'chuck@horde.org';
        $params['currency_code'] = 'USD';
        $params['no_shipping']  = '1';
        $params['item_name'] = 'Bounty ' . $sponsor['id'];
        $params['amount'] = sprintf('%01.2f', ($sponsor['prize'] + 0.3) / 0.971);
        $params['return'] = $base_url . '/bounties/sponsor_sent.php';
        $params['cancel_return'] = $base_url . '/bounties/sponsor.php';

        /* Put together the url and redirect. */
        $url = Util::addParameter($url, $params);
        header('Location: ' . $url);
        exit;
    }
    if (empty($sponsor['prize'])) {
        $error['prize'] = true;
    }
    if (empty($sponsor['name'])) {
        $error['name'] = true;
    }
    if (empty($sponsor['link'])) {
        $error['link'] = true;
    }
    if (empty($sponsor['email'])) {
        $error['email'] = true;
    }
}

$subsite_title = 'Sponsor a Horde Bounty';
include $fs_base . '/templates/horde.inc';
