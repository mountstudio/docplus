var parentSelect = $('#doctor_id');
var childSelect = $('#clinic_id');

$.ajax({
    url: '/getclinic/' + parentSelect.val(),
    success: function (res) {
        appendCategories($(res.clinics));
    },
    error: function (res) {
        console.log('error');
    }
});


parentSelect.change(function (e) {
    $.ajax({
        url: '/getclinic/' + $(this).val(),
        success: function (res) {
            appendCategories($(res.clinics));
        },
        error: function (res) {
            console.log('error');
        }
    });
});

function appendCategories(clinics) {
    let hiddenSelect = $('#hidden-select');

    if(clinics.length !== 0) {
        childSelect.attr('name', 'clinic_id');
        hiddenSelect.removeClass('d-none');

        childSelect.empty();
        for (let i = 0; i < clinics.length; i++) {
            childSelect.append(
                '<option name="clinic_id" class="form-control" value="' + clinics[i].id + '" ' + '>' +
                clinics[i].clinic_name +
                '</option>'
            )
        }
    }
    else {
        hiddenSelect.addClass('d-none');
        childSelect.removeAttr('name');
        // parentSelect.attr('name', 'clinic_id');
    }
}
