$(".custom-file-input").on("change", function() {
    var titre = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(titre);

    var titre_fr = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(titre_fr);
  });
 