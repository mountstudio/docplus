let form = [];

let count = 0;

$('#add-form-field').click(e => {
    e.preventDefault();

    form = $('<div class="form-row align-items-center my-2" id="form-row-'+ count +'">\n' +
        '                        <div class="form-group m-0 col">\n' +
        '                            <input type="text" name="educations[]" class="form-control" required>\n' +
        '                        </div>\n' +
        '                        <div class="col-1 d-flex" style="height: min-content;">\n' +
        '                            <a href="#" id="remove-form-field" data-id="'+ count +'" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></a>\n' +
        '                        </div>\n' +
        '                    </div>');
    let container = $('#edu');
    count++;
    container.append(form);

    let btn = form.find('#remove-form-field');

    registerToRemove(btn);
});

function registerToRemove(btn) {
    btn.click(e => {
        e.preventDefault();

        let btn = $(e.currentTarget);
        let id = btn.data('id');
        let form = $('#form-row-'+id);

        form.remove();
    });
}