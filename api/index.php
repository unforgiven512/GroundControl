<?php
/*
 *      api/index.php
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

// define ACTUAL root
define("PATH_ROOT", realpath("./../") . "/");

// include once stuff
include_once(PATH_ROOT . 'config.php');

// mock JSON for testing
$json = '{"data":
	{
		"time": "1311261124",
                "urgent": false,
		"sensors":
		[
			{
				"id": 1,
				"value": 71.324
			},
			{
				"id": 2,
				"value": 65.20
			}
		]
	}
}';

// database connection
//$db = &ADONewConnection('mysql');
//$db->Connect(CONFIG_DB_HOST, CONFIG_DB_USER, CONFIG_DB_PASSWORD, CONFIG_DB_FULLNAME);

// decode JSON data from Arduino (or other data source)
$data = json_decode($json, true);

// get total amount of sensors (as preconfigured in the database)
//$sql = "select * from sensors";
//$rs = &$db->Execute($sql);
//$sensorTotal = $rs->RecordCount();

// store data from sensors into database
/*for($i = 0; $i < $sensorTotal; $i++)
{
    $id = $data["data"]["sensors"][$i]["id"];
    $value = $data["data"]["sensors"][$i]["value"];
    $timestamp = $data["data"]["time"];
    //sql(INSERT TO sensor_data WHERE sensor_id = $id VALUE $value);
    
    // FIXME Currently, we are only inserting into `sensor_data_float`
    // We will need to add conditions here to determine the type of 
    // sensor we have, and insert the data into the correct table.
    $sql = "insert into sensor_data_float (timestamp,sensor_id,data) ";
    $sql .= "values (".$db->DBTimeStamp($timestamp).",$id,$value)";
    $db->Execute($sql);
}*/


//$shipto = $conn->qstr("John's Old Shoppe");
//$sql = "insert into orders (customerID,EmployeeID,OrderDate,ShipName) ";
//$sql .= "values ('ANATR',2,".$conn->DBDate(time()).",$shipto)";
//if ($conn->Execute($sql) === false) {
//         print 'error inserting: '.$conn->ErrorMsg().'<BR>';
//}


//echo "The time is: ";
//echo $data["data"]["time"];
//echo "<br />";
//echo $data["data"]["sensors"][0]["label"] . ": ";
//echo $data["data"]["sensors"][0]["value"];
//echo $data["data"]["sensors"][0]["symbol"];
//echo "<br />";
//echo $data["data"]["sensors"][1]["label"] . ": ";
//echo $data["data"]["sensors"][1]["value"];
//echo $data["data"]["sensors"][1]["symbol"];

//var_dump(json_decode($json, true));

$sm = SensorManager::GetInstance();
$totalSensors = $sm->getTotalSensors();
echo $totalSensors;

?>
