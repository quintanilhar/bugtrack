var filtersForm = $('form[name="filters"]');

$('select[name="reporter"]').select2({
    placeholder: "Reporter",
    ajax: {
        url: '/reporters',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            name: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          var items = [];
          $.each(data, function(index, item){
            items.push({id: item.id, text: item.name});
          });
console.log(items);
          params.page = params.page || 1;
     
          return {
            results: items,
            pagination: {
              more: (params.page * 20) < data.total_count
            }
          };
        },
        cache: true
    }
}).on("select2:select", function (e) {
    filtersForm.find('input[name="reporter_id"]').val(e.params.data.id);
    filtersForm.submit();  
});
