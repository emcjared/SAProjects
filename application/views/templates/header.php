<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ETD SA Projects</title>

    <?php 
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />';
    echo '<link href="' . $this->config->base_url() . 'Content/themes/base/all.css" rel="stylesheet" type="text/css" />';
    //echo '<link href="' . $this->config->base_url() . 'Content/Content/DataTables-1.10.12/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />';
    echo '<link href="' . $this->config->base_url() . 'Content/bootstrap.min.css" rel="stylesheet" type="text/css" />';
    echo '<link href="' . $this->config->base_url() . 'assets/css/theme.css" rel="stylesheet" type="text/css" />';
    echo '<link href="' . $this->config->base_url() . 'assets/css/datatable1.css" rel="stylesheet" type="text/css" />';

    echo '<script src="'. $this->config->base_url() . 'Scripts/jquery-3.0.0.min.js" type="text/javascript"></script>';
    echo '<script src="'. $this->config->base_url() . 'Scripts/jquery-ui-1.11.4.min.js" type="text/javascript"></script>';
    echo '<script src="'. $this->config->base_url() . 'Scripts/bootstrap.min.js" type="text/javascript"></script>';
    echo '<script src="'. $this->config->base_url() . 'Scripts/DataTables-1.10.12/media/js/jquery.dataTables.min.js" type="text/javascript"></script>';
    echo '<script src="'. $this->config->base_url() . 'Scripts/DataTables-1.10.12/media/js/dataTables.bootstrap.js" type="text/javascript"></script>'; 
    ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="container">
        <div id="wrapper">
            <div id="header">
                <h1>ETD SA Projects</h1>
                <div id="accountinfo" class="nav topcorner">
                    <!--<ul>
                        <li>Login</li>
                    </ul>-->
                </div>
                    <nav id="primary_nav_wrap">
                        <ul>
                            <li>
                                <a href="<?php echo $this->config->site_url('project/create'); ?>" class="<?php echo ($topmenu && $topmenu==='project')?'active':'notactive'; ?>">Project Requests</a>
                                <ul>
                                    <li><a href="<?php echo $this->config->site_url('project/create'); ?>">Create</a></li>
                                    <li><a href="<?php echo $this->config->site_url('project'); ?>">List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo $this->config->site_url('reports/nna'); ?>" class="<?php echo ($topmenu && $topmenu==='report')?'active':'notactive'; ?>">Reports</a>
                                <ul>
                                    <li><a href="<?php echo $this->config->site_url('reports/nna'); ?>">Now Next After</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
            </div>
            <div id="content">
                <h1><?php echo $title; ?></h1>

