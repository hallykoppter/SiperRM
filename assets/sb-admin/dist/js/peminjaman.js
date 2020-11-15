$("#no_rm").on("click", function () {
	var no_rm = $("#no_rm").val();
	console.log(no_rm);
	var url = "http://localhost/SiperRM/pasien";
	$.ajax({
		url: url,
		method: "POST",
		data: { no_rm: no_rm },
		async: true,
		dataType: "json",
		success: function (data) {
			var jk = data.jenis_kelamin;
			if (jk == "L") {
				jk = "Laki - Laki";
			} else {
				jk = "Perempuan";
			}
			$("#nama_pasien").val(data.nama_pasien);
			$("#jenis_kelamin").val(jk);
			$("#tgl_lahir").val(data.tgl_lahir);
			$("#norm").prop("checked", true);
		},
	});
	return false;
});

$("#norm").on("click", function () {
	var no_rm = $("#norm").val();
	console.log(no_rm);
	var url = "http://localhost/SiperRM/permintaan";
	$.ajax({
		url: url,
		method: "POST",
		data: { no_rm: no_rm },
		async: true,
		dataType: "json",
		success: function (data) {
			$("#diagnosa").val(data.diagnosa);
			$("#tanggal_kunjungan").val(data.tanggal_kunjungan);
		},
	});
	return false;
});

$("#nomor").on("click", function () {
	var no_rm = $("#nomor").val();
	console.log(no_rm);
	var url = "http://localhost/SiperRM/tglpinjam";
	$.ajax({
		url: url,
		method: "POST",
		data: { no_rm: no_rm },
		async: true,
		dataType: "json",
		success: function (data) {
			$("#tanggal_kunjungan").val(data.tanggal_pinjam);
		},
	});
	return false;
});