<!--
<div style="height:20px;">
</div>
-->
<div class="jumbotron">
    <h3>Device Report / All Devices</h3>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-sm table-responsive" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Station Name</th>
                    <th>Access Level</th>
                    <th>Device ID</th>
                    <th>Access ID</th>
                    <th>Station Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($device_reports as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $item["station_name"] . "</td>";
                        echo "<td>" . $item["access_level"] . "</td>";
                        echo "<td>" . $item["device_id"] . "</td>";
                        echo "<td>" . $item["access_id"] . "</td>";
                        echo "<td>" . $item["station_type"] . "</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script language="javascript">
    $(document).ready(function(){
        var subtitle = "Device Report All Devices";
        $('#myTable').DataTable({
            dom: 'lBfrtip',
            buttons: [{
                extend: 'csv',
                text: 'Export to CSV',
				title: subtitle,
				download: 'open',
				orientation:'landscape'
            }]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>