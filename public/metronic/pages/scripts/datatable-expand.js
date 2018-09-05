

$(document).ready(function() {
    var table = $('#adjustmentTableAbsentia').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 10, 'desc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(9, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
} );
$(document).ready(function() {
	var table = $('#adjustmentTableAbsentiaLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 11,
    } );
} );
<!-- ---------------------------------------->
$(document).ready(function() {
    var table = $('#adjustmentTableLeaves').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 9, 'desc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(9, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
} );
$(document).ready(function() {
	var table = $('#adjustmentTableLeavesLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 9, 'desc' ]],
        "displayLength": 11,
    } ); 
} );
<!-- ---------------------------------------->
$(document).ready(function() {
    var table = $('#adjustmentTableUnauthorizedLeaves').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 9, 'desc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(9, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } ); 
} );
$(document).ready(function() {
	var table = $('#adjustmentTableUnauthorizedLeavesLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 11,
    } ); 
} );
<!-- ---------------------------------------->

$(document).ready(function() {
    var table = $('#exceptionAdjustmentTable').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(8, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
} );
$(document).ready(function() {
	var table = $('#exceptionAdjustmentTableLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 7, 'desc' ]],
        "displayLength": 10,
    } ); 
} );
<!-- ---------------------------------------->

$(document).ready(function() {
    var table = $('#missTapEventTable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(8, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
} );
$(document).ready(function() {
	var table = $('#missTapEventTableLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 7, 'desc' ]],
        "displayLength": 10,
    } ); 
} );
<!-- ---------------------------------------->