<?php
include '../config/defaults.php';
include 'bounties.php';
include $fs_base . '/libs/Util.php';
$toolbar_mode = 'bounties';
$content_file = './continuous.html';
$sponsor  = Util::getFormData('sponsor');

/* Send sponsorship request by email. */
if (isset($sponsor['submit'])) {
    $error = array();
    if (empty($sponsor['amount']) || $sponsor['amount'] < 50) {
        $error['amount'] = true;
    }
    if (empty($sponsor['months'])) {
        $error['months'] = true;
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
    if (empty($error)) {
        $message .= 'Amount: ' . $sponsor['amount'] . "\n";
        $message .= 'Payment: ' . $sponsor['payment'] . "\n";
        $message .= 'Months: ' . $sponsor['months'] . "\n";
        $message .= 'Name: ' . $sponsor['name'] . "\n";
        $message .= 'Company: ' . $sponsor['company'] . "\n";
        $message .= 'Link: ' . $sponsor['link'] . "\n";
        $message .= 'Email: ' . $sponsor['email'] . "\n";
        $message .= 'Notes: ' . $sponsor['notes'] . "\n";
        mail('bounties@horde.org', 'Continuous Sponsorship: ' . $sponsor['id'],
             $message, "From: bounties@horde.org\r\n");

        /* PayPal url and params. */
        $url = 'https://www.paypal.com/cgi-bin/webscr';
        $params['business'] = 'chuck@horde.org';
        $params['currency_code'] = 'USD';
        $params['no_shipping']  = '1';
        $params['item_name'] = 'Bounty Sponsorship for ' . $sponsor['months'] . ' month(s)';
        if ($sponsor['payment'] == 'lump') {
            $params['cmd'] = '_xclick';
            $params['amount'] = $sponsor['amount'] * $sponsor['months'];
        } else {
            $params['cmd'] = '_xclick-subscriptions';
            $params['a3'] = $sponsor['amount'];
            $params['p3'] = '1';
            $params['t3'] = 'M';
            $params['src'] = '1';
            $params['sra'] = '1';
            $params['srt'] = $sponsor['months'];
        }
        $params['return'] = $base_url . '/bounties/sponsor_sent.php';
        $params['cancel_return'] = $base_url . '/bounties/sponsor.php';

        /* Put together the url and redirect. */
        $url = Util::addParameter($url, $params);
        header('Location: ' . $url);
        exit;
    }
}

$subsite_title = 'Continuous Sponsorship';
include $fs_base . '/templates/horde.inc';
