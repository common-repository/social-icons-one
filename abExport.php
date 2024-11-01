<?php
     $abError = false;
    include_once ABSPATH.'wp-admin/includes/plugin.php';
    if (!is_plugin_active('admin-builder/admin-builder.php')) {
      if(!function_exists('sample_admin_notice__success'))
           {
        function sample_admin_notice__success()
        {
          $pluginInstalled = false;
          if (!function_exists('get_plugins')) {
            require_once ABSPATH.'wp-admin/includes/plugin.php';
          }
          $allPlugins = get_plugins();
          foreach ($allPlugins as $key => $value) {
            if ($key === 'admin-builder/admin_builder.php') {
              $pluginInstalled = true;
            }
           }
            if ($pluginInstalled){
              if (!is_plugin_active('admin-builder/admin_builder.php')) {
                $abError = true;
                $url = admin_url();
                echo '<div class="notice notice-error is-dismissible">';
                echo '<h3>Admin Builder Plugin is not ACTIVE!</h3>';
                echo '<p>';
                echo 'To get the full functionality , activate Admin Builder from the <a href="'.$url.'/plugins.php">plugins directory</a>.';
                echo '</p>';
                echo '</div>';
              } else {
                $theJson = '';
              }
             } else {
              $abError = true;
              echo '<div class="notice notice-error is-dismissible">';
              echo '<h3>Admin Builder Plugin is not installed!</h3>';
              echo '<p>';
              echo 'To get the full functionality , install Admin Builder.';
              echo '</p>';
              echo '<p>';
              $plugin_name = 'admin-builder';
              $install_link = '<a href="'.esc_url(network_admin_url('plugin-install.php?tab=plugin-information&amp;plugin='.$plugin_name.'&amp;TB_iframe=true&amp;width=600&amp;height=550')).'" class="thickbox" title="More info about '.$plugin_name.'">Install '.$plugin_name.'</a>';
              echo $install_link;
              echo '</p>';
              echo '</div>';
             }
            }
            add_action('admin_notices', 'sample_admin_notice__success');
           }
           }
           if (!$abError) {

    $theJson = '{\"menus\":[{\"label\":\"Posts\",\"type\":\"post\",\"name\":\"posts\",\"unique\":true,\"children\":[],\"$$hashKey\":\"object:60\"},{\"label\":\"Pages\",\"type\":\"page\",\"name\":\"pages\",\"unique\":true,\"children\":[],\"$$hashKey\":\"object:61\"},{\"label\":\"Social Icons One\",\"type\":\"cPage\",\"name\":\"socialMediaOne\",\"unique\":false,\"children\":[{\"label\":\"Tab1\",\"name\":\"tab1\",\"context\":\"normal\",\"priority\":\"default\",\"fields\":[{\"name\":\"iconsSize\",\"type\":\"select\",\"label\":\"Icons Size\",\"description\":\"Select the size of the Social Media icons\",\"selectType\":\"custom\",\"oArr\":[{\"label\":\"Default\",\"value\":\"24x24\",\"$$hashKey\":\"object:244\"},{\"label\":\"64 x 64\",\"value\":\"64x64\",\"$$hashKey\":\"object:255\"},{\"label\":\"48 x 48\",\"value\":\"48x48\",\"$$hashKey\":\"object:264\"},{\"label\":\"32 x 32\",\"value\":\"32x32\",\"$$hashKey\":\"object:276\"},{\"label\":\"24 x 24\",\"value\":\"24x24\",\"$$hashKey\":\"object:1778\"},{\"label\":\"16 x 16\",\"value\":\"16x16\",\"$$hashKey\":\"object:1787\"}],\"$$hashKey\":\"object:133\"},{\"name\":\"sioAlign\",\"type\":\"select\",\"label\":\"Align\",\"description\":\"How to align the social icons (left, right, center)\",\"selectType\":\"custom\",\"oArr\":[{\"label\":\"Default\",\"value\":\"right\",\"$$hashKey\":\"object:1017\"},{\"label\":\"Left\",\"value\":\"left\",\"$$hashKey\":\"object:1028\"},{\"label\":\"Right\",\"value\":\"right\",\"$$hashKey\":\"object:1037\"},{\"label\":\"Center\",\"value\":\"center\",\"$$hashKey\":\"object:1046\"}],\"$$hashKey\":\"object:923\"},{\"name\":\"fbActive\",\"type\":\"checkbox\",\"label\":\"Facebook\",\"description\":\"Check to make the Facebook icon available\",\"extraText\":\"Activate\",\"$$hashKey\":\"object:277\"},{\"name\":\"twitterActive\",\"type\":\"checkbox\",\"label\":\"Twitter\",\"description\":\"Check to make the Twitter icon available\",\"extraText\":\"Activate\",\"$$hashKey\":\"object:381\"},{\"name\":\"gpActive\",\"type\":\"checkbox\",\"label\":\"Google plus\",\"description\":\"Check to make the Google Plus icon available\",\"extraText\":\"Activate\",\"$$hashKey\":\"object:481\"},{\"name\":\"LnkInActive\",\"type\":\"checkbox\",\"label\":\"LinkedIn\",\"description\":\"Check to make the LinkedIn icon available\",\"extraText\":\"Activate\",\"$$hashKey\":\"object:578\"},{\"name\":\"PintActive\",\"type\":\"checkbox\",\"label\":\"Pinterest\",\"description\":\"Check to make the Pinterest icon available\",\"extraText\":\"Activate\",\"$$hashKey\":\"object:625\"}],\"$$hashKey\":\"object:86\"}],\"capability\":\"manage_options\",\"handler\":\"smo_menu_handler\",\"pageTitle\":\"Social Media One Settings\",\"$$hashKey\":\"object:83\",\"pageDescription\":\"These are the global defaults settings of the Social Media one Plugin. Individual settings can be controlled by each page or  post where it is available in metaboxes.\"}]}';
if(class_exists('generalFunctionality')){
    $abGeneral = new generalFunctionality();
    $abGeneral->loadNew($theJson,$plugin_folder[$plugin_file]);
    }
   }
