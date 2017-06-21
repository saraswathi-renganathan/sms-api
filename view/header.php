<?php 
include_once '../admin/controller/common_functions.php';
include_once '../controller/header_functions.php';
landing_page_session_check();
?>
<?php
  if(!empty($_SESSION['user_details'])){
    $user_details = $_SESSION['user_details'];
  $date = date("Y-m-d", time());
  $colors =  array('yellow','aqua','red','green');
  $conn = db_connect();
  $condition = "`id` =".$user_details['id']."";
  $addons_paid = select('`addons`','`users`',$condition,$conn);
  $condition1 = "`id` IN (".$addons_paid[0]['addons'].")";
  $default_sidebar_values_paths = select('*','`addons`',$condition1,$conn);
  $exploded_values = explode('/',$_SERVER['REQUEST_URI']);
  $url = end($exploded_values);
  $paid_addon_id =  explode(',',$addons_paid[0]['addons'] );
  $condition2 = "`path` ='".$url."'";
  $verify = select('`id`,`path_type`','`addons`', $condition2, $conn);

  $condition3 = "`id` =".$user_details['id']."";
  $sms_count = select('`sms_count`','`users`',$condition,$conn);
  $_SESSION['user_details']['sms_count'] = $sms_count[0]['sms_count'];
  $subscribed = 0;
  foreach ($paid_addon_id as $value) {
    if($verify != "empty"){
      if ($value == $verify[0]['id']) {
            $subscribed = 1;
      }
    }
  }
  if($verify != "empty"){
    if ($verify[0]['path_type'] == "primary") {
      if($subscribed == 0){
        header("Location:error.php");
      }
    }
  }
}
  ?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="../css/count.css">
    <link rel="stylesheet" type="text/css" href="../css/add_on.css">
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script src="../js/charts/Chart.min.js"></script>
    <script src="../js/jquery-2.2.3.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88660059-2', 'auto');
      ga('send', 'pageview');

    </script>
    <script type="text/javascript">
      function request(id){
        addon_name =  document.getElementById(id).value;
        $.ajax({
        type: "POST",
        url: "send_request.php",
        data: {addon_name : addon_name},
        success: function(data) {  
          // console.log(data);  
          if (data == "Request sent") {
            document.getElementById('request').innerHTML = "<div class='alert alert-success'><strong>Request sent !</strong> Will be processed soon.</div>"; 
          } else{
            document.getElementById('request').innerHTML = "<div class='alert alert-warning'><strong>"+data+"!</strong></div>"; 
          }           
        }
      });
      }
    </script>
    <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=58019786"></script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- header -->
    <header class="main-header">
      <a href="home.php" class="logo">
        <span class="logo-mini"><b>V</b></span>
        <span class="logo-lg"><b>Vefetch</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <span><?php echo get_count_data($user_details['id'], $user_details['mobile_number']); ?></span>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../img/default.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $user_details['user_name']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="../img/default.png" class="img-circle" alt="User Image">
                  <p>
                    Bye <?php echo $user_details['user_name']; ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <?php
              $i = 0;
              foreach ($default_sidebar_values_paths as $value) {
                if ($i == 4) {
                  $i = 0;
                }
                if($value['addon_name'] != "error"){
                  echo '<li><a href="'.$value['path'].'"><i class="fa fa-circle-o text-'.$colors[$i].'"></i> <span>'.$value['addon_name'].'</span></a></li>';
                  $i++;
                }
               } 
            ?>
          </ul>
        </section>
    </aside>
    <!-- Content -->
    <div class="content-wrapper">
      <section class="content">