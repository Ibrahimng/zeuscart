<?php
/**
* GNU General Public License.

* This file is part of ZeusCart V4.

* ZeusCart V4 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 4 of the License, or
* (at your option) any later version.
* 
* ZeusCart V4 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Foobar. If not, see <http://www.gnu.org/licenses/>.
*
*/


/**
 * This class contains functions to get and update the site moto details from the database
 *
 * @package  		Core_Settings_CSiteSettings
 * @category  		Core
 * @author    		AjSquareInc Dev Team
 * @link   		http://www.zeuscart.com
   * @copyright 		Copyright (c) 2008 - 2013, AjSquare, Inc.
 * @version  		Version 4.0
 */


class Core_Settings_CSiteSettings 
{
	
	
	/**
	 * Stores the output
	 *
	 * @var array $output
	 */	
	 
	var $output = array();
	
	/**
	 * Stores the error messages
	 *
	 * @var array $errormessages
	 */	
	
	var $errormessages = array();
	
	/**
	 * Function gets the site moto details from the database 
	 * 
	 * 
	 * @return string
	 */	 	
		
	function siteMoto()
	{
		
		
			$sql = "SELECT set_name,set_value FROM `admin_settings_table` where set_name='Site Moto'";
			$query = new Bin_Query();
			if($query->executeQuery($sql))
			{		
				
				return Display_DSiteSettings::siteMoto($query->records);
			}
			else
			{
				return '<div class="error_msgbox" style="width:644px;">Site Moto Settings Not Found</div>';
			}
	}
	
	/**
	 * Function updates the changes made in the site moto details into the table 
	 * 
	 * 
	 * @return string
	 */	 	
	
	function updateSiteMoto()
	{
		$sql = "UPDATE admin_settings_table SET set_value='".$_POST['moto']."' where set_name='Site Moto'";
			$query = new Bin_Query();
			if($query->updateQuery($sql))
			{		
				
				return '<div class="success_msgbox" style="width:644px;">Site Moto Successfully Changed to <b> '.$_POST['moto'].'</b>. </div>';
			}
			else
			{
				return '<div class="error_msgbox" style="width:644px;">Site Moto Settings Not Found</div>';
			}
	}
}	
 ?>