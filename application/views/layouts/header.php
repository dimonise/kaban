<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 03.06.2017
 * Time: 7:04
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тамнун - сервис поиска и оказания услуг</title>
    <link href="/css/reset.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/css/animate.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/js/owl.carousel/dist/assets/owl.carousel.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="/js/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        $(window).ready(function () {
            if (document.documentElement.clientWidth > 768) {
                new WOW().init();
            }
        });
    </script>
</head>
<body>
<div class="wrapper">
    <header class="header-up">
        <a href="/"><img src="images/logo1.png" class="logo"></a>
        <section class="performer">
            <div class="buttons">
                <a href="" class="button-performer-1 wow fadeInLeft">Найти исполнителя</a>
                <a href="registration" class="button-performer-2 wow fadeInRight">Стать исполнителем</a>
                <a href="login" class="button-performer-2 wow fadeInRight">Вход</a>
                <a href="/ru" class="button-performer-2 wow fadeInRight">RU</a>
                <a href="/en" class="button-performer-2 wow fadeInRight">EN</a>
            </div>
        </section>
    </header>