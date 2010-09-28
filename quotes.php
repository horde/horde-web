<?php

$quotes = array(
    '"Horde Groupware is great. The sheer wealth of functionality that this install provides is a real joy. Nothing else to say but to congratulate the Horde developers for such a great application. Highly recommended."
-- Edin Kadribasic',

    '"I like Horde quite much, it provides a comfortable web mailer (IMP) and some nice extra tools which give you a really comfortable groupware feeling. Thanks to the Horde guys for finally providing a package, which ultimately satisfies my needs and is so easy to setup!"
-- Tobias Schlitt',

    '"Of all the products, along with Microsoft Exchange, Horde has the greatest functionality."
-- Iain Roberts, Axiom Tech',

    '"Of the myriad web e-mail interfaces Horde is quite possibly the premier - it has an amazing breadth of features, is elegently customizable (which we will demonstrate in this series), is straight forward to configure, and has an appealing user interface."
-- Adam Williams, Whitemice Consulting',

    '"Overall I\'ve been finding this a fantastic package, the web client offers that vast majority of what you can get through something like Thunderbird, with the obvious advantage that you can read your mail from any computer."
-- Demian Turner, Seagull',

    '"Let me introduce you to one of the best webmails, Horde webmail. Horde allows you to manage your emails easily with its rich features and stability. It rocks in its performance and features."
-- Gabrielle Capstick, Host Department',

    '"Horde is one of PHPs oldest and most successful projects."
-- Mike Naberezny, Maintainable Software',

    '"The Horde project is hands down the most feature rich, customizable, versatile, and extensible web-based e-mail client on the internet today. A totally open source project, Horde provides more functionality from web-based e-mail than anything else on the market. Horde is presently the granddaddy of all webmail software as far as content, capability, and security are concerned."
-- Ubiquity Hosting Solutions',

    '"Horde can do what the university\'s current Oracle products can not: provide a simple-to-use interface to access its content. Horde is an amazing product. It rivals \'enterprise\' software that costs six-figures."
-- Gregory Szorc, Case Western Reserve University',

    '"IMHO, DIMP is the Ferrari of the webmail software. You\'ll end up with a webmail with features that no other software has match for."
-- Mário Gamito, qmail rules',

    '"Chora is by far the most interesting tool. I really like how the tool looks and works."
-- Michael Flanakin',

    '"Overall Horde is a great choice for organizations with experienced Linux admins, who want to extend the life of old server hardware and want a feature-rich and mature solution."
-- The WebWonker',

    '"Thanks to its extensive base Horde is perhaps the most feature-rich platform around."
-- Alastair Otter, MyBroadband',

    '"Horde Groupware is probably not the first collaboration software that comes to mind when thinking about deploying a new system. Perhaps it should. Contrary to most of the popular collaboration software on the market such as Open-Xchange, Scalix and Zimbra, the guys behind Horde understand how to write efficient code and use appropriate tools."
-- Viktor Petersson, Email Service Guide',

);

$quote = nl2br(htmlspecialchars($quotes[rand(0, count($quotes) - 1)]));
