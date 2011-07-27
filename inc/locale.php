<?php
/*
 * Locale Class
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

class Locale
{
    var $region;
    var $def;
    var $offset;
    var $dst_enabled;
    
    function Locale($region, $offset, $dst_enabled)
    {
        $this->region = $region;
        
        //get region locale definition file
        if(!is_file(PATH_LOCALES . "$region.ini"))
            $this->def = false;
        else
            $this->def = parse_ini_file(PATH_LOCALES . "$region.ini", true);
        
        //set timezone data
        $server_offset = (date("O")) / 100;
        $offset = (-1 * $server_offset) + $offset;
        if($dst_enabled)
        {
            if(date("I"))
                $offset += 1;
        }
        $this->offset = $offset;
    }
    
    function format($datetime = NULL, $format = NULL, $server_generated = false)
    {
        if(is_null($datetime))
            $datetime = date("Y-m-d H:i:s");
            
        if(is_array($datetime))
        {
            if(is_null($format))
                return $datetime;
            else
                $format = $this->getFormat($format);
            if($server_generated)
                $datetime["hour"] += $this->offset;
            $string = date($format, mktime($datetime["hour"], $datetime["minute"],
                $datetime["second"], $datetime["month"], $datetime["day"], $datetime["year"]));
            return $string;
        }
        else
        {
            $datetime = explode(' ', $datetime);
            $date = explode('-', $datetime[0]);
            $time = explode(':', $datetime[1]);
            
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];
            
            $hour = $time[0];
            $minute = $time[1];
            $second = $time[2];
            
            $datetime = array(
                "hour"       => $hour,
                "minute"     => $minute,
                "second"     => $second,
                "month"      => $month,
                "day"        => $day,
                "year"       => $year);
            if(is_null($format))
            {
                return $datetime;
            }
            else
            {
                //FIX THIS CODE!!!!
                if($server_generated)
                    $datetime["hour"] += $this->offset;
                $string = date($format, mktime($datetime["hour"], $datetime["minute"],
                $datetime["second"], $datetime["month"], $datetime["day"], $datetime["year"]));
                return $string;
            }
        }
    }
    
    function getFormat($format)
    {
        if(!isset($this->def["formats"][$format]))
            return $format;
        else
            return $this->def["formats"][$format];
    }
}
?>
