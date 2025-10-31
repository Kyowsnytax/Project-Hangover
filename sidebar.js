document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('orderSidebar');
  const orderFab = document.getElementById('orderFab');
  const closeBtn = document.getElementById('closeSidebar');

  if (orderFab) {
    orderFab.addEventListener('click', function() {
      sidebar.classList.toggle('active');
    });
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      sidebar.classList.remove('active');
    });
  }
});
