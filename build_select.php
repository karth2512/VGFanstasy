<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>VG Fantasy</title>
    <script src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="item_select.css">
    <script src="item_select.js" charset="utf-8"></script>
</head>

<body>
<script>
const messages = ['Enemy Hero Killed', 'Ally Hero Killed', 'The Kraken has Awaken', 'Enemy team collected from Gold Mine', 'Enemy is Impressive', 'You are a Nightmare', 'Triple Kill', 'Double Kill', 'Allied Turret Destroyed', 'Enemy Turret Destroyed', 'Kraken Unleashed', 'Gold Mine is Almost Full'];

function toasta() {
    var num = Math.floor((Math.random() * 11) + 1);
    Materialize.toast(messages[num], 4000);
}
</script>
<?php
session_start();
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM users";
$sql2=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($sql2))
{
  if($row["USERNAME"]==$_SESSION["user"])
  {
    $wins=$row["WIN"];
    $played=$row["PLAYED"];
    $email=$row["EMAIL"];
  }
}
?>
    <ul id="slide-out" class="side-nav amber lighten-1">
        <li>
            <div class="userView">
                <div class="background">
                    <img class="responsive-img" src="Images/sq.jpeg">
                </div>
                <a href="#!name"><span class="white-text name"><?php echo $_SESSION["user"]?></span></a>
            </div>
        </li>
        <li><a class="waves-effect" href="#!">Total Battels: <span><?php echo $played;?></span></a></li>
        <li><a class="waves-effect" href="#!">Wins: <span><?php echo $wins;?></span></a></li>
        <li><a class="waves-effect" href="welcome.php"><i class="material-icons">home</i>Home</a></li>
        <li><a href="team_summary.php"><i class="material-icons">change_history</i>Team</a></li>
        <li><a class="waves-effect" href="results.php" onclick="Materialize.toast('Match Found', 4000); setInterval(toasta, 1000);"><i class="material-icons">blur_on</i>Battle</a></li>
        <li><a class="waves-effect" href="aboutus.php"><i class="material-icons">supervisor_account</i>About Us</a></li>
        <li><a class="waves-effect" href="logout.php"><i class="material-icons">exit_to_app</i>Logout</a></li>
    </ul>

    <header class="valign-wrapper">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons medium valign">menu</i></a>
        <p class="valign">VG Fantasy</p>
    </header>
<?php
if(isset($_POST["cap-n"])&& isset($_POST["car-n"])&& isset($_POST["jung-n"])&&isset($_SESSION["user"]))
{
  //echo $_POST["cap-n"];
?>
    <!--Captain Start-->
    <div class="row">
        <div class="col s12 center-align">
            <div class="col s12">
                <img src="Images/VGPics/VG Icons/captain.png" alt="Captain" class="role tooltipped" data-position="bottom" data-delay="50"
                    data-tooltip="Captain">
            </div>
            <div class="col s12">
                <img src="Images/VGPics/VG Hero Portraits/<?php echo $_POST["cap-n"];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
            </div>
        </div>
    </div>

    <div class="row container selected-items center-align">
        <div class="col m2 s6 slot1">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item1"
                data-position="top" data-delay="50" data-tooltip="Slot 1">
        </div>
        <div class="col m2 s6 slot2">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item2"
                data-position="top" data-delay="50" data-tooltip="Slot 2">
        </div>
        <div class="col m2 s6 slot3">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item3"
                data-position="top" data-delay="50" data-tooltip="Slot 3">
        </div>
        <div class="col m2 s6 slot4">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item4"
                data-position="top" data-delay="50" data-tooltip="Slot 4">
        </div>
        <div class="col m2 s6 slot5">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item5"
                data-position="top" data-delay="50" data-tooltip="Slot 5">
        </div>
        <div class="col m2 s6 slot6">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="captain-item6"
                data-position="top" data-delay="50" data-tooltip="Slot 6">
        </div>
    </div>

    <div class="item-list container center-align">
        <hr>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown1"><img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Sorrowblade"></a>

                <ul id="dropdown1" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown2"><img src="Images/VGPics/VG Items/serpent-mask.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Serpent Mask"></a>

                <ul id="dropdown2" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown3"><img src="Images/VGPics/VG Items/poisoned-shiv.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Poisoned Shiv"></a>

                <ul id="dropdown3" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown4"><img src="Images/VGPics/VG Items/breaking-point.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Breaking Point"></a>

                <ul id="dropdown4" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown5"><img src="Images/VGPics/VG Items/tension-bow.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tension Bow"></a>

                <ul id="dropdown5" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown6"><img src="Images/VGPics/VG Items/bonesaw.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Bonesaw"></a>

                <ul id="dropdown6" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown7"><img src="Images/VGPics/VG Items/tornado-trigger.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tornado Trigger"></a>

                <ul id="dropdown7" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown8"><img src="Images/VGPics/VG Items/tyrants-monocle.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tyrants Monocle"></a>

                <ul id="dropdown8" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown9"><img src="Images/VGPics/VG Items/shatterglass.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shatterglass"></a>

                <ul id="dropdown9" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown10"><img src="Images/VGPics/VG Items/broken-myth.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Broken Myth"></a>

                <ul id="dropdown10" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown11"><img src="Images/VGPics/VG Items/frostburn.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Frostburn"></a>

                <ul id="dropdown11" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown12"><img src="Images/VGPics/VG Items/eve-of-harvest.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Eve Of Harvest"></a>

                <ul id="dropdown12" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown37"><img src="Images/VGPics/VG Items/aftershock.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aftershock"></a>

                <ul id="dropdown37" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown13"><img src="Images/VGPics/VG Items/echo.png" alt="Item" class="circle responsive-img tooltipped item-pic" data-position="top"
                        data-delay="50" data-tooltip="Echo"></a>

                <ul id="dropdown13" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown14"><img src="Images/VGPics/VG Items/clockwork.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Clockwork"></a>

                <ul id="dropdown14" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown15"><img src="Images/VGPics/VG Items/alternating-current.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Alternating Current"></a>

                <ul id="dropdown15" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown16"><img src="Images/VGPics/VG Items/slumbering-husk.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Slumbering Husk"></a>

                <ul id="dropdown16" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown17"><img src="Images/VGPics/VG Items/crucible.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crucible"></a>

                <ul id="dropdown17" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown18"><img src="Images/VGPics/VG Items/fountain-of-renewal.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Fountain Of Renewal"></a>

                <ul id="dropdown18" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown19"><img src="Images/VGPics/VG Items/aegis.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aegis"></a>

                <ul id="dropdown19" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown20"><img src="Images/VGPics/VG Items/metal-jacket.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Metal Jacket"></a>

                <ul id="dropdown20" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown21"><img src="Images/VGPics/VG Items/atlas-pauldron.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Atlas Pauldron"></a>

                <ul id="dropdown21" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown22"><img src="Images/VGPics/VG Items/journey-boots.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Journey Boots"></a>

                <ul id="dropdown22" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown23"><img src="Images/VGPics/VG Items/halcyon-chargers.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Chargers"></a>

                <ul id="dropdown23" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown24"><img src="Images/VGPics/VG Items/war-treads.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="War Treads"></a>

                <ul id="dropdown24" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown25"><img src="Images/VGPics/VG Items/nullwave-gauntlet.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Nullwave Gauntlet"></a>

                <ul id="dropdown25" class="dropdown-content black">
                    <li><a href="#!" onclick="slotOne('nullwave-gauntlet')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotTwo('nullwave-gauntlet')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotThree('nullwave-gauntlet')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotFour('nullwave-gauntlet')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotFive('nullwave-gauntlet')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSix('nullwave-gauntlet')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown26"><img src="Images/VGPics/VG Items/contraption.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Contraption"></a>

                <ul id="dropdown26" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown27"><img src="Images/VGPics/VG Items/stormcrown.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Stormcrown"></a>

                <ul id="dropdown27" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown28"><img src="Images/VGPics/VG Items/shiversteel.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shiversteel"></a>

                <ul id="dropdown28" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown29"><img src="Images/VGPics/VG Items/protector-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Protector Contract"></a>

                <ul id="dropdown29" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown30"><img src="Images/VGPics/VG Items/ironguard-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Ironguard Contract"></a>

                <ul id="dropdown30" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown31"><img src="Images/VGPics/VG Items/dragonblood-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Dragonblood Contract"></a>

                <ul id="dropdown31" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown32"><img src="Images/VGPics/VG Items/crystal-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crystal Infusion"></a>

                <ul id="dropdown32" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown38"><img src="Images/VGPics/VG Items/weapon-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Weapon Infusion"></a>

                <ul id="dropdown38" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown33"><img src="Images/VGPics/VG Items/halcyon-potion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Potion"></a>

                <ul id="dropdown33" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown34"><img src="Images/VGPics/VG Items/flare.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Flare"></a>

                <ul id="dropdown34" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown35"><img src="Images/VGPics/VG Items/scout-trap.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Scout Trap"></a>

                <ul id="dropdown35" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown36"><img src="Images/VGPics/VG Items/minion-candy.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Minion Candy"></a>

                <ul id="dropdown36" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#captain-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <!--Captain Ends-->
    <!--Carry-Starts-->
    <div class="row">
        <div class="col s12 center-align">
            <div class="col s12">
                <img src="Images/VGPics/VG Icons/carry.png" alt="Carry" class="role tooltipped" data-position="bottom" data-delay="50"
                    data-tooltip="Carry">
            </div>
            <div class="col s12">
                <img src="Images/VGPics/VG Hero Portraits/<?php echo $_POST["car-n"];?>.png" alt="Hero" class="circle responsive-img carry-img" data-key="adagio">
            </div>
        </div>
    </div>

    <div class="row container selected-items center-align">
        <div class="col m2 s6 slot1">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item1" data-position="top"
                data-delay="50" data-tooltip="Slot 1">
        </div>
        <div class="col m2 s6 slot2">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item2" data-position="top"
                data-delay="50" data-tooltip="Slot 2">
        </div>
        <div class="col m2 s6 slot3">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item3" data-position="top"
                data-delay="50" data-tooltip="Slot 3">
        </div>
        <div class="col m2 s6 slot4">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item4" data-position="top"
                data-delay="50" data-tooltip="Slot 4">
        </div>
        <div class="col m2 s6 slot5">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item5" data-position="top"
                data-delay="50" data-tooltip="Slot 5">
        </div>
        <div class="col m2 s6 slot6">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="carry-item6" data-position="top"
                data-delay="50" data-tooltip="Slot 6">
        </div>
    </div>

    <div class="item-list container center-align">
        <hr>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown39"><img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Sorrowblade"></a>

                <ul id="dropdown39" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown40"><img src="Images/VGPics/VG Items/serpent-mask.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Serpent Mask"></a>

                <ul id="dropdown40" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown41"><img src="Images/VGPics/VG Items/poisoned-shiv.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Poisoned Shiv"></a>

                <ul id="dropdown41" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', 'carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown42"><img src="Images/VGPics/VG Items/breaking-point.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Breaking Point"></a>

                <ul id="dropdown42" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown43"><img src="Images/VGPics/VG Items/tension-bow.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tension Bow"></a>

                <ul id="dropdown43" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown44"><img src="Images/VGPics/VG Items/bonesaw.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Bonesaw"></a>

                <ul id="dropdown44" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown45"><img src="Images/VGPics/VG Items/tornado-trigger.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tornado Trigger"></a>

                <ul id="dropdown45" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown46"><img src="Images/VGPics/VG Items/tyrants-monocle.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tyrants Monocle"></a>

                <ul id="dropdown46" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown47"><img src="Images/VGPics/VG Items/shatterglass.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shatterglass"></a>

                <ul id="dropdown47" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown48"><img src="Images/VGPics/VG Items/broken-myth.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Broken Myth"></a>

                <ul id="dropdown48" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown49"><img src="Images/VGPics/VG Items/frostburn.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Frostburn"></a>

                <ul id="dropdown49" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown50"><img src="Images/VGPics/VG Items/eve-of-harvest.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Eve Of Harvest"></a>

                <ul id="dropdown50" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown51"><img src="Images/VGPics/VG Items/aftershock.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aftershock"></a>

                <ul id="dropdown51" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown52"><img src="Images/VGPics/VG Items/echo.png" alt="Item" class="circle responsive-img tooltipped item-pic" data-position="top"
                        data-delay="50" data-tooltip="Echo"></a>

                <ul id="dropdown52" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown53"><img src="Images/VGPics/VG Items/clockwork.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Clockwork"></a>

                <ul id="dropdown53" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown54"><img src="Images/VGPics/VG Items/alternating-current.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Alternating Current"></a>

                <ul id="dropdown54" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown55"><img src="Images/VGPics/VG Items/slumbering-husk.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Slumbering Husk"></a>

                <ul id="dropdown55" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown56"><img src="Images/VGPics/VG Items/crucible.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crucible"></a>

                <ul id="dropdown56" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown57"><img src="Images/VGPics/VG Items/fountain-of-renewal.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Fountain Of Renewal"></a>

                <ul id="dropdown57" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown58"><img src="Images/VGPics/VG Items/aegis.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aegis"></a>

                <ul id="dropdown58" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown59"><img src="Images/VGPics/VG Items/metal-jacket.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Metal Jacket"></a>

                <ul id="dropdown59" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown60"><img src="Images/VGPics/VG Items/atlas-pauldron.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Atlas Pauldron"></a>

                <ul id="dropdown60" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown61"><img src="Images/VGPics/VG Items/journey-boots.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Journey Boots"></a>

                <ul id="dropdown61" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown62"><img src="Images/VGPics/VG Items/halcyon-chargers.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Chargers"></a>

                <ul id="dropdown62" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown63"><img src="Images/VGPics/VG Items/war-treads.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="War Treads"></a>

                <ul id="dropdown63" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item1')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item2')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item3')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown64"><img src="Images/VGPics/VG Items/nullwave-gauntlet.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Nullwave Gauntlet"></a>

                <ul id="dropdown64" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown65"><img src="Images/VGPics/VG Items/contraption.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Contraption"></a>

                <ul id="dropdown65" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown66"><img src="Images/VGPics/VG Items/stormcrown.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Stormcrown"></a>

                <ul id="dropdown66" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown67"><img src="Images/VGPics/VG Items/shiversteel.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shiversteel"></a>

                <ul id="dropdown67" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown68"><img src="Images/VGPics/VG Items/protector-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Protector Contract"></a>

                <ul id="dropdown68" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown69"><img src="Images/VGPics/VG Items/ironguard-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Ironguard Contract"></a>

                <ul id="dropdown69" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown70"><img src="Images/VGPics/VG Items/dragonblood-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Dragonblood Contract"></a>

                <ul id="dropdown70" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown71"><img src="Images/VGPics/VG Items/crystal-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crystal Infusion"></a>

                <ul id="dropdown71" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown72"><img src="Images/VGPics/VG Items/weapon-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Weapon Infusion"></a>

                <ul id="dropdown72" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown73"><img src="Images/VGPics/VG Items/halcyon-potion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Potion"></a>

                <ul id="dropdown73" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown74"><img src="Images/VGPics/VG Items/flare.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Flare"></a>

                <ul id="dropdown74" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown75"><img src="Images/VGPics/VG Items/scout-trap.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Scout Trap"></a>

                <ul id="dropdown75" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown76"><img src="Images/VGPics/VG Items/minion-candy.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Minion Candy"></a>

                <ul id="dropdown76" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#carry-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <!--Carry Ends-->
    <!--Jungler-Starts-->
    <div class="col s12 center-align">
        <div class="col s12">
            <img src="Images/VGPics/VG Icons/jungler.png" alt="Captain" class="role tooltipped" data-position="bottom" data-delay="50"
                data-tooltip="Jungler">
        </div>
        <div class="col s12">
            <img src="Images/VGPics/VG Hero Portraits/<?php echo $_POST["jung-n"];?>.png" alt="Hero" class="circle responsive-img jungler-img" data-key="adagio">
        </div>
    </div>
    </div>

    <div class="row container selected-items center-align">
        <div class="col m2 s6 slot1">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" id="jungler-item1"
                data-position="top" data-delay="50" data-tooltip="Slot 1">
        </div>
        <div class="col m2 s6 slot2">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                data-delay="50" id="jungler-item2" data-tooltip="Slot 2">
        </div>
        <div class="col m2 s6 slot3">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                data-delay="50" id="jungler-item3" data-tooltip="Slot 3">
        </div>
        <div class="col m2 s6 slot4">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                data-delay="50" id="jungler-item4" data-tooltip="Slot 4">
        </div>
        <div class="col m2 s6 slot5">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                data-delay="50" id="jungler-item5" data-tooltip="Slot 5">
        </div>
        <div class="col m2 s6 slot6">
            <img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                data-delay="50" id="jungler-item6" data-tooltip="Slot 6">
        </div>
    </div>

    <div class="item-list container center-align">
        <hr>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown77"><img src="Images/VGPics/VG Items/sorrowblade.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Sorrowblade"></a>

                <ul id="dropdown77" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('sorrowblade', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown78"><img src="Images/VGPics/VG Items/serpent-mask.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Serpent Mask"></a>

                <ul id="dropdown79" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('serpent-mask', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown80"><img src="Images/VGPics/VG Items/poisoned-shiv.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Poisoned Shiv"></a>

                <ul id="dropdown80" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('poisoned-shiv', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown81"><img src="Images/VGPics/VG Items/breaking-point.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Breaking Point"></a>

                <ul id="dropdown81" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('breaking-point', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown82"><img src="Images/VGPics/VG Items/tension-bow.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tension Bow"></a>

                <ul id="dropdown82" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tension-bow', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown83"><img src="Images/VGPics/VG Items/bonesaw.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Bonesaw"></a>

                <ul id="dropdown83" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('bonesaw', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown84"><img src="Images/VGPics/VG Items/tornado-trigger.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tornado Trigger"></a>

                <ul id="dropdown84" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tornado-trigger', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown85"><img src="Images/VGPics/VG Items/tyrants-monocle.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Tyrants Monocle"></a>

                <ul id="dropdown85" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('tyrants-monocle', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown86"><img src="Images/VGPics/VG Items/shatterglass.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shatterglass"></a>

                <ul id="dropdown86" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shatterglass', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown87"><img src="Images/VGPics/VG Items/broken-myth.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Broken Myth"></a>

                <ul id="dropdown87" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('broken-myth', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown88"><img src="Images/VGPics/VG Items/frostburn.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Frostburn"></a>

                <ul id="dropdown88" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('frostburn', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown89"><img src="Images/VGPics/VG Items/eve-of-harvest.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Eve Of Harvest"></a>

                <ul id="dropdown89" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('eve-of-harvest', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown90"><img src="Images/VGPics/VG Items/aftershock.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aftershock"></a>

                <ul id="dropdown90" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aftershock', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown91"><img src="Images/VGPics/VG Items/echo.png" alt="Item" class="circle responsive-img tooltipped item-pic" data-position="top"
                        data-delay="50" data-tooltip="Echo"></a>

                <ul id="dropdown91" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('echo', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown92"><img src="Images/VGPics/VG Items/clockwork.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Clockwork"></a>

                <ul id="dropdown92" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('clockwork', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown93"><img src="Images/VGPics/VG Items/alternating-current.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Alternating Current"></a>

                <ul id="dropdown93" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('alternating-current', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown94"><img src="Images/VGPics/VG Items/slumbering-husk.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Slumbering Husk"></a>

                <ul id="dropdown94" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('slumbering-husk', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown95"><img src="Images/VGPics/VG Items/crucible.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crucible"></a>

                <ul id="dropdown95" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crucible', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown96"><img src="Images/VGPics/VG Items/fountain-of-renewal.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Fountain Of Renewal"></a>

                <ul id="dropdown96" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('fountain-of-renewal', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown97"><img src="Images/VGPics/VG Items/aegis.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Aegis"></a>

                <ul id="dropdown97" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('aegis', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown98"><img src="Images/VGPics/VG Items/metal-jacket.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Metal Jacket"></a>

                <ul id="dropdown98" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('metal-jacket', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown99"><img src="Images/VGPics/VG Items/atlas-pauldron.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Atlas Pauldron"></a>

                <ul id="dropdown99" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('atlas-pauldron', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown100"><img src="Images/VGPics/VG Items/journey-boots.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Journey Boots"></a>

                <ul id="dropdown100" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('journey-boots', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown101"><img src="Images/VGPics/VG Items/halcyon-chargers.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Chargers"></a>

                <ul id="dropdown101" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-chargers', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown102"><img src="Images/VGPics/VG Items/war-treads.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="War Treads"></a>

                <ul id="dropdown102" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item1')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item2')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item3')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('war-treads', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown103"><img src="Images/VGPics/VG Items/nullwave-gauntlet.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Nullwave Gauntlet"></a>

                <ul id="dropdown103" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('nullwave-gauntlet', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown104"><img src="Images/VGPics/VG Items/contraption.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Contraption"></a>

                <ul id="dropdown104" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('contraption', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown105"><img src="Images/VGPics/VG Items/stormcrown.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Stormcrown"></a>

                <ul id="dropdown105" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('stormcrown', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown106"><img src="Images/VGPics/VG Items/shiversteel.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Shiversteel"></a>

                <ul id="dropdown106" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('shiversteel', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown107"><img src="Images/VGPics/VG Items/protector-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Protector Contract"></a>

                <ul id="dropdown107" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('protector-contract', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown108"><img src="Images/VGPics/VG Items/ironguard-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Ironguard Contract"></a>

                <ul id="dropdown108" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('ironguard-contract', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown109"><img src="Images/VGPics/VG Items/dragonblood-contract.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Dragonblood Contract"></a>

                <ul id="dropdown109" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('dragonblood-contract', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown110"><img src="Images/VGPics/VG Items/crystal-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Crystal Infusion"></a>

                <ul id="dropdown110" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('crystal-infusion', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown111"><img src="Images/VGPics/VG Items/weapon-infusion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Weapon Infusion"></a>

                <ul id="dropdown111" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('weapon-infusion', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown112"><img src="Images/VGPics/VG Items/halcyon-potion.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Halcyon Potion"></a>

                <ul id="dropdown112" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('halcyon-potion', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown113"><img src="Images/VGPics/VG Items/flare.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Flare"></a>

                <ul id="dropdown113" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('flare', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown114"><img src="Images/VGPics/VG Items/scout-trap.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Scout Trap"></a>

                <ul id="dropdown114" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('scout-trap', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
            <div class="col m1 s6">
                <a class="dropdown-button" href="#" data-activates="dropdown115"><img src="Images/VGPics/VG Items/minion-candy.png" alt="Item" class="circle responsive-img tooltipped item-pic"
                        data-position="top" data-delay="50" data-tooltip="Minion Candy"></a>

                <ul id="dropdown115" class="dropdown-content black">
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item1')">Slot 1</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item2')">Slot 2</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item3')">Slot 3</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item4')">Slot 4</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item5')">Slot 5</a></li>
                    <li><a href="#!" onclick="slotSelect('minion-candy', '#jungler-item6')">Slot 6</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <!--Jungle-Ends-->
    <form action="team_summary.php" method="post"><div class="phpData">
        <p>
            <input type="hidden" value="sorrowblade" name="captain-item1-php"id="captain-item1-php">
            $<input type="hidden" value="sorrowblade" name="captain-item2-php" id="captain-item2-php">
            $<input type="hidden" value="sorrowblade" name="captain-item3-php" id="captain-item3-php">
            $<input type="hidden" value="sorrowblade" name="captain-item4-php" id="captain-item4-php">
            $<input type="hidden" value="sorrowblade" name="captain-item5-php" id="captain-item5-php">
            $<input type="hidden" value="sorrowblade" name="captain-item6-php" id="captain-item6-php">
            $<input type="hidden" value="sorrowblade" name="carry-item1-php" id="carry-item1-php">
            $<input type="hidden" value="sorrowblade" name="carry-item2-php" id="carry-item2-php">
            $<input type="hidden" value="sorrowblade" name="carry-item3-php" id="carry-item3-php">
            $<input type="hidden" value="sorrowblade" name="carry-item4-php" id="carry-item4-php">
            $<input type="hidden" value="sorrowblade" name="carry-item5-php" id="carry-item5-php">
            $<input type="hidden" value="sorrowblade" name="carry-item6-php" id="carry-item6-php">
            $<input type="hidden" value="sorrowblade" name="jungler-item1-php" id="jungler-item1-php">
            $<input type="hidden" value="sorrowblade" name="jungler-item2-php" id="jungler-item2-php">
            $<input type="hidden" value="sorrowblade" name="jungler-item3-php" id="jungler-item3-php">

            $<input type="hidden" value="sorrowblade" name="jungler-item4-php" id="jungler-item4-php">
            $<input type="hidden" value="sorrowblade" name="jungler-item5-php" id="jungler-item5-php">
            $<input type="hidden" value="sorrowblade" name="jungler-item6-php" id="jungler-item6-php">
        </p>
    </div>
    <div class="center-align proceed-btn">
        <a href="hero_select.php" class="waves-effect waves-light btn-large amber-text black"><i class="material-icons left">navigate_before</i>Hero Select</a>
        <button class="waves-effect waves-light btn-large amber-text black">Create Team<i class="material-icons right">navigate_next</i></a>
    </div>
  </form>
<?php
$_SESSION["H1"]=$_POST["cap-n"];
//echo $_SESSION["H1"];
$_SESSION["H2"]=$_POST["car-n"];
//echo $_SESSION["H2"];
$_SESSION["H3"]=$_POST["jung-n"];
//echo $_SESSION["H3"];
}
else {
header("Location: login.php");
}
 ?>
</body>

</html>
