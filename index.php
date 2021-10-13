<?php include('connection.php'); ?>

<?php
    $select_stmt = $db->prepare("SELECT * FROM visitors");
    $select_stmt->execute();
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Visit'],
          <?php
            foreach($select_stmt as $row) {
                echo "['".$row['country']."'," . $row['visit']."],";
            }
          ?>
        //   ['Work',     11], pattern จะเป็นแบบนี้
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        ]);

        var options = {
          title: 'Visit from country' // ชื่อหัวข้อ
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
