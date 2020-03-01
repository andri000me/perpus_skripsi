$(function () {
	$('.tambah').on('click', function () {
		$('#newRoleModalLabel').html('Tambah Data Skripsi');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#npm').val('');
		$('#nama').val('');
		$('#judul').val('');
		$('#jumlah').val('');
		$('#prodi').val('');
		$('#tahun').val('');
		$('#pembimbing1').val('');
		$('#pembimbing2').val('');
	});

	$('.edit').on('click', function () {
		$('#newRoleModalLabel').html('Edit Data Skripsi');
		$('.modal-footer button[type=submit]').html('Edit Data');
		$('.modal-content form').attr('action', 'http://localhost/perpus_skripsi/admin/ubah')

		const id = $(this).data('id')

		$.ajax({
			data: {
				id: id
			},
			dataType: 'json',
			url: 'http://localhost/perpus_skripsi/admin/getSkripsiById',
			method: 'post',
			success: function (data) {
				$('#npm').val(data.npm);
				$('#nama').val(data.nama);
				$('#judul').val(data.judul);
				$('#jumlah').val(data.jumlah);
				$('#prodi').val(data.prodi);
				$('#tahun').val(data.tahun);
				$('#pembimbing1').val(data.pembimbing_1);
				$('#pembimbing2').val(data.pembimbing_2);
				$('#id').val(data.id);
			}
		});

	});
});
