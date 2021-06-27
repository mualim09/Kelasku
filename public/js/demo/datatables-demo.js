// Call the dataTables jQuery plugin
$(document).ready(function() {
  var table = $('#marksTable').removeAttr('width').DataTable( {
    searching: false,
    info: false,
    paging: false,
    scrollY: "525px",
    scrollX: true,
    scrollCollapse: true,
    fixedHeader: true,
    fixedColumns: true,
    columnDefs: [
      { width: 200, targets: 0 },
      { width: 75, targets: "_all" },
      { orderable: true, targets: 0 },
      { orderable: false, targets: "_all" }
    ]
  });
});