$(function () {

  $('form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'post',
      url: 'post.php',
      data: $('form').serialize(),
      success: function () {
        alert('form was submitted');
      }
    });

  });

});

$(document).ready(function() {
    $('#fcstmr_type_list').DataTable( {
        "ajax": "action.php?action=view",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "magento_id" }
        ]
    } );
} );