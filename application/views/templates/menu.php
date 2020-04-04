<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo css_url("menu/reset.css") ?>"> <!-- CSS reset -->
    <link rel="stylesheet" href="<?php echo css_url("menu/style.css") ?>"> <!-- Resource style -->
    <script src="<?php echo js_url("menu/modernizr.js") ?>"></script> <!-- Modernizr -->

    <title>Stretchy Navigation | CodyHouse</title>
</head>
<style>
    li span{
        color:white;
        background-color: black;
        padding:15px;
        padding-top:0;
        padding-bottom:0;
        margin:0;
        border-radius: 10px;
    }
    .cd-stretchy-nav ul a::after {
        background: url(<?php echo img_url("menu/cd-sprite-1.svg") ?>) no-repeat 0 0;
    }

    .cd-stretchy-nav.add-content ul a::after {
        background-image: url(<?php echo img_url("menu/cd-sprite-2.svg") ?>);
    }

    .cd-stretchy-nav.edit-content .cd-nav-trigger::after {
        background: url(<?php echo img_url("menu/cd-sprite-3.svg") ?>) no-repeat 0 0;

    }

    .cd-stretchy-nav.edit-content ul a::after {
        background-image: url(<?php echo img_url("menu/cd-sprite-3.svg") ?>);

    }
</style>
<body>
    <header>
        <nav class="cd-stretchy-nav">
            <a class="cd-nav-trigger" href="#0">
                
                <span aria-hidden="true"></span>
            </a>

            <ul>
                <!-- todo lang -->
                <?php
                $this->load->helper("url");
                $profile = "";
                $home = "";
                $patient = "";
                console_log("'".uri_string(current_url())."'");
                if(strpos(uri_string(current_url()), "patient/index") || uri_string(current_url()) == "patient/index"){
                    $patient = "active";
                }
                if(strpos(uri_string(current_url()), "account/home") || uri_string(current_url()) == "account/home"){
                    $home = "active";
                } 

                
                ?>
                <li ><a href="<?php echo base_url("account/home");?>" class="<?php echo $home;?>"><span>Home</span></a></li>
                <li><a href="<?php echo base_url("patient/index");?>" class="<?php echo $patient;?>"><span>Patient</span><i class="fa fa-user-injury"></i></a></li>
                <li><a href="<?php echo base_url("account/logout");?>"><span>Logout</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>



    <script src="<?php echo js_url("menu/main.js") ?>"></script>
    <script src="<?php echo js_url("jquery.min.js") ?>"></script> <!-- Resource jQuery -->
</body>

</html>