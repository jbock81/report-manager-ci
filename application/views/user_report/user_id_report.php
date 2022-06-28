<!--
<div style="height:20px;">
</div>
-->
<div class="jumbotron">
    <h3>User Report / User ID Report</h3>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-sm table-responsive" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Login Id</th>
                    <th>Email Address</th>
                    <th>User Type</th>
                    <th>User Id</th>
                    <th>Timezone</th>
                    <th>Custom Id</th>
                    <th>Phone Number</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($course_id_reports as $item)
                    {
                        echo "<tr>";
                        echo "<td>" . ++$i . "</td>";
                        echo "<td>" . $item["first_name"] . "</td>";
                        echo "<td>" . $item["last_name"] . "</td>";
                        echo "<td>" . $item["login_id"] . "</td>";
                        echo "<td>" . $item["email_address"] . "</td>";
                        echo "<td>" . $item["user_type"] . "</td>";
                        echo "<td>" . $item["user_id"] . "</td>";
                        echo "<td>" . $item["timezone"] . "</td>";
                        echo "<td>" . $item["custom_id"] . "</td>";
                        echo "<td>" . $item["phone_number"] . "</td>";
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
        var subtitle = "User ID Report";
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