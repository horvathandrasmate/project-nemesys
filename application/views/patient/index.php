    <?php

    ?>
    <link rel="stylesheet" href="<?php echo css_url("patient/style.css") ?>">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-container').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [

                ],
                "bPaginate": false,
                "sScrollX": "110%",
                "sScrollY": "200px",
                "bScrollCollapse": true,
                
                "bFilter": true,
                "bInfo": false,
                // "bAutoWidth": false
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
                <table id="table-container" style="max-width: none !important; width: 100%" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <!--lang-->
                            <th style='white-space:nowarp'>ID</th>
                            <th style='white-space:nowarp'>NÉV</th>
                            <th style='white-space:nowarp'>TAJSZÁM</th>
                            <th style='white-space:nowarp'>SZÜLETÉSI DÁTUM</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($db as $x => $valuex) {
                            echo "<tr>";
                            foreach ($valuex as $y => $valuey) {
                                echo "<td style='white-space:nowarp'>";
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