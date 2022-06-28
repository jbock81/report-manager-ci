<!--
<div style="height:20px;">
</div>
-->
<div class="jumbotron">
    <h3>Device Report / Device Schedules Report</h3>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-sm table-responsive" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Device ID</th>
                    <th>Duration</th>
                    <th>Session Name</th>
                    <th>Session Creator</th>
                    <th>Repeat Summary</th>
                    <th>Device Profile</th>
                    <th>Session ID</th>
                    <th>Class Name</th>
                    <th>Class Code</th>
                    <th>Video ID</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($device_schedules as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $item["device_id"] . "</td>";
                        echo "<td>" . $item["duration"] . "</td>";
                        echo "<td>" . $item["session_name"] . "</td>";
                        echo "<td>" . $item["session_creator"] . "</td>";
                        echo "<td>" . $item["repeat_summary"] . "</td>";
                        echo "<td>" . $item["device_profile"] . "</td>";
                        echo "<td>" . $item["session_id"] . "</td>";
                        echo "<td>" . $item["class_name"] . "</td>";
                        echo "<td>" . $item["class_code"] . "</td>";
                        echo "<td>" . $item["video_id"] . "</td>";
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
        var subtitle = "Device Schedules Report";
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