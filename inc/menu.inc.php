<?php
$menu_array = array("Apartments"=>"/?cmd=Apartment-List", "Houses"=>"/?cmd=House-List");
?>
<ul class="menu">
<?php
foreach($menu_array as $title => $url) {
?>
    <li <?php echo($menuKey === $title ? ' class = "active"': '');?> >
        <a href="<?php echo($url);?>">
            <?php echo($title);?>
        </a>
    </li>
<?php
}
?>
</ul>