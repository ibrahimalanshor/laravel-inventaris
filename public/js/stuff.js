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
			{ data: 'condition' },
			{ data: 'total' },
			{
				data: 'action',
				orderable: false,
				searchable: false,
			},
		]
	})

	$('tbody').on('click', 'button', function () {
		if (confirm('Hapus data ini?')) {
			const id = table.row($(this).parents('tr')).data().id
			const url = deleteUrl.replace(':id', id)

			$.ajax({
				url: url,
				type: 'post',
				data: {
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