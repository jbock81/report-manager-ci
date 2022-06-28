<!--
<div style="height:20px;">
</div>
-->
<div class="jumbotron">
    <h3>Course ID Numbers / Course ID Report</h3>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-sm table-responsive" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Publish Type</th>
                    <th>Group Code</th>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Owner ID</th>
                    <th>Group Security</th>
                    <th>Group Term</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($group_id_reports as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $item["publish_type"] . "</td>";
                        echo "<td>" . $item["group_code"] . "</td>";
                        echo "<td>" . $item["group_id"] . "</td>";
                        echo "<td>" . $item["group_name"] . "</td>";
                        echo "<td>" . $item["owner_id"] . "</td>";
                        echo "<td>" . $item["group_security"] . "</td>";
                        echo "<td>" . $item["group_term"] . "</td>";
                        echo "<td>" . $item["is_active"] . "</td>";
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
        var subtitle = "Course ID Report";
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