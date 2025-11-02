$(document).ready(function () {
  const orderList = $("#orderList");
  const orderTotal = $("#orderTotal");
  const placeholderText = $(".placeholder-text");

  function updateTotal() {
    let total = 0;
    $(".order-item").each(function () {
      const price = parseFloat($(this).data("price"));
      const qty = parseInt($(this).find(".qty-input").val());
      total += price * qty;
    });
    orderTotal.text(total.toFixed(2));

    // Toggle placeholder visibility
    if ($(".order-item").length === 0) {
      placeholderText.show();
    } else {
      placeholderText.hide();
    }
  }

  // Add/Remove item to/from list
  $(document).on("click", ".addToListBtn", function () {
    const btn = $(this);
    const name = btn.data("name");
    const price = parseFloat(btn.data("price"));

    // If already added, remove it
    if (btn.hasClass("btn-success")) {
      btn
        .removeClass("btn-success")
        .addClass("btn-outline-primary")
        .text("Add to list");
      $(`.order-item[data-name="${name}"]`).remove();
      updateTotal();
      return;
    }

    // Mark as added
    btn
      .removeClass("btn-outline-primary")
      .addClass("btn-success")
      .text("Added ✓");

    // Create order item element
    const orderItem = $(`
      <div class="order-item d-flex justify-content-between align-items-center mt-2 p-2 border rounded" data-name="${name}" data-price="${price}">
        <div>
          <strong>${name}</strong><br>₱${price.toFixed(2)}
        </div>
        <div class="d-flex align-items-center gap-2">
          <input type="number" class="qty-input form-control form-control-sm" min="1" value="1" style="width: 60px;">
          <button class="btn btn-sm btn-outline-danger remove-item">✕</button>
        </div>
      </div>
    `);

    orderList.append(orderItem);
    updateTotal();
  });

  // Update total on quantity change
  $(document).on("input", ".qty-input", function () {
    updateTotal();
  });

  // Remove individual order item
  $(document).on("click", ".remove-item", function () {
    const item = $(this).closest(".order-item");
    const name = item.data("name");
    item.remove();

    // Reset the button state on the main list
    $(`.addToListBtn[data-name="${name}"]`)
      .removeClass("btn-success")
      .addClass("btn-outline-primary")
      .text("Add to list");

    updateTotal();
  });

  // Cancel all orders
  $("#cancelOrders").click(function () {
    $(".order-item").remove();
    $(".addToListBtn")
      .removeClass("btn-success")
      .addClass("btn-outline-primary")
      .text("Add to list");
    updateTotal();
  });

  $("#confirmOrders").on("click", function () {
    console.log("ConfirmOrders button clicked!");

    const orderList = $("#orderList");
    const orders = [];

    // Collect all orders
    orderList.find(".order-item").each(function () {
      const name = $(this).data("name");
      const price = parseFloat(
        $(this).data("price").toString().replace("₱", "")
      );
      const qty = parseInt($(this).find(".qty-input").val());
      orders.push({ name, price, qty });
    });

    console.log("🧾 Orders array (raw):", orders);

    if (orders.length === 0) {
      alert("Please add items to your order first!");
      return;
    }

    const username = document
      .getElementById("sidebarUsername")
      .textContent.trim();
    let successCount = 0;

    orders.forEach((o, i) => {
      console.log(
        `Order[${i}] -> name=${o.name}, price=${o.price}, qty=${o.qty}`
      );

      $.ajax({
        url: "./api/insert_orders-buy.php",
        method: "POST",
        data: {
          item_name: o.name,
          price: o.price,
          quantity: o.qty,
          username: document
            .getElementById("sidebarUsername")
            .textContent.trim(),
        },
        success: function (response) {
          successCount++;
          console.log(`Order ${i + 1} saved:`, response);

          // Only show alert + reload when all orders have succeeded
          if (successCount === orders.length) {
            const successToastEl = document.getElementById("orderSuccessToast");
            const successToast = new bootstrap.Toast(successToastEl, {
              delay: 2000,
            });

            successToast.show();

            // Wait for the toast to finish, then reload
            setTimeout(() => {
              location.reload();
            }, 2000);
          }
        },
        error: function (xhr, status, error) {
          console.error(`Error saving order ${i + 1}:`, error);
        },
      });
    });
  });
});
