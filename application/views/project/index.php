
<br />
<table id="table" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="search-industry">Industry</th>
            <th class="search-sauser">SA</th>
            <th class="search-priority">Priority</th>
            <th class="search-input">Workload</th>
            <th class="search-platform">Product</th>
            <th class="search-input">Effort Target</th>
            <th class="search-efforttype">Effort Type</th>
            <th class="search-input">Effort Output</th>
            <th class="search-input">Effort Justification</th>
            <th class="search-input">Notes</th>
            <th>Estimated Complete Date</th>
            <th class="search-status">Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Industry</th>
            <th>SA</th>
            <th>Priority</th>
            <th>Workload</th>
            <th>Product</th>
            <th>Effort Target</th>
            <th>Effort Type</th>
            <th>Effort Output</th>
            <th>Effort Justification</th>
            <th>Notes</th>
            <th>
                <!--Estimated Complete Date-->
            </th>
            <th>Status</th>
        </tr>
    </tfoot>
    <tbody></tbody>
</table>
<script type="text/javascript">
    var table;

    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "searching": true,
            "order": [],
            "ajax": {
                url: "<?php echo site_url('Project/ajax_list')?>",
                type: "POST"
            },
            "columnDefs": [
                { "name": "industries.name", "targets": 0 },
                { "name": "sa_users_id", "targets": 1 },
                { "name": "priority", "targets": 2 },
                { "name": "workloads.name", "targets": 3 },
                { "name": "platforms.name", "targets": 4 },
                { "name": "effort_target", "targets": 5 },
                { "name": "efforttypes.name", "targets": 6 },
                { "name": "vflatprojecttasks.effortoutput", "targets": 7 },
                { "name": "effort_justification", "targets": 8 },
                { "name": "notes", "targets": 9 },
                { "name": "estimated_complete_date", "targets": 10 },
                { "name": "status", "targets": 11 }
            ],
            "initComplete": function () {
                this.api().columns('.search-select').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
                this.api().columns('.search-input').every(function () {
                    var column = this;
                    $('<input type="text" value="" placeholder="Search...">')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change', function () {
                            if (window.event && event.type == "propertychange" && event.propertyName != "value") return;

                            var searchText = $.fn.dataTable.util.escapeRegex($(this).val());

                            window.clearTimeout($(this).data("timeout"));
                            $(this).data("timeout", setTimeout(function () {
                                if (column.search() !== this.value) {
                                    column.search(searchText).draw();
                                }
                            }, 1000));
                        });
                });
                this.api().columns('.search-industry').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
foreach($industries as $key=>$value){
    echo "select.append('<option value=\"$value\">$value</option>');";
}
?>
                });
                this.api().columns('.search-sauser').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
foreach($sausers as $key=>$value){
    echo "select.append('<option value=\"$key\">$value</option>');";
}
?>
                });
                this.api().columns('.search-efforttype').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
foreach($efforttypes as $key=>$value){
    echo "select.append('<option value=\"$value\">$value</option>');";
}
?>
                });
                this.api().columns('.search-status').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
$statusList = unserialize(SAP_STATUSLIST);
foreach($statusList as $key=>$value){
    echo "select.append('<option value=\"$key\">$value</option>');";
}
?>
                });
                this.api().columns('.search-priority').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
$statusList = unserialize(SAP_PRIORITYLIST);
foreach($statusList as $key=>$value){
    echo "select.append('<option value=\"$key\">$value</option>');";
}
?>
                });
                this.api().columns('.search-platform').every(function () {
                    var column = this;
                    var select = $('<select><option value="">Search...</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    var options = [];
<?php
foreach($platforms as $key=>$value){
    echo "select.append('<option value=\"$value\">$value</option>');";
}
?>
                });

            }
        });

        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("textarea").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("select").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });
</script>
