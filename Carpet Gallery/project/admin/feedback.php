<?php
include "nav.php";
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.main-container {
    width: 70%;
    margin-left:25%;
    margin-top:-50%;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

tr:hover {
    background-color: #f5f5f5;
}

.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.pagination a:hover {
    background-color: #f2f2f2;
}
</style>
<div class="main-container">
  <h2>Customer Feedback</h2>
  <table>
    <thead>
      <tr>
        <th>CUSTOMER NAME</th>
        <th>ADDRESS</th>
        <th>MESSAGE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "config.php";

      // Pagination variables
      $records_per_page = 10; // Adjust this as needed
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $offset = ($page - 1) * $records_per_page;

      // Count total records
      $count_sql = "SELECT COUNT(*) AS total FROM Feedback";
      $count_result = mysqli_query($conn, $count_sql);
      $count_row = mysqli_fetch_assoc($count_result);
      $total_records = $count_row['total'];
      $total_pages = ceil($total_records / $records_per_page);

      // Fetch records for current page
      $sql = "SELECT * FROM Feedback LIMIT $offset, $records_per_page";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>{$row['name']}</td>";
              echo "<td>{$row['address']}</td>";
              echo "<td>{$row['massage']}</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No feedback found</td></tr>";
      }
      ?>
    </tbody>
  </table>
  
  <!-- Pagination Links -->
  <ul class="pagination">
    <?php if ($page > 1): ?>
      <li><a href="?page=<?= $page - 1; ?>">&laquo; Previous</a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <li><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
      <li><a href="?page=<?= $page + 1; ?>">Next &raquo;</a></li>
    <?php endif; ?>
  </ul>
</div>
<?php
include "Footer.php";
?>
