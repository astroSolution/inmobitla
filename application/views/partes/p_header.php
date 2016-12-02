<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title><?php echo (isset($titulo)?$titulo:"INMOBIITLA");?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="<?php echo base_url('public/css/tema.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/css/inmobi.css');?>">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/visorjs/style.css')?>" />

      <script type="text/javascript" src="<?php echo base_url('public/visorjs/jquery.js')?>"></script>
    <script type="text/javascript" src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js');?>"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
      });

    </script>

  </head>
  <body>
