<?php
/*
 *      config.php
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
 
/*****************************************************************************/
/* IMPORTANT NOTE: Please make sure this file is *NOT* publicly accessible.  */
/* -- One method to do this would be '$ chmod 0600 config.php' from a shell. */
/*****************************************************************************/

/* DATABASE INFORMATION */

// database host (usually 'localhost')
define('CONFIG_DB_HOST', 'localhost');

// database type (usually 'mysql')
define('CONFIG_DB_TYPE', 'mysql');

// database username
define('CONFIG_DB_USER', 'groundcontrol');

// database password
define('CONFIG_DB_PASSWORD', 'password');

// database name
define('CONFIG_DB_NAME', 'groundcontrol');

// database prefix (NOTE: If your server uses 'database prefixes', in the format
// of 'username_databasename', put your prefix here, and we'll handle the rest.)
define('CONFIG_DB_PREFIX', 'ud');

// determine if a database prefix is in use; act accordingly
if (strlen(CONFIG_DB_PREFIX) > 0)
{
    define('CONFIG_DB_FULLNAME', CONFIG_DB_PREFIX . '_' . CONFIG_DB_NAME);
}
else
{
    define('CONFIG_DB_FULLNAME', CONFIG_DB_NAME);
}

/* DATE AND TIME CONFIGURATION */

// default timezone (will be replaced by user's settings, when logged in)
define('CONFIG_TIMEZONE', -5);

// default DST setting (will be replaced by user's settings, when logged in)
define('CONFIG_DST', true);

/* PATHS */
//define('PATH_ROOT', getcwd() . '/');
define('PATH_API', PATH_ROOT . 'api/');
define('PATH_INC', PATH_ROOT . 'inc/');

/* INCLUDES */
include(PATH_INC . 'DatabaseManager.inc.php');
include(PATH_INC . 'SensorManager.inc.php');

?>
