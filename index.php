<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
error_reporting(1);

$mainPath = $_SERVER['DOCUMENT_ROOT'].'/';
$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php
include 'inc/css.inc.php';
?>
</head>
<body>
<?php
include $mainPath.'classes/db.php';
include $mainPath.'classes/property.php';
include $mainPath.'security/settings.php';

$db = new DB($dsn, $db_user, $db_pass);

$menuKey = 'Apartments';
include 'inc/menu.inc.php';

if($cmd === 'Apartment-Add')
{
    $Apartment = new Apartment();
    $Apartment->title =  $_POST['title'];
    $Apartment->description =  $_POST['description'];
    $Apartment->price =  $_POST['price'];
    $Apartment->currency =  $_POST['currency'];
    $Apartment->totalArea =  $_POST['totalArea'];

    $Apartment->totalRooms =  $_POST['totalRooms'];
    $Apartment->floor =  $_POST['floor'];
    $Apartment->totalFloors =  $_POST['totalFloors'];
    echo $Apartment->Add();
}

if($cmd === 'Apartment-Show') {
    $Apartment = new Apartment();
    echo $Apartment->Show();
}

if($cmd === 'Apartment-List') {
    $Apartment = new Apartment();
    $add_Url = "/?cmd=Apartment-Show";
    echo '
    <a class="wrapper" href="' . $add_Url . '">add new apartment</a>
    <br/>
    
    <div class="wrapper">

    <table cellpadding="0" cellspacing="0" class="nav-list">'.chr(10);
    foreach($Apartment->GetList() as $item) {
        echo '
        <tr>
            <td class="apartment-list-cell">' . $item['title'] . '</td>
            <td class="apartment-list-cell">' . $item['totalArea'] . '</td>
            <td class="apartment-list-cell">' . $item['totalRooms'] . '</td>
            <td class="apartment-list-cell">' . $item['floor'] . '/' .$item['totalFloors'] . '</td>
            <td class="apartment-list-cell">' . $item['price'] . '</td>
            <td class="apartment-list-cell">' . $item['currency'] . '</td>
         </tr>'.chr(10);
    }
    echo '
    </table>

    </div>

    <br/>
    <a class="wrapper" href="' . $add_Url . '">add new apartment</a>'.chr(10);
}
?>
</body>
</html>