<?php
/**
 * Oreo  : The appetite comes when eating
 * Copyright (c) SoulChange. (http://www.facebook.com/soulchange)
 *
 * Licensed under The MIT License
 
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) SoulChange. (http://www.facebook.com/soulchange)
 * @link          http://soulchange.github.io/Oreo
 * @author        SoulChange
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
return [

    /*
     * Production Mode:
     * production: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * dev: Errors and warnings shown.
     *
     * test Mode:
     * testing: Errors and warnings shown.
     */
     "environment"=>"dev",
     /**
     * Configure basic information about the application.
     *
     * - defaultlanguage - The default language for translation, formatting currencies and numbers, date and time.
     * - encoding - The encoding used for HTML + database connections.
     * - default_page - Name of default page.
     * - use_package - if application can load packages.
     * - package_path - Path of packages controllers.
     * - use_ajax - if application can load ajax.
     * - ajax_path - Path of ajax controllers.
     * - use_database - if application can load database.
     * - core_language- The default language for core.
     * - appname - Name of application.
     */
     "appname" => "Oreo",
     "defaultlanguage" => "en",
     "encoding" => "UTF-8",
     "default_page" => "welcome",
     "package" => [
       false,'apps',"packages" // value, controller, packages folder
      ],
     "ajax" => [
       true,'ajax' // value,  ajax folder
      ],
     "database" => true,
     "core_language" => "en"

];
