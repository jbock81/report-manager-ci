<!--
<div style="height:20px;">
</div>
-->
<div class="jumbotron">
    <h3>Media Report / All videos in each course</h3>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-sm table-responsive" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Vidoe ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Direct Link</th>
                    <!--
                    <th>Embed Code</th>
                    -->
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($course_videos as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $item["group_id"] . "</td>";
                        echo "<td>" . $item["group_name"] . "</td>";
                        echo "<td>" . $item["video_id"] . "</td>";
                        echo "<td>" . $item["title"] . "</td>";
                        echo "<td>" . $item["description"] . "</td>";
                        echo "<td>" . $item["directlink"] . "</td>";
                        //echo "<td>" . $item["embedcode"] . "</td>";
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
        var subtitle = "All videos in each course";
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