document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('searchInput');
  const categorySelect = document.getElementById('categorySelect');
  const menuContainer = document.getElementById('menuContainer');

  function fetchResults() {
    const search = searchInput.value;
    const category = categorySelect.value;

    fetch(`search.php?search=${encodeURIComponent(search)}&category=${encodeURIComponent(category)}`)
      .then(res => res.text())
      .then(html => {
        menuContainer.innerHTML = html;
      })
      .catch(err => console.error(err));
  }

  searchInput.addEventListener('input', fetchResults);
  categorySelect.addEventListener('change', fetchResults);

  fetchResults(); // load all items on start
});
