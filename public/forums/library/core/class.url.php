<?php if (!defined('APPLICATION')) exit();
/*
Copyright 2008, 2009 Vanilla Forums Inc.
This file is part of Garden.
Garden is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Garden is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Garden.  If not, see <http://www.gnu.org/licenses/>.
Contact Vanilla Forums Inc. at support [at] vanillaforums [dot] com
*/

/**
 * Handles analyzing and returning various parts of the current url.
 *
 * @author Mark O'Sullivan
 * @copyright 2009 Mark O'Sullivan
 * @license http://www.opensource.org/licenses/gpl-2.0.php GPL
 * @package Garden
 * @version @@GARDEN-VERSION@@
 * @namespace Garden.Core
 */

/**
 * Handles analyzing and returning various parts of the current url.
 *
 * @package Garden
 */
class Gdn_Url {


   /**
    * Returns the path to the application's dispatcher. Optionally with the
    * domain prepended.
    *  ie. http://domain.com/[web_root]/index.php?/request
    *
    * @param boolean $WithDomain Should it include the domain with the WebRoot? Default is FALSE.
    * @return string
    */
   public static function WebRoot($WithDomain = FALSE) {
      $WebRoot = Gdn::Request()->WebRoot();

      if ($WithDomain)
         $Result = Gdn::Request()->Domain().'/'.$WebRoot;
      else
         $Result = $WebRoot;

      return $Result;
   }


   /**
    * Returns the domain from the current url. ie. "http://localhost/" in
    * "http://localhost/this/that/garden/index.php?/controller/action/"
    *
    * @return string
    */
   public static function Domain() {
      // Attempt to get the domain from the configuration array
      return Gdn::Request()->Domain();
   }


   /**
    * Returns the host from the current url. ie. "localhost" in
    * "http://localhost/this/that/garden/index.php?/controller/action/"
    *
    * @return string
    */
   public static function Host() {
      return Gdn::Request()->RequestHost();
   }


   /**
    * Returns any GET parameters from the querystring. ie. "this=that&y=n" in
    * http://localhost/index.php?/controller/action/&this=that&y=n"
    *
    * @return string
    */
   public static function QueryString() {
      return http_build_query(Gdn::Request()->GetRequestArguments(Gdn_Request::INPUT_GET));
   }


   /**
    * Returns the Request part of the current url. ie. "/controller/action/" in
    * "http://localhost/garden/index.php?/controller/action/".
    *
    * @param boolean $WithWebRoot
    * @param boolean $WithDomain
    * @param boolean $RemoveSyndication
    * @return string
    */
   public static function Request($WithWebRoot = FALSE, $WithDomain = FALSE, $RemoveSyndication = FALSE) {
      $Result = Gdn::Request()->Path();
      if($WithWebRoot)
         $Result = self::WebRoot($WithDomain).'/'.$Result;
      return $Result;
   }
}
