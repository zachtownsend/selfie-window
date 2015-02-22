<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdn.pubnub.com/pubnub-ds-b2.js"></script>

        <?php
			\helpers\assets::css(array(
				\helpers\url::template_path() . 'css/main.css',
				\helpers\url::template_path() . 'css/normalize.min.css',

			));
            helpers\assets::js(helpers\url::template_path() . 'js/vendor/modernizr-2.6.2.min.js');
		?>
    </head>
    <body>
    	<div id="main-wrapper">