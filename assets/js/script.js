const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire(
		'Data Skripsi',
		'Berhasil ' + flashData,
		'success'
	);
}

$('.hapus').on('click', function (e) {

	// matikan hrefnya untuk sementara
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: 'Data akan dihapus secara permanen',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, hapus data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
