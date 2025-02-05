<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Title Website -->
    <title><?php echo ucfirst($subData['pageTitle'])?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT ?>/public/assets/clients/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/responsive.css">
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">
        <?php
        //Render Slider Right Cart
        $this->RenderView('blocks/SlideRightCart',$slideCart);
        // Render Header
        $this->RenderView('blocks/Header',$header);
        // End Render Header
        $this->RenderView($views,$subData);
        //Render Footer
        $this->RenderView('blocks/Footer',$footer)
        //End Render Footer
        ?>
    <!-- All JS Plugins -->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/main.js"></script>

    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/submain.js"></script>
</body>
</html>