let count2 = 0;
let formField2 = [];
let container2 = $('#exp');


$.ajax({
    url: '/api/doctor/' + doctorId + '/experiences',
    method: 'GET',
    success: res => {
        for (let item of res) {
            appendToForm2(item);
        }
    },
    error: () => {
        console.log('error');
    }
});

$('#add-form-field2').click(e => {
    e.preventDefault();

    appendToForm2();
});

function appendToForm2(value = '') {
    formField2 = $('<div class="form-row align-items-center my-2" id="form-row2-' + count2 + '">\n' +
        '                        <div class="form-group m-0 col">\n' +
        '                            <input value="' + value + '" type="text" name="experiences[]" class="form-control" required>\n' +
        '                        </div>\n' +
        '                        <div class="col-1 d-flex" style="height: min-content;">\n' +
        '                            <a href="#" id="remove-form-field2" data-id="' + count2 + '" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></a>\n' +
        '                        </div>\n' +
        '                    </div>');
    container2.append(formField2);

    count2++;

    let btn = formField2.find('#remove-form-field2');

    registerToRemove2(btn);
}

function registerToRemove2(btn) {
    btn.click(e => {
        e.preventDefault();

        let btn = $(e.currentTarget);
        let id = btn.data('id');
        let form = $('#form-row2-'+id);

        form.remove();
    });
}