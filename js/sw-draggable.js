jQuery(function () {
  jQuery('.south-wind-cards-row .south-wind-tab').on('click', function(){
    let dataIndex = jQuery(this).data('index');
    let index = dataIndex.split('|');
    let row = jQuery('.south-wind-cards-row')[index[0]];
    jQuery('.south-wind-cards-row .south-wind-cards-col').removeClass('active');
    jQuery('.south-wind-cards-row .south-wind-tab').removeClass('active');
    jQuery(this).addClass('active');
    let col = jQuery(row).find('.south-wind-cards-col')[index[1]];
    jQuery(col).addClass('active');
  });

  jQuery('.south-wind-rating .close').on('click', function (e) {
    // southActiveItem = undefined;
    jQuery('.south-wind-rating').hide();
  });


  // jQuery('.south-wind-card').on('click', function (e) {
  //   jQuery('.south-wind-rating').show();
  //   var theThing =  document.getElementsByClassName('.south-wind-rating')[0];
  //   var el = jQuery('.south-wind-rating');
  //   var theThing = el[0]
  //   southActiveItem = e.currentTarget;
  //   // console.log(el);
  //   let parent = jQuery(e.currentTarget).closest('.south-wind-cards-col')
  //   var parentPosition = getPosition(parent[0]);
  //   // var parentPosition = getPosition(e.currentTarget);
  //   // var xPosition = e.clientX - parentPosition.x + (50);
  //   // var yPosition = e.clientY - parentPosition.y + (70);
  //   var xPosition = (e.clientX - parentPosition.x) + 50 ;
  //   var yPosition = (e.clientY - parentPosition.y) + 50;
  //    if( window.screen.width < (xPosition + (200)) ) {
  //     xPosition = window.screen.width - (200)
  //    }
  //    if( 0 > xPosition ) {
  //     xPosition = 0;
  //    }
  //   theThing.style.left = xPosition + "px";
  //   theThing.style.top = yPosition + "px";
  // });
  jQuery('.south-wind-card .rate-num').on('click', function (e) {
    // move it and hide
    let dataIndex = jQuery(this).data('index');
    let colIndex = jQuery(this).closest('.south-wind-cards-col').data('index');
    let colIndexR = colIndex.split('|');
    let southActiveItem = jQuery(this).closest('.south-wind-card');
    jQuery('.south-wind-cards-col[data-index="' + colIndexR[0] + '|' + dataIndex + '"] ul').append(jQuery(southActiveItem));
    jQuery('.south-wind-rating').hide();
    // southActiveItem = undefined;
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
      jQuery('.rating-row.rating-row1').removeClass('active');
      jQuery('.rating-row.rating-row2').addClass('active');
      jQuery('.south-wind-cards-row.step2 .south-wind-tab[data-index="1|0"]').addClass('active');
      jQuery('.south-wind-cards-row.step2 .cards-unsorted').addClass('active');
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
      jQuery('.rating-row.rating-row2').removeClass('active');
      jQuery('.rating-row.rating-row3').addClass('active');
      jQuery('.south-wind-cards-row.step3 .cards-unsorted').addClass('active');
      jQuery('.south-wind-cards-row.step3 .south-wind-tab[data-index="2|0"]').addClass('active');
    }
    return false;
  });

  function getPosition(el) {
    var xPos = 0;
    var yPos = 0;
   
    while (el) {
      if (el.tagName == "BODY") {
        // deal with browser quirks with body/window/document and page scroll
        var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
        var yScroll = el.scrollTop || document.documentElement.scrollTop;
   
        xPos += (el.offsetLeft - xScroll + el.clientLeft);
        yPos += (el.offsetTop - yScroll + el.clientTop);
      } else {
        // for all other non-BODY elements
        xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
        yPos += (el.offsetTop - el.scrollTop + el.clientTop);
      }
   
      el = el.offsetParent;
    }
    return {
      x: xPos,
      y: yPos
    };
  }
});

