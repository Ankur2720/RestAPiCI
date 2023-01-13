<?php
$basepath = $this->config->item('base');
$username = $this->session->userdata('admin_username');
$crmid = $this->session->userdata('admin_id');
$admin_level = $this->session->userdata('admin_level');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CRM Home</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?= $basepath . 'assets/css/bootstrap.css' ?>" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="<?= $basepath . 'assets/css/font-awesome.css' ?>" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
    <link href="<?= $basepath . 'assets/js/morris/morris-0.4.3.min.css' ?>" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="<?= $basepath . 'assets/css/custom.css' ?>" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <script src="<?= $basepath . 'assets/js/jquery-1.10.2.js' ?>"></script>
    <script src="<?= $basepath . 'assets/js/jquery.validate.js' ?>"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= $basepath . 'assets/js/bootstrap.min.js' ?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= $basepath . 'assets/js/jquery.metisMenu.js' ?>"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="<?= $basepath . 'assets/js/dataTables/jquery.dataTables.js' ?>"></script>
    <script src="<?= $basepath . 'assets/js/dataTables/dataTables.bootstrap.js' ?>"></script>

</head>
<body>
</body>
</html>