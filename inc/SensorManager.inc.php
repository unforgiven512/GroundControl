<?php
/*
 *      sensors.inc.php
 *      
 *      Copyright 2011 Gerad Munsch <gmunsch@unforgivendevelopment.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 *      
 *      
 */

class SensorManager
{
	public $db;
	private static $instance;
	
	private function __construct()
	{
		//$db = DatabaseManager::getInstance();
		$db = &ADONewConnection('mysql');
		$db->Connect(CONFIG_DB_HOST, CONFIG_DB_USER, CONFIG_DB_PASSWORD, CONFIG_DB_FULLNAME);
	}
	
	public static function getInstance()
	{
 		if ($instance == NULL)
		{
 			$instance = new SensorManager();
		}
		
 		return $instance;
	}
	
 	public function getTotalSensors()
	{
		// get total sensors
		$sql = "select * from sensors";
		$rs = $db->Execute($sql);
		$sensorTotal = $rs->RecordCount();
		
		return $sensorTotal;
	}
}

// sample program
/*
$sm = SensorManager::GetInstance();
$totalSensors = $sm->getTotalSensors();
*/

?>
