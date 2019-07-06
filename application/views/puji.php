
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
/*          var PieChartData='<?php echo $PieChartData;?>'; 

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hewan');
        data.addColumn('number', 'Slices');
        data.addRows(JSON.parse(PieChartData));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle;?>' ,
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        */

 //barchart
        var BarChartData='<?php echo $BarChartData ?>';
        var bar_data = new google.visualization.arrayToDataTable(JSON.parse(BarChartData));

        var bar_options = {
          'title':'<?php  echo $BarChartTitle;?>' ,
          legend: {position: 'bottom'},
          colors: ['chocolate']
         };

        var bar_chart = new google.visualization.BarChart(document.getElementById('curve_div'));
        bar_chart.draw(bar_data, bar_options);

//barchart
var BarChartData1='<?php echo $BarChartData1 ?>';
        var bar_data1 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData1));

        var bar_options1 = {
          'title':'<?php  echo $BarChartTitle1;?>' ,
          legend: {position: 'bottom'},
          colors: ['red']
         };

        var bar_chart1 = new google.visualization.ColumnChart(document.getElementById('curve_div1'));
        bar_chart1.draw(bar_data1, bar_options1);

//barchart
var BarChartData2='<?php echo $BarChartData2 ?>';
        var bar_data2 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData2));

        var bar_options2 = {
          'title':'<?php  echo $BarChartTitle2;?>' ,
          legend: {position: 'bottom'},
          colors: ['green']
         };

        var bar_chart2 = new google.visualization.ColumnChart(document.getElementById('curve_div2'));
        bar_chart2.draw(bar_data2, bar_options2);

//barchart
var BarChartData3='<?php echo $BarChartData3 ?>';
        var bar_data3 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData3));

        var bar_options3 = {
          'title':'<?php  echo $BarChartTitle3;?>' ,
          legend: {position: 'bottom'},
          colors: ['black']
         };

        var bar_chart3 = new google.visualization.BarChart(document.getElementById('curve_div3'));
        bar_chart3.draw(bar_data3, bar_options3);

//barchart
var BarChartData4='<?php echo $BarChartData4 ?>';
        var bar_data4 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData4));

        var bar_options4 = {
          'title':'<?php  echo $BarChartTitle4;?>' ,
          legend: {position: 'bottom'},
          colors: ['purple']
         };

        var bar_chart4 = new google.visualization.LineChart(document.getElementById('curve_div4'));
        bar_chart4.draw(bar_data4, bar_options4);


      }
        
    </script>
  </head>

  <body>
  
      <h1> <center> Data Visualisasi Informasi - Puji Astuti </center></h1>
      <?php //echo json_encode($PieChartData);?>
      <!--Div that will hold the pie chart-->
     

      <table>
      <tr>
      <td> <div id="curve_div1" style="width: 670px; height: 170px"></div></td>
      <td> <div id="curve_div2" style="width: 670px; height: 170px"></div></td>
      </tr>
      <tr>
      <td> <div id="curve_div3" style="width: 670px; height: 200px"></div></td>
      <td> <div id="curve_div4" style="width: 670px; height: 200px"></div></td>
      </tr>
      </table>
      <center> <div id="curve_div" style="width: 670px; height: 200px"></div></center>

  </body>
</html>