
// auto refresh after 1 hour
setInterval(function() {
	window.location.reload();
}, 3600000);

/**
 * Convert a base64 string in a Blob according to the data and contentType.
 * 
 * @param b64Data {String} Pure base64 string without contentType
 * @param contentType {String} the content type of the file i.e (image/jpeg - image/png - text/plain)
 * @param sliceSize {Int} SliceSize to process the byteCharacters
 * @see http://stackoverflow.com/questions/16245767/creating-a-blob-from-a-base64-string-in-javascript
 * @return Blob
 */
function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
}

function clearForm($form)
{
	$form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    $form.find('form  :checkbox, :radio').prop('checked', false);
}

function resetForm($form)
{
	$form.trigger('reset');
}

function _datatable($id, length = 10){
	$id.DataTable({
		"paging": true,
		"lengthChange": true,
		"pageLength": length,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"language": {
			"lengthMenu": 'Tampil <select>'+
				'<option value="10">10</option>'+
				'<option value="20">20</option>'+
				'<option value="30">30</option>'+
				'<option value="40">40</option>'+
				'<option value="50">50</option>'+
				'<option value="100">100</option>'+
				'<option value="-1">All</option>'+
				'</select> data',
			"search":         "Cari :",
			"zeroRecords":    "Tidak ada data ditemukan",
			"decimal":        "",
			"emptyTable":     "Data Kosong",
			"info":           "Tampil _START_ s.d _END_ dari _TOTAL_ data",
			"infoEmpty":      "Tampil 0 s.d 0 dari 0 data",
			"infoFiltered":   "(Disaring dari _MAX_ data)",
			"infoPostFix":    "",
			"thousands":      ",",
			"paginate": {
				"first":      "<i class='fas fa-step-backward'></i>",
				"last":       "<i class='fas fa-step-forward'></i>",
				"next":       "<i class='fas fa-forward'></i>",
				"previous":   "<i class='fas fa-backward'></i>"
			},
		},
		"dom": '<"d-md-flex flex-md-row justify-content-center justify-content-md-between mt-2"<"pl-3 col-12 col-md-6"l><"pr-3 col-12 col-md-6"f>>t<"d-md-flex flex-md-row justify-content-center justify-content-md-between mb-2"<"mx-auto pl-md-3 col-12 col-md-6"i><"mx-auto pr-md-3 col-12 col-md-6"p>>'
    });	
}

	
function onOverlay(){	
	$('.displayOverlay').removeClass('d-none');
}

function offOverlay(){
	$('.displayOverlay').addClass('d-none');
}

function input_tanggal($id_class){
	$id_class.datetimepicker({
        format: 'YYYY-MM-DD'
    });
}