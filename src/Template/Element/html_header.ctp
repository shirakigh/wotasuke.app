<?php
$this->prepend('cssBottom', $this->Html->css('wotasuke/AdminLTE.min'));
$this->prepend('css', $this->Html->css('wotasuke/skins/skin-blue.min'));
$this->prepend('css', $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'));
$this->prepend('css', $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'));

$this->prepend('scriptBottom', $this->Html->script('wotasuke/app.min'));

//Tell the browser to be responsive to screen width
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'));
$this->prepend('meta', $this->Html->meta([
	'http-equiv' => 'X-UA-Compatible',
	'content' => 'IE=edge'
]));

$this->prepend('tb_body_attrs', ' class="hold-transition skin-blue sidebar-mini" ');
?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
