let count3 = 0;
let formField3 = [];
let container3 = $('#qual');

$('#add-form-field3').click(e => {
    e.preventDefault();

    formField3 = $('<div class="form-row align-items-center my-2" id="form-row3-' + count3 + '">\n' +
        '                        <div class="form-group m-0 col">\n' +
        '                            <input type="text" name="qualifications[]" class="form-control" required>\n' +
        '                        </div>\n' +
        '                        <div class="col-1 d-flex" style="height: min-content;">\n' +
        '                            <a href="#" id="remove-form-field3" data-id="' + count3 + '" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></a>\n' +
        '                        </div>\n' +
        '                    </div>');
    container3.append(formField3);

    count3++;

    let btn = formField3.find('#remove-form-field3');

    registerToRemove(btn);
});

function registerToRemove(btn) {
    btn.click(e => {
        e.preventDefault();

        let btn = $(e.currentTarget);
        let id = btn.data('id');
        let form = $('#form-row3-'+id);

        form.remove();
    });
}