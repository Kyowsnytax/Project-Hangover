$(document).ready(function() {
  const orderList = $('#orderList');
  const orderTotal = $('#orderTotal');
  const placeholderText = $('.placeholder-text');

  function updateTotal() {
    let total = 0;
    $('.order-item').each(function() {
      const price = parseFloat($(this).data('price'));
      const qty = parseInt($(this).find('.qty-input').val());
      total += price * qty;
    });
    orderTotal.text(total.toFixed(2));

    // Toggle placeholder visibility
    if ($('.order-item').length === 0) {
      placeholderText.show();
    } else {
      placeholderText.hide();
    }
  }

  // Add/Remove item to/from list
  $(document).on('click', '.addToListBtn', function() {
    const btn = $(this);
    const name = btn.data('name');
    const price = parseFloat(btn.data('price'));

    // If already added, remove it
    if (btn.hasClass('btn-success')) {
      btn.removeClass('btn-success').addClass('btn-outline-primary').text('Add to list');
      $(`.order-item[data-name="${name}"]`).remove();
      updateTotal();
      return;
    }

    // Mark as added
    btn.removeClass('btn-outline-primary').addClass('btn-success').text('Added ✓');

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
  $(document).on('input', '.qty-input', function() {
    updateTotal();
  });

  // Remove individual order item
  $(document).on('click', '.remove-item', function() {
    const item = $(this).closest('.order-item');
    const name = item.data('name');
    item.remove();

    // Reset the button state on the main list
    $(`.addToListBtn[data-name="${name}"]`)
      .removeClass('btn-success')
      .addClass('btn-outline-primary')
      .text('Add to list');

    updateTotal();
  });

  // Cancel all orders
  $('#cancelOrders').click(function() {
    $('.order-item').remove();
    $('.addToListBtn')
      .removeClass('btn-success')
      .addClass('btn-outline-primary')
      .text('Add to list');
    updateTotal();
  });

  // Confirm button (you can later link this to PHP)
  $('#confirmOrders').click(function() {
    const orders = [];
    $('.order-item').each(function() {
      const name = $(this).data('name');
      const price = parseFloat($(this).data('price'));
      const qty = parseInt($(this).find('.qty-input').val());
      orders.push({ name, price, qty });

    });
    console.log('Confirmed Orders:', orders);
    alert('Orders confirmed! Check console for details.');
    location.reload();
  });
});
 