
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        <?
            include './assets/php/db_connection.php';
            $select = $db->prepare("SELECT COUNT(*) as count FROM reviews WHERE rating='1' AND item='Sky-Dweller'");
            $select->execute();
            $result= $select->fetch(PDO::FETCH_ASSOC);
            $star1 = $result['count'];

            $select = $db->prepare("SELECT COUNT(*) as count FROM reviews WHERE rating='2' AND item='Sky-Dweller'");
            $select->execute();
            $result= $select->fetch(PDO::FETCH_ASSOC);
            $star2 = $result['count'];

            $select = $db->prepare("SELECT COUNT(*) as count FROM reviews WHERE rating='3' AND item='Sky-Dweller'");
            $select->execute();
            $result= $select->fetch(PDO::FETCH_ASSOC);
            $star3 = $result['count'];

            $select = $db->prepare("SELECT COUNT(*) as count FROM reviews WHERE rating='4' AND item='Sky-Dweller'");
            $select->execute();
            $result= $select->fetch(PDO::FETCH_ASSOC);
            $star4 = $result['count'];

            $select = $db->prepare("SELECT COUNT(*) as count FROM reviews WHERE rating='5' AND item='Sky-Dweller'");
            $select->execute();
            $result= $select->fetch(PDO::FETCH_ASSOC);
            $star5 = $result['count'];
            
        ?>
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Stars', 'Amount'],
                ['1', <? echo $star1;?>],
                ['2', <? echo $star2;?>],
                ['3', <? echo $star3;?>],
                ['4', <? echo $star4;?>],
                ['5', <? echo $star5;?>]
        ]);

        var options = {
            chart: {
                title: 'Product Ratings',
                subtitle: 'none',
            },
            bars: 'horizontal'
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

