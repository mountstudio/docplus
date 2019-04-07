var parentSelect = $('#doctor_id');
var childSelect = $('#clinic_id');

$.ajax({
    url: '/getchildren/' + parentSelect.val(),
    success: function (res) {
        appendCategories($(res.children));
    },
    error: function (res) {
        console.log('error');
    }
});


parentSelect.change(function (e) {
    $.ajax({
        url: '/getchildren/' + $(this).val(),
        success: function (res) {
            appendCategories($(res.children));
        },
        error: function (res) {
            console.log('error');
        }
    });
});

childSelect.change(function (e) {
    ajaxForProps($(this), 'child');
});

function selectedOption(id, product_id) {
    return parseInt(product_id) === parseInt(id) ? 'selected' : '';
}

function appendCategories(cats) {
    let hiddenSelect = $('#hidden-select');

    if(cats.length !== 0) {
        let id = $('form#edit-product').data('category');

        parentSelect.removeAttr('name');
        childSelect.attr('name', 'category_id');
        hiddenSelect.removeClass('d-none');

        childSelect.empty();
        for (let i = 0; i < cats.length; i++) {
            console.log(id);
            childSelect.append(
                '<option name="child-category" class="form-control" value="' + cats[i].id + '" ' + selectedOption(cats[i].id, id) + '>' +
                cats[i].name +
                '</option>'
            )
        }
    } else {
        hiddenSelect.addClass('d-none');
        childSelect.removeAttr('name');
        parentSelect.attr('name', 'category_id');
    }
}
