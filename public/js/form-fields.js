'use strict';
let count = 0;
let formFields = [];

// class FormField
// {
//     constructor(data) {
//         let formInput = data.form;
//         let add = $(data.add);
//         let remove = data.remove;
//         let container = $(data.container);
//
//
//         add.click(function (e) {
//
//             e.preventDefault();
//             let factory = new Factory();
//
//             formFields.push(factory.createFormRow(formInput));
//             count++;
//
//             for (let item of formFields) {
//                 container.append(item.form);
//             }
//
//             let btn = formFields[formFields.length - 1].form.find(remove);
//
//             FormField.registerToRemove(btn);
//         })
//     }
//
//     static registerToRemove(btn) {
//         btn.click(e => {
//             e.preventDefault();
//
//             let btn = $(e.currentTarget);
//             let id = btn.data('id');
//             let form = $('#form-row-'+id);
//
//             form.remove();
//         });
//     }
// }

class Factory {
    createFormRow = function (form) {
        let formRow;

        formRow = new FormRow(form);

        return formRow;
    }
}

class FormRow {
    constructor(form) {
        this.form = form;

        this.form.attr('id', 'form-row-' + count);
        this.form.find('#remove-form-field').attr('data-id', count);
    }
}

let formField = [];
let container = $('#edu');

$('#add-form-field').click(e => {
    e.preventDefault();

    let factory = new Factory();

    formField = $('<div class="form-row align-items-center my-2">\n' +
        '                        <div class="form-group m-0 col">\n' +
        '                            <input type="text" name="educations[]" class="form-control" required>\n' +
        '                        </div>\n' +
        '                        <div class="col-1 d-flex" style="height: min-content;">\n' +
        '                            <a href="#" id="remove-form-field" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></a>\n' +
        '                        </div>\n' +
        '                    </div>');

    formFields.push(factory.createFormRow(formField));
    count++;
    container.append(formFields[formFields.length - 1].form);

    let btn = formFields[formFields.length - 1].form.find('#remove-form-field');

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