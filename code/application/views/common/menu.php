<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/semantic.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/semantic.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
</head>
<body>
<div class="ui teal borderless inverted menu nav" id="menu">
    <div class="ui container">
        
        <!-- <div class="ui compact menu" >
            <div class="ui simple dropdown item">主题 <i class="dropdown icon"></i> 
                <div class="menu">
                    <div class="item" id="light">默认主题</div>
                    <div class="item" id="dark">黑暗主题</div>
                </div>
            </div>
        </div>
         -->
        <div class="ui floating scrolling dropdown theme basic button tiny">
            <span class="text">主题</span>
            <div class="menu transition hidden">
                <div id="light" class="item" data-value="Default" data-text="默认主题">默认主题</div>
                <div id="dark" class="item" data-value="Classic" data-text="黑暗主题">黑暗主题</div>
            </div>
        </div>
        <div class="right menu">
            <div class="ui dropdown item">
                <img width="35" class="ui circular  image" src="<?php echo base_url(); ?>/assets/images/user.png">
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="<?php echo base_url(); ?>friend" class="item">
                        朋友管理
                    </a>
                    <a href="<?php echo base_url(); ?>home" class="item">
                        待办列表
                    </a>
                    <a onclick="logout()" class="item">退出登录</a>
                </div>
                <form class="logoutform" action="<?php echo base_url(); ?>logout" method="POST">
                    <input type="hidden" name="_token" value="">
                </form>
            </div>
        </div>
    </div>
</div>

<div id="suggest-message-div" style="display: none;" class="ui mini icon positive message">
    <i class="close icon"></i>
    <i class="checkmark icon"></i>
    <div id="suggest-content" class="content">
        <p></p>
    </div>
</div>