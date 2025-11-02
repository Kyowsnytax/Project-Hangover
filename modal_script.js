 document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('searchInput');
      const categorySelect = document.getElementById('categorySelect');
      const menuContainer = document.getElementById('menuContainer');

      function fetchResults() {
        const query = searchInput.value;
        const category = categorySelect.value;

        fetch(`./api/search.php?q=${encodeURIComponent(query)}&category=${encodeURIComponent(category)}`)
          .then(res => res.text())
          .then(html => {
            menuContainer.innerHTML = html;
          })
          .catch(err => {
            console.error(err);
            menuContainer.innerHTML = '<p class="text-danger">Error loading results.</p>';
          });
      }

      searchInput.addEventListener('input', fetchResults);
      categorySelect.addEventListener('change', fetchResults);

      // initial load
      fetchResults();

      // Handle Buy button click
      $(document).on("click", ".buybtn", function() {
        const name = $(this).data("name");
        const description = $(this).data("description");
        const price = $(this).data("price");
        const image = "./Images/menus/" + name + ".jpg";

        // Fill modal
        $("#modalItemName").text(name);
        $("#modalItemDescription").text(description);
        $("#modalItemPrice").text("₱" + parseFloat(price).toFixed(2));
        $("#modalItemImage").attr("src", image);
        $("#modalQuantity").val(1);

        // Update price dynamically
        $("#modalQuantity")
          .off("input")
          .on("input", function() {
            const qty = $(this).val();
            const totalPrice = parseFloat(price) * parseInt(qty);
            $("#modalItemPrice").text("₱" + totalPrice.toFixed(2));
          });
      });

      // Confirm Buy
      $("#confirmBuy").on("click", function() {
        const name = $("#modalItemName").text();
        const totalPrice = parseFloat($("#modalItemPrice").text().replace("₱", "")); // Get total price
        const quantity = parseInt($("#modalQuantity").val());
        const unitPrice = (totalPrice / quantity).toFixed(2); // Calculate price per item
        const username = document.getElementById('modalusername').textContent.trim();
        $.ajax({
          url: './api/insert_orders-buy.php',
          method: 'POST',
          data: {
            item_name: name,
            quantity: quantity,
            price: unitPrice,
            username: username
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });

        const modal = $("#myModalbuy");
        const modalBody = modal.find(".modal-body");
        const modalFooter = modal.find(".modal-footer");

        const originalBody = modalBody.html();
        modalFooter.hide();
        modalBody.html('<h4 class="text-center text-success">Order Confirmed!</h4>');

        setTimeout(() => {
          modal.modal("hide");
          modalBody.html(originalBody);
          modalFooter.hide();
          location.reload();
        }, 1500);
      });

      // Cancel Buy
      $("#cancelButton").on("click", function() {
        $("#myModalbuy").modal("hide");
      });

    });