$(function () {
	
	const table = $('table').DataTable({
		serverSide: true,
		processing: true,
		ajax: {
			url: ajaxUrl,
			type: 'post',
			data: {
				_token: csrf
			}
		},
		columns: [
			{ data: 'DT_RowIndex' },
			{ data: 'name' },
			{ data: 'stuff.name' },
			{ data: 'total' },
			{
				data: 'status',
				render: data => {
					return `<span class="badge badge-${data ? 'success' : 'primary'}">${data ? 'Dikembalikan' : 'Dipinjam'}</span>`
				}
			},
			{
				data: 'action',
				orderable: false,
				searchable: false,
			},
		]
	})

	$('tbody').on('click', 'button', function () {
		if (confirm('Hapus data ini?')) {
			const data = table.row($(this).parents('tr')).data()
			const id = data.id
			const url = deleteUrl.replace(':id', id)

			$.ajax({
				url: url,
				type: 'post',
				data: {
					stuff_id: data.stuff_id,
					total: data.total,
					_token: csrf,
					_method: 'DELETE'
				},
				success: res => {
					table.ajax.reload()
					$('#alert').html(`
						<div class="alert alert-success alert-dismissible">
							${res.success}
							<button class="close" data-dismiss="alert">&times;</button>
						</div>
					`)
				}
			})
		}
	})

})