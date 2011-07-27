<?php
/*
 * Database API
 *
 * Copyright (c) 2006  The Red Barons
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class Database
{
    var $db;
    
    function Database($host, $type, $username, $password, $database)
    {
        $db = mysql_connect($host, $username, $password);
        if(!$db)
            $this->db = false;
        if(!mysql_select_db($database, $db))
            $this->db = false;
        else
            $this->db = $db;    
    }
    
    function query($sql)
    {
        $q = mysql_query($sql, $this->db);
        return $q;
    }
    
    function getAll($q)
    {
        for($count = 0; $row = mysql_fetch_array($q, MYSQL_ASSOC); $count++)
            $result[$count] = $row;
        
        return $result;
    }
    
    function getRow($q)
    {
        $result = mysql_fetch_array($q, MYSQL_ASSOC);
        
        return $result;
    }
    
    function getOne($q)
    {
        $result = mysql_fetch_array($q, MYSQL_NUM);
        
        return $result[0];
    }
}
?>
