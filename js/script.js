/*
* Author: Antony Rayn
* Version: 1.0
* Date: 03-05-2021
* App Name: FCSTMR Type
* Description: For all scripting
*/

//Login Form Validation
$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'action.php?action=login',
            data: $('form').serialize(),
            success: function (res) {
                console.log(res);
              //alert('form was submitted');
                var loginResponse = JSON.parse(res);
                if (loginResponse.status == 1) {
                    window.location.replace("fcstmr_type.php");
                } else {
                    if (!$('.login-error').length) {
                        $("<p class='login-error'>" + loginResponse.message + "</p>").insertAfter(".login-btn");
                    }
                }
            }
        });

    });

});

$(document).ready(function () {
    fcstmrTypesListByAjax();
});

/*** Remove multiple modal appears each time starts ***/
$(document).on('hidden.bs.modal', '.modal', function () {
    $('#fcstmrTypeModal').remove(); $(".modal-dialog").remove();
});
/*** Remove multiple modal appears each time ends ***/
function fcstmrTypesListByAjax()
{
    $('#fcstmr_type_list').DataTable({
        "ajax": "action.php?action=view",
        "columns": [
        { "data": "id" },
        { "data": "name" },
        { "data": "magento_id" },
        { "data": "action" },
        /*{
            render: (data,type,row) => {
                console.log("row:"+row.aid);
                  //return ` < span edit_id = '${row.aid}' onclick = "editFCSTMRType(this);" > < i class = 'fa fa-pencil-square-o' > < / i > < / span > | < span delete_id = '${row.aid}' onclick = "deleteFCSTMRType(this);" > < i class = 'fa fa-trash-o' > < / i > < / span > `;
                  var rowId= row.aid;
                  return '< span edit_id = "'+row.aid+'" onclick = "editFCSTMRType(this);" > < i class = "fa fa-pencil-square-o" > < / i > < / span > | < span delete_id = "'+row.aid+'" onclick = "deleteFCSTMRType(this);" > < i class = "fa fa-trash-o" > < / i > < / span >';
              }
        }*/
        ],
        "bDestroy": true,
        initComplete: function () {
            this.api().columns([0,1,2]).every(function () {
                var column = this;
                var select = $('<select><option value="">Select</option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                     var val = $.fn.dataTable.util.escapeRegex(
                         $(this).val()
                     );

                     column
                     .search(val ? '^' + val + '$' : '', true, false)
                     .draw();
                });

                column.data().unique().sort().each(function ( d, j ) {
                     select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
}

function isNumber(evt)
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function isAlphabet(e)
{
    var regex = new RegExp(/^[a-zA-Z\s]+$/);
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}

function generateFcstmrForm(fcstmrTypeDetails)
{
    var hidden_fcstmr_aid = '';
    var selected_fcstmr_id = '';
    var selected_fcstmr_name = '';
    var selected_magento_id = '';

    if (fcstmrTypeDetails != undefined) {
        var parseFcstmrTypeDetails = JSON.parse(fcstmrTypeDetails);
        hidden_fcstmr_aid    = parseFcstmrTypeDetails['data'][0]['aid'];
        selected_fcstmr_id   = parseFcstmrTypeDetails['data'][0]['id'];
        selected_fcstmr_name = parseFcstmrTypeDetails['data'][0]['name'];
        selected_magento_id  = parseFcstmrTypeDetails['data'][0]['magento_id'];
    }

    var fcstmrModal = '<div class="modal fade" id="fcstmrTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
    fcstmrModal += '<div class="modal-dialog" role="document">';
    fcstmrModal += '<div class="modal-content">';
    fcstmrModal += '<div class="modal-header">';
    fcstmrModal += '<h5 class="modal-title" id="exampleModalLabel">FCSTMR Type</h5>';
    fcstmrModal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    fcstmrModal += '<span aria-hidden="true">&times;</span>';
    fcstmrModal += '</button>';
    fcstmrModal += '</div>';
    fcstmrModal += '<div class="modal-body">';
    fcstmrModal += '<input type="hiddenn" name="fcstmr_aid" id="fcstmr_aid" value="' + hidden_fcstmr_aid + '">';
    fcstmrModal += '<div class="row">';
    fcstmrModal += '<div class="col-sm-12 col-md-4">';
    fcstmrModal += '<div class="form-group m-b-20">';
    fcstmrModal += '<label for="fcstmr_id">ID</label>';
    fcstmrModal += '<input type="text" class="form-control" name="fcstmr_id" id="fcstmr_id" maxlength="2" onkeypress="return isAlphabet(event);" value="' + selected_fcstmr_id + '">';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '<div class="col-sm-12 col-md-4">';
    fcstmrModal += '<div class="form-group m-b-20">';
    fcstmrModal += '<label for="fcstmr_name">Name</label>';
    fcstmrModal += '<input type="text" class="form-control" name="fcstmr_name" id="fcstmr_name" maxlength="30" value="' + selected_fcstmr_name + '">';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '<div class="col-sm-12 col-md-4">';
    fcstmrModal += '<div class="form-group m-b-20">';
    fcstmrModal += '<label for="magento_id">Magento ID</label>';
    fcstmrModal += '<input type="text" class="form-control" name="magento_id" id="magento_id" maxlength="2" onkeypress="return isNumber(event);" value="' + selected_magento_id + '">';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '<div class="modal-footer">';
    fcstmrModal += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
    fcstmrModal += '<button type="button" onClick="validateFcstmrType()" class="btn btn-primary">Save changes</button>';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    fcstmrModal += '</div>';
    $(fcstmrModal).modal('show');
}

function validateFcstmrType()
{
    if ($("#fcstmr_id").val() == "") {
        showToast("<b>FCSTMR Type</b>","ID is required","error");
        $("#fcstmr_id").focus();
    } else if ($("#fcstmr_name").val() == "") {
        showToast("<b>FCSTMR Type</b>","ertName is required","error");
        $("#fcstmr_name").focus();
    } else if ($("#magento_id").val() == "") {
        showToast("<b>FCSTMR Type</b>","Magento ID is required","error");
        $("#magento_id").focus();
    } else {
        $.ajax({
            url:"action.php?action=upsert",
            type:'POST',
            data: {upsert_fcstmr_aid:$("#fcstmr_aid").val(),fcstmr_id:$("#fcstmr_id").val(),fcstmr_name:$("#fcstmr_name").val(),magento_id:$("#magento_id").val()},
            success:function (res) {
                var upsertResponse = JSON.parse(res);
                showToast("<b>" + upsertResponse.heading + "</b>",upsertResponse.message,upsertResponse.icon);
                $('#fcstmrTypeModal').modal('hide');
                fcstmrTypesListByAjax();
            },error:function (xhr) {
                showToast("<b>FCSTMR Type</b>",xhr.responseText,'error');
            }
        });
    }
}

function editFCSTMRType(eid)
{
    $.ajax({
        url:"action.php?action=edit",
        type:'POST',
        data: {edit_fcstmraid:$(eid).attr('edit_id')},
        success:function (res) {
            generateFcstmrForm(res);
        },error:function (xhr, status, error) {
            showToast("<b>" + error + "</b>",xhr.responseText,status);
        }
    });
}

function deleteFCSTMRType(did)
{
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url:"action.php?action=delete",
            type:'POST',
            data: {delete_fcstmraid:$(did).attr('delete_id')},
            success:function (res) {
                var deleteResponse = JSON.parse(res);
                showToast("<b>" + deleteResponse.heading + "</b>",deleteResponse.message,deleteResponse.icon);
                fcstmrTypesListByAjax();
            },error:function (xhr, status, error) {
                showToast("<b>" + error + "</b>",xhr.responseText,status);
            }
        });
    }
}

function showToast(head,msg,icon)
{
    $.toast({
        heading:head,
        text: msg,
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: icon,
        hideAfter: 3500,
        stack: 6
    });
}