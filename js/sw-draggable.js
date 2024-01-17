jQuery(function () {
  jQuery('.draggable-container ul').sortable({
    group: true
  });


  jQuery('.south-wind-step2').on('click', function (e) {
    e.preventDefault();
    // move cards from step 1 to unsorted step 2, 
    let confirmed = confirm('Do you wish to continue? You can\'t go back.');
    if (confirmed) {

      jQuery('.south-wind-cards-row.step1 .cards-most .south-wind-card').each(function () {
        jQuery('.south-wind-cards-row.step2 .cards-unsorted ul').append(jQuery(this));
      })
      // hide step 1, show step 2
      jQuery('.south-wind-cards-row.step1').hide();
      jQuery('.south-wind-cards-row.step2').show();
    }
    return false;
  });
  jQuery('.south-wind-step3').on('click', function (e) {
    e.preventDefault();
    // move cards from step 2 to unsorted step 3, 
    let confirmed = confirm('Do you wish to continue? You can\'t go back.');
    if (confirmed) {
      jQuery('.south-wind-cards-row.step2 .cards-most .south-wind-card').each(function () {
        jQuery('.south-wind-cards-row.step3 .cards-unsorted ul').append(jQuery(this));
      })
      // hide step 2, show step 3
      jQuery('.south-wind-cards-row.step2').hide();
      jQuery('.south-wind-cards-row.step3').show();
    }
    return false;
  });

});
