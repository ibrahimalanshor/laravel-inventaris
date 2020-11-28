$(function () {
	
	const table = $('table').DataTable({
		serverSide: true,
		processing: true,
		ajax: {
			url: ajaxUrl,
			type: 'post',
			data: {
				_token: token
			}
		},
		columns: [
			{ data: 'DT_RowIndex' },
			{ data: 'name' },
			{
				data: 'action',
				orderable: false,
				searchable: false,
			}
		]
	})

	const reload = () => table.ajax.reload()

	const reset = form => {
		$(form).find('.is-invalid').removeClass('is-invalid')
		
		form.reset()
	}

	const close = form => {
		const modal = $('.modal')

		modal.modal('hide')

		reset(form)
	}

	const alert = message => {
		$('#alert').html(`
			<div class="alert alert-success alert-dismissible">
				${message}
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		`)
	}

	const edit = data => {
		const modal = $('.modal')
		const form = modal.find('form')
		const url = updateUrl.replace(':id', data.id)
		
		reset(form[0])

		form.attr('action', url)
		modal.find('[name=id]').val(data.id)
		modal.find('[name=name]').val(data.name)
		
		modal.modal('show')
	}

	const remove = id => {
		const url = deleteUrl.replace(':id', id)

		if (confirm('Hapus data ini?')) {
			$.ajax({
				url: url,
				type: 'post',
				data: {
					_token: token,
					_method: 'DELETE'
				},
				success: res => {
					reload()
					alert(res.success)
				}
			})
		}
	}

	$('tbody').on('click', 'button', function () {
		const action = $(this).data('action')
		const data = table.row($(this).parents('tr')).data()

		switch(action){
			case 'edit':
				edit(data)
				break
			case 'delete':
				remove(data.id)
				break
		}
	})

	$('form').submit(function (e) {
		e.preventDefault()

		$.ajax({
			url: this.action,
			method: this.method,
			data: $(this).serialize(),
			success: res => {
				reload()
				alert(res.success)
				close(this)
			},
			error: err => {
				const errors = err.responseJSON.errors
				$.each(errors, (name, error) => {
					const input = $(`[name=${name}]`)

					input.addClass('is-invalid')
					input.next('.invalid-feedback').html(error[0])
				})
			}
		})
	})

})