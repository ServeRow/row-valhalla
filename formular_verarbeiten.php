<body bgcolor="#000000"><font color="white">
<?php
    switch($_GET['Problem']) {
        case 1:
            echo 'you have wrong client files on the main folder. Authserver does not let anyone connect with leaking or wrong files <br /><br />
Be sure you installed the patch in the same folder<br /><br />
take off your firewall. if the firewall deletes any files<br /><br />
';
            break;
 
        case 2:
            echo 'Klick on DOWNLOAD WITH BROWSER option <br /><br /> if google chrome tells you this file might be infected. chose the option to ignore it
<br /><br />try a different browser';
            break;
 
        case 3:
            echo 'Some players are using unregistred or nonofficial version of operating system(windows). <br />this is a big issue because ryl doesnt runs stable on fake or unregistred operating systems. <br /> until now we have not found a fix for it.';  
            break;
 
        case 4:
            echo 'take off any vpn (virtual private network).  ';
            break;
 
        case 5:
            echo '100 monsters/100monsters/100monsters.<br />the first 100 monsters are at your first map. lowest level location of that map.<br />
the next 100 monsters are on your second map. the first leveling place of that map.<br /> the last 100 monsters are at cavernon. at the first leveling place of that map.';
            break;

        case 6:
            echo 'Pin Code is a random password you will need to recover or change your main password. its kind of a double protection.';
            break;

        case 7:
            echo 'Cape can be upgraded by RYL Cape Pearl which gets droped from bosses.<br />
Rings and Necklaces can be upgraded by Mistery Pearl which gets droped from bosses.<br />
you need 3 pearls for one upgrade.';
            break;

	case 8:
            echo 'Metals can be farmed at edin ghosts, gems at lion island ghosts.';
            break;
 
        default:
            echo 'this page is under maintenance, please try again or come back later.';
    }
?>