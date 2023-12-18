jQuery(function () {
  const draggbles = document.querySelectorAll(".shallow-draggable")
  const containers = document.querySelectorAll(".draggable-container")

  draggbles.forEach((draggble) => {
    //for start dragging costing opacity
    draggble.addEventListener("dragstart", () => {
      draggble.classList.add("dragging")
    })

    //for end the dragging opacity costing
    draggble.addEventListener("dragend", () => {
      draggble.classList.remove("dragging")
    })
  })
  //shit
  containers.forEach((container) => {
    container.addEventListener("dragover", function (e) {
      e.preventDefault()
      const afterElement = dragAfterElement(container, e.clientY)
      const dragging = document.querySelector(".dragging")
      if (afterElement == null) {
        container.appendChild(dragging)
      } else {
        container.insertBefore(dragging, afterElement)
      }
    })
  })

  jQuery('.south-wind-step2').on('click', function (e) {
    e.preventDefault();
    // move cards from step 1 to unsorted step 2, 
    let confirmed = confirm('Do you wish to continue? You can\'t go back.');
    if (confirmed) {

      jQuery('.south-wind-cards-row.step1 .cards-most .south-wind-card').each(function () {
        jQuery('.south-wind-cards-row.step2 .cards-unsorted').append(jQuery(this));
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
        jQuery('.south-wind-cards-row.step3 .cards-unsorted').append(jQuery(this));
      })
      // hide step 2, show step 3
      jQuery('.south-wind-cards-row.step2').hide();
      jQuery('.south-wind-cards-row.step3').show();
    }
    return false;
  });

});

function dragAfterElement(container, y) {
  const draggbleElements = [...container.querySelectorAll(".shallow-draggable:not(.dragging)")]

  return draggbleElements.reduce(
    (closest, child) => {
      const box = child.getBoundingClientRect()
      const offset = y - box.top - box.height / 2
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child }
      } else {
        return closest
      }
    },
    { offset: Number.NEGATIVE_INFINITY }
  ).element
}