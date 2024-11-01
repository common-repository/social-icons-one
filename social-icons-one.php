<?php
/*
  Plugin Name: Social Icons One
  Plugin URI: http://admin-builder.com
  Description: Add specific social icons to all the posts
  Version: 1.1.2
  Author: rootabout
  Author URI: http://admin-builder.com
  License: GPLv2 or later
  Text Domain: Social Icons One
 */

 if (!function_exists('get_plugins')) {

     require_once ABSPATH.'wp-admin/includes/plugin.php';
 }
 $plugin_folder = get_plugins('/'.plugin_basename(dirname(__FILE__)));
 $plugin_file = basename((__FILE__));

 require_once 'abExport.php';

 add_filter('the_content', 'sio_the_content_callback');

 if (!function_exists('sio_the_content_callback')) {
     function sio_the_content_callback($content)
     {
         global $abGen;
         if (is_single()) {
             //general values
            $iconsSize = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'iconsSize');
            $sioAlign = $abGen->getField('abOption_cPage_socialMediaOne','tab1','sioAlign');

             $fbActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'fbActive');
             $twitterActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'twitterActive');
             $gpActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'gpActive');
             $LnkInActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'LnkInActive');
             $PintActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'PintActive');
             $InstActive = $abGen->getField('abOption_cPage_socialMediaOne', 'tab1', 'InstActive');
             $fContent = '';
             if ($fbActive) {
                 $fContent .= '<a href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><img src="'.plugin_dir_url(__FILE__).'/img/fb-'.$iconsSize.'.png" alt="Facebook link" /></a>';
             }
             if ($twitterActive) {
                 $fContent .= '<a href="https://twitter.com/home?status=Check out my post at '.get_permalink().'"><img src="'.plugin_dir_url(__FILE__).'/img/twitter-'.$iconsSize.'.png" alt="Twitter link" /></a>';
             }
             if ($gpActive) {
                 $fContent .= '<a href="https://plus.google.com/share?url='.get_permalink().'"><img src="'.plugin_dir_url(__FILE__).'/img/gp-'.$iconsSize.'.png" alt="Google Plus link" /></a>';
             }
             if ($LnkInActive) {
                 $fContent .= '<a href="https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'&title='.get_the_title().'&summary=&source="><img src="'.plugin_dir_url(__FILE__).'/img/in-'.$iconsSize.'.png" alt="Google Plus link" /></a>';
             }
             if ($PintActive) {
                 $fContent .= '<a href="https://pinterest.com/pin/create/button/?url='.get_permalink().'&media=&description='.get_the_title().'"><img src="'.plugin_dir_url(__FILE__).'/img/pint-'.$iconsSize.'.png" alt="Pinterest link" /></a>';
             }

           //post specific values:
           $postSignature = get_post_meta(get_the_ID(), 'abMB_metabox1textbox1', true);

             if (!empty($postSignature)) {
                 $fSignature = $postSignature;
             }

           //if there's an image
           if (!empty($fImage)) {
               $fSignature = '<img src="'.$fImage.'" class="sImage" alt="Signature Image" />';
           }

           // decisions decisions

             $SignatureHTML = '<div class="sioContainer" style="text-align:'.$sioAlign.';">'.$fContent.'</div>';
             $content = $content.$SignatureHTML;
         }

         return $content;
     }
 }

if (!function_exists('sio_register_style')) {
    function sio_register_style()
    {
        wp_enqueue_style('sio-style', plugin_dir_url(__FILE__).'/style.css');
    }
    add_action('wp_enqueue_scripts', 'sio_register_style');
}
