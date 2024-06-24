<?php

/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2020-01-02 15:12
 * @File name           : tinfo.inc.php
 */

$sysconf['template']['base'] = 'php';
$sysconf['template']['responsive'] = true;

$sysconf['template']['classic_library_subname'] = 0;
$sysconf['template']['classic_slide_transition'] = 'blur';
$sysconf['template']['classic_slide_animation'] = 'none';
$sysconf['template']['classic_slide_delay'] = 5000;
$sysconf['template']['classic_popular_collection'] = 1;
$sysconf['template']['classic_popular_collection_item'] = 6;
$sysconf['template']['classic_new_collection'] = 1;
$sysconf['template']['classic_new_collection_item'] = 6;
$sysconf['template']['classic_top_reader'] = 1;
$sysconf['template']['classic_suggestion'] = 1;
$sysconf['template']['classic_map'] = 1;
$sysconf['template']['classic_map_link'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5202777119857!2d106.86667377409593!3d-6.194872160688721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f441ee896075%3A0xf3a23a7673bc053a!2sSEAMEO%20RECFON!5e0!3m2!1sid!2sid!4v1711868058651!5m2!1sid!2sid';
$sysconf['template']['classic_map_desc'] = 'Jl. Utan Kayu Raya No. 1A, RT. 1/RW. 8, Utan Kayu Utara, Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13120';
$sysconf['template']['classic_fb_link'] = 'https://www.facebook.com/groups/senayan.slims';
$sysconf['template']['classic_twitter_link'] = 'https://twitter.com/slims_official';
$sysconf['template']['classic_youtube_link'] = 'https://youtube.com';
$sysconf['template']['classic_instagram_link'] = 'https://instagram.com/slims.sdc';
$sysconf['template']['classic_phone_number'] = '(021) 22116225';
$sysconf['template']['classic_mail_address'] = 'library@seameo-recfon.org';
$sysconf['template']['visitor_log_voice'] = 1;
$sysconf['template']['classic_footer_about_us'] = <<<HTML
<p>As a complete Library Management System, SLiMS (Senayan Library Management System) has many features that will help libraries and librarians to do their job easily 
and quickly. Follow <a target="_blank" href="https://slims.web.id/web/pages/about/">this link</a> to show some features provided by SLiMS.</p>
HTML;
$sysconf['template']['classic_library_disableslide'] = 0;


$sysconf['template']['option'][$sysconf['template']['theme']] = [
    'phone' => [
        'dbfield' => 'classic_phone_number',
        'label' => __('Phone Number'),
        'type' => 'text',
        'width' => '100',
        'default' => '(021) 22116225'
    ],
    'mail' => [
        'dbfield' => 'classic_mail_address',
        'label' => __('Mail Address'),
        'type' => 'text',
        'width' => '100',
        'default' => 'library@seameo-recfon.org'
    ],
    'map-link' => [
        'dbfield' => 'classic_map_link',
        'label' => __('Map URL'),
        'type' => 'longtext',
        'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5202777119857!2d106.86667377409593!3d-6.194872160688721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f441ee896075%3A0xf3a23a7673bc053a!2sSEAMEO%20RECFON!5e0!3m2!1sid!2sid!4v1711868058651!5m2!1sid!2sid',
        'width' => '100',
        'max' => 1000
    ],
    'map-desc' => [
		'dbfield' => 'classic_map_desc',
        'label' => __('Map Description'),
        'type' => 'longtext',
        'width' => '100',
        'class' => 'ckeditor',
        'max' => 1000
    ],
    'fb-link' => [
        'dbfield' => 'classic_fb_link',
        'label' => __('Facebook URL'),
        'type' => 'longtext',
        'default' => 'https://www.facebook.com/groups/senayan.slims',
        'width' => '100',
        'max' => 1000
    ],
    'youtube-link' => [
        'dbfield' => 'classic_youtube_link',
        'label' => __('Youtube URL'),
        'type' => 'longtext',
        'default' => 'https://youtube.com',
        'width' => '100',
        'max' => 1000
    ],
    'instagram-link' => [
        'dbfield' => 'classic_instagram_link',
        'label' => __('Instagram URL'),
        'type' => 'longtext',
        'default' => 'https://www.instagram.com/slims.sdc',
        'width' => '100',
        'max' => 1000
    ],
];
