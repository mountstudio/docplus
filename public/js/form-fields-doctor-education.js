let count = 0;
let formField = [];
let container = $('#edu');

$.ajax({
    url: '/api/doctor/' + doctorId + '/educations',
    method: 'GET',
    success: res => {
        for (let item of res) {
            appendToForm(item);
        }
    },
    error: () => {
        console.log('error');
    }
});

$('#add-form-field').click(e => {
    e.preventDefault();

    appendToForm();
});

function appendToForm(value = '') {
    formField = $('<div class="form-row align-items-center my-2" id="form-row-' + count + '">\n' +
        '                        <div class="form-group m-0 col">\n' +
        '                            <input value="' + value + '" type="text" name="educations[]" class="form-control" required>\n' +
        '                        </div>\n' +
        '                        <div class="col-1 d-flex" style="height: min-content;">\n' +
        '                            <a href="#" id="remove-form-field" data-id="' + count + '" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></a>\n' +
        '                        </div>\n' +
        '                    </div>');
    container.append(formField);

    count++;

    let btn = formField.find('#remove-form-field');

    registerToRemove(btn);
}

function registerToRemove(btn) {
    btn.click(e => {
        e.preventDefault();

        let btn = $(e.currentTarget);
        let id = btn.data('id');
        let form = $('#form-row-'+id);

        form.remove();
    });
}