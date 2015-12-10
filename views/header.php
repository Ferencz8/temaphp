<?php
if (!isset($headerLinks)) {
    $headerLinks = array(array('/', '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home', 'active'));
}
?>

<header>
    <div class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <?php foreach ($headerLinks as $value) : ?>
                <li class="<?php echo $value[2]; ?>">
                    <a href="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
                </li>
            <?php endforeach; ?> 
        </ul>
    </div>
</header>