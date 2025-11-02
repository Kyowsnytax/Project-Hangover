<?php
include 'dbconn.php';

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all'; // Default to 'all' if not set

$query = "
  SELECT item_name, description, price, 'burger' AS category FROM burger
  UNION ALL
  SELECT item_name, description, price, 'side dish' AS category FROM sidedish
  UNION ALL
  SELECT item_name, description, price, 'kiddie meal' AS category FROM kiddiemeal
  UNION ALL
  SELECT item_name, description, price, 'coffee' AS category FROM coffee
  UNION ALL
  SELECT item_name, description, price, 'chicken wings' AS category FROM chickenwings
  UNION ALL
  SELECT item_name, description, price, 'shakes' AS category FROM shakes
";

$conditions = [];
if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $conditions[] = "(item_name LIKE '%$search%')";
}
if (!empty($category) && $category !== 'all') {
    $category = $conn->real_escape_string($category);
    $conditions[] = "category = '$category'";
}

if (!empty($conditions)) {
    $query = "SELECT * FROM ($query) AS combined WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Output HTML for each item

while ($row = $result->fetch_assoc()) {
    echo "
    <div class='row p-2 mb-3 menu-card-dark-fit align-items-start'>
        <div class='col-md-3 mt-1' style='width: 16rem; height: 11rem; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 0.5rem;'>
            <img src='./Images/menus/" . htmlspecialchars($row['item_name']) . ".jpg' 
                alt='" . htmlspecialchars($row['item_name']) . "'
                style='width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;' />
        </div>

        <div class='col-md-6 mt-1 align-items-left'>
            <h4 class='text-ho-gold item-name text-white'>" . htmlspecialchars($row['item_name']) . "</h4>
            <p class='text-justify mb-0 text-white item-description'>" . htmlspecialchars($row['description']) . "</p>
        </div>

        <div class='col-md-3 mt-1 text-end d-flex flex-column justify-content-between h-100'>
            
            <div class='top-content'>
                <div class='d-flex flex-row align-items-center justify-content-end'>
                    <h4 class='mr-1 text-ho-gold item-price'><span>₱</span>" . number_format($row['price'], 2) . "</h4>
                </div>
                <div class='d-flex flex-row align-items-center justify-content-end'>
                    <span class='text-ho-gold item-category'>" . ucfirst(htmlspecialchars($row['category'])) . "</span>
                </div>
            </div>
            
            <div class='d-flex flex-column mt-4'>
                <button
                    class='btn btn-sm buybtn custom-buy-btn w-100'
                    data-bs-toggle='modal'
                    data-bs-target='#myModalbuy'
                    data-category='" . htmlspecialchars($row['category']) . "'
                    data-name='" . htmlspecialchars($row['item_name']) . "'
                    data-description='" . htmlspecialchars($row['description']) . "'
                    data-price='" . htmlspecialchars($row['price']) . "'
                    >
                    Buy
                </button>

                <button
                    class='btn btn-sm mt-2 addToListBtn custom-add-to-list-btn w-100'
                    data-category='" . htmlspecialchars($row['category']) . "'
                    data-name='" . htmlspecialchars($row['item_name']) . "'
                    data-price='" . htmlspecialchars($row['price']) . "'>
                    Add to list
                </button>
            </div>
        </div>
    </div>";
}

$conn->close();