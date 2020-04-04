    <?php
    
    ?>
    <link rel="stylesheet" href="<?php echo css_url("patient/style.css") ?>">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [
                    
                ],
                "bPaginate": false,
    
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false
            });
            $('.dataTables_filter').addClass('filter-css');
        });
    </script>
</head>

<body>

    <script>

    </script>
    <div class="container main-container">
        <h1 class="main-h1">Páciensek</h1>
        <hr class="main-hr">
        <div class="main-table">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <!--lang-->
                        <th>ID</th>
                        <th>NÉV</th>
                        <th>TAJSZÁM</th>
                        <th>SZÜLETÉSI DÁTUM</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    foreach($db as $x => $valuex){
                        echo "<tr>";
                        foreach($valuex as $y => $valuey){
                            echo "<td>";
                            echo $valuey;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>




</body>


</html>