$(document).ready(function() {
  // Show the first paragraph by default
  $("#solution_list li p").hide();
  $("#solution_list li:first-of-type p").show();
  $("#solution_list li:first-of-type h4 i").removeClass("fa-plus").addClass("fa-minus");

  // Add click event listener to all the h4 elements
  $("#solution_list li h4").on("click", function() {
    // Hide all other paragraphs and change their icons to fa-plus
    $("#solution_list li p").not($(this).next()).hide();
    $("#solution_list li h4 i").not($(this).children("i")).removeClass("fa-minus").addClass("fa-plus");

    // Toggle visibility of the clicked paragraph and change its icon
    $(this).next().toggle();
    $(this).children("i").toggleClass("fa-minus fa-plus");
  });
});



