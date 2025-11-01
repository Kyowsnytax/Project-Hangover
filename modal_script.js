$(document).ready(function () {
  // Handle Buy button click
  $(".buybtn").on("click", function () {
    const name = $(this).data("name");
    const description = $(this).data("description");
    const price = $(this).data("price");
    const image = $(this).data("image");

    // Fill modal
    $("#modalItemName").text(name);
    $("#modalItemDescription").text(description);
    $("#modalItemPrice").text("₱" + parseFloat(price).toFixed(2));
    $("#modalItemImage").attr("src", image);
    $("#modalQuantity").val(1);

    // Update price dynamically
    $("#modalQuantity")
      .off("input")
      .on("input", function () {
        const qty = $(this).val();
        const totalPrice = parseFloat(price) * parseInt(qty);
        $("#modalItemPrice").text("₱" + totalPrice.toFixed(2));
      });
  });

  // Confirm Buy
  $("#confirmBuy").on("click", function () {
    const modal = $("#myModalbuy");
    const modalBody = modal.find(".modal-body");
    const modalFooter = modal.find(".modal-footer");

    const originalBody = modalBody.html();
    modalFooter.hide();
    modalBody.html('<h4 class="text-center text-success">Order Confirmed!</h4>');

    setTimeout(() => {
      modal.modal("hide");
      modalBody.html(originalBody);
      modalFooter.show();
      location.reload();
    }, 1500);
  });

  // Cancel Buy
  $("#cancelButton").on("click", function () {
    $("#myModalbuy").modal("hide");
  });
});
