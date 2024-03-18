<?php

    require_once("rcon_code.php");
 
# Set Defaults
    
    $IP = "";
    $PORT = "";
    $PASSWORD = "";
    $COMMAND = "";
    $OUTPUT = "No Output - Submit a Command";

# GET and SEND Post data

if ($_POST)
{ 
    $IP = $_POST["IP"];
    $PORT = $_POST["PORT"];
    $PASSWORD = $_POST["PASSWORD"];
    $COMMAND = $_POST["COMMAND"];

    $srcds_rcon = new srcds_rcon();
    $OUTPUT = $srcds_rcon->rcon_command($IP, $PORT, $PASSWORD, $COMMAND);
}

# Display Form

    print ("<html>");
    print ("<head>");
    print ("<link rel='stylesheet' type='text/css' href='style.css'>");
    print ("<SCRIPT LANGUAGE='JavaScript' SRC='script.js'></SCRIPT>");
    print ("</head>");
    print ("<body><noscript><div class='title'><font color='#FF0000'><b>WARNING!</b></font> Javascript is disabled. Some functions will not operate!</div><br></noscript>");
    print ("<table class='maintable'>");
    print ("<tr>");
    print ("<td class='custom'>");
    print ("<font class='info'>Login:</font><br><hr>");
    print ("<form action='rcon.php' method='post' name='CUSTOMCOMMAND'>");
    print ("IP: <input type='text' name='IP' value=\"$IP\"/><br>");
    print ("PORT: <input type='text' name='PORT' value=\"$PORT\"/><br>");
    print ("PASSWORD: <input type='password' name='PASSWORD' value=\"$PASSWORD\"/><br>");
    print ("</td>");
    print ("<td rowspan='3' class='txtarea'>");
    print ("RCON Output:<br><hr><textarea rows='30' cols='110'>$OUTPUT</textarea>");
    print ("</td></tr>");
    print ("<tr>");
    print ("<td class='custom'>");
    print ("<font class='info'>Custom Command:</font><br><hr>");    
    print ("<input type='text' name='COMMAND' /><input type='submit' value='Submit'><br>");
    print ("</form>");            
    print ("</td>");
    print ("</tr>");        
    print ("<tr>");
    print ("<td class='custom'>");
    print ("<font class='info'>Common Commands:</font><br><hr><form name='COMMONCOMMANDS'>");
    print ("<input type='button' value='Server Status' onclick='serverstatus()'>");
    print ("<input type='button' value='Map List' onclick='maplist()'>");
    print ("<input type='button' value='Restart' onclick='restart()'>");
    print ("<br>");
    print ("<input type='text' name='MAPNAME' value='Map Name'><input type='button' value='Change Map' onclick='changemap()'>");
    print ("<br>");
    print ("<input type='text' size='5' name='KICKID' value='ID'><input type='text' name='KICKREASON' value='Reason'><input type='button' value='Kick ID' onclick='kickid()'>");
    print ("<br>");
    print ("<input type='text' name='SEARCH' value=''><input type='button' value='CVAR Search' onclick='search()'>");    
    print ("<br>");
    print ("<input type='text' name='SAY' value=''><input type='button' value='Say' onclick='say()'>");
    print ("</form></td>");   
    print ("</table>");
    print ("</body>");
    print ("</html>");
       
?>
