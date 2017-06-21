
<?php 
	include_once 'header.php'; 
	include_once '../controller/dlr_controller.php';
    $today_sent_failure_reports = get_today_sent_or_failed_data();
    $today_pending_report = get_qued_data($user_details['sender_id']);
?>
	<div>
		<h1>Welcome <?php echo $user_details['user_name']; ?></h1>
	</div>
	<section class="container">
    <div class="col-md-10 col-md-offset-1" style="height: 35em">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">SMS status</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <canvas id="pieChart" style="height:250px"></canvas>
            </div>
        </div>
    </div>
</section>
<?php 
    if(!empty($today_sent_failure_reports)){
      $total_html = "";
      $failed = 0;
      $sent = 0;
      $delivered = 0;
      foreach ($today_sent_failure_reports as $sno => $today_sent_failure_report) {

        switch ($today_sent_failure_report['StatusCode']) {
          case '300':
            $html_content1 = '<tr class="danger">';
            $failed++;
          break;

          case '200':
            $html_content1 = '<tr class="warning">';
            $sent++;
          break;

          case '201':
            $html_content1 = '<tr class="success">';
            $delivered++;
          break;
        }
        // $html_content2 = "<td>".++$sno."</td><td>".$today_sent_failure_report['SendTime']."</td><td>".$today_sent_failure_report['MessageText']."</td><td>".$today_sent_failure_report['MessageTo']."</td><td>".$today_sent_failure_report['StatusText']."</td><tr>";
        // $total_html = $total_html.$html_content1.$html_content2;

      }
        // echo "$total_html";
    // echo "sent: ". $sent ." Delivered ". $delivered ." Failed ". $failed;
    }else{
      echo "No records found on today";
    }

      
     ?>
<script type="text/javascript">
var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
var pieChart = new Chart(pieChartCanvas);
var PieData = [{
    value: <?php echo $failed; ?>,
    color: "#f56954",
    highlight: "#f56954",
    label: "Failed"
}, {
    value: <?php echo $delivered; ?>,
    color: "#00a65a",
    highlight: "#00a65a",
    label: "Deliverd"
}, {
    value: <?php echo $sent; ?>,
    color: "#3c8dbc",
    highlight: "#3c8dbc",
    label: "Sent"
}];
var pieOptions = {

    segmentShowStroke: true,

    segmentStrokeColor: "#fff",

    segmentStrokeWidth: 2,

    percentageInnerCutout: 50,

    animationSteps: 100,

    animationEasing: "easeOutBounce",

    animateRotate: true,

    animateScale: false,

    responsive: true,

    maintainAspectRatio: true,

    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
};
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
pieChart.Doughnut(PieData, pieOptions);
</script>
<?php include_once 'footer.php'; ?>