$(document).ready(function () {
    $('.alert-confirm').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('href');
        let id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#0CC27E',
            // cancelButtonColor: '#FF586B',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {_token: CSRF_TOKEN, id: id},
                success: function (message) {
                    if(message == 'false'){
                        swal(
                            'Failed!',
                            'User cannot be deleted. Constraint with appointment .',
                            'error'
                        ).then(function () {
                            location.reload();
                        });
                    }else {
                        swal(
                            'Deleted!',
                            'Successfully deleted.',
                            'success'
                        ).then(function () {
                            location.reload();
                        });
                    }
                },
            });

        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })
    });
});