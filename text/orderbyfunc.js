$(document).ready(function()
{
  function getPaginationOptions(){
      var params = [
                      {
                        name: "items_per_page",
                        value: $("#items-per-page option:selected").val()
                      },
                      {
                        name: "orderby",
                        value: $("#orderby option:selected").val()
                      },
                      {
                        name: "sort_order",
                        value: $("#sort-order option:selected").val()
                      }

                   ];
        return params;
    }

    $('#prevPage').submit(function () {
    $(this).append($.map( getPaginationOptions(), function (param) {
        return   $('<input>', {
            type: 'hidden',
            name: param.name,
            value: param.value
            })
        }))
    });
    $('#nextPage').submit(function () {
    $(this).append($.map( getPaginationOptions(), function (param) {
        return   $('<input>', {
            type: 'hidden',
            name: param.name,
            value: param.value
            })
        }))
    });

});
