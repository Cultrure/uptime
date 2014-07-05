<?php
/*
 * Copyright (C) 2014 Timo Salola <timo@salola.fi>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$uptime = exec('cat /proc/uptime');
$uptime = explode('.', $uptime);

$hostname = exec('hostname -f');
?>
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Aukko.net</title>
        <meta name="description" content="Aukko.net server">
        <meta name="author" content="Timo Salola">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        
        <style type="text/css">
            body
            {
                background-color: #3b3b3b;
                color: #fbfbfb;
            }
            
            a, a:visited
            {
                color: #fbfbfb;
            }
            
            #hostname
            {
                text-align: center;
                margin-bottom: 10px;
            }
            
            #uptime
            {
                text-align: center;
                margin-bottom: 10px;
                
            }
            
            #copy
            {
                text-align: center;
                position: fixed;
                width: 100%;
                bottom: 0;
            }
        </style>
    </head>

    <body lang="en">
        <div id="logo"></div>
        <div id="hostname">Hostname: <?php echo $hostname; ?></div>
        <div id="uptime"></div>
        <div id="copy"><a target="_blank" href="https://github.com/Cultrure/Server-info-page">Server info page</a> &copy; <a target="_blank" href="https://github.com/Cultrure">Timo Salola</a></div>
        <script type="text/javascript">
            var uptime = <?php echo $uptime[0] ?>;
            window.onload = function(){ updateTime() };
            
            var timer = window.setInterval(function(){ updateTime() }, 1000);
            
            function updateTime() {
                var string = "Uptime: ";
                var sec, min, hour, day;
                sec = uptime % 60;
                min = parseInt(uptime / 60 % 60);
                hour = parseInt(uptime / 3600 % 24);
                day = parseInt(uptime / 86400);

                string = string + day + "days, " + hour + "hours, " + min + 
                        "mins, " + sec + "secs";

                document.getElementById("uptime").innerHTML = string;
                uptime++;
            }
        </script>
    </body>
</html>