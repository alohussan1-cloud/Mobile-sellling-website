<?php

require_once "../includes/conn.php";

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
  echo "query failed";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customers - MobileZone Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      display: flex;
    }

    a {
      text-decoration: none;
    }

    /* ---- SIDEBAR ---- */
    .sidebar {
      width: 220px;
      min-height: 100vh;
      background-color: #1a1a2e;
      position: fixed;
      top: 0;
      left: 0;
    }

    .sidebar-logo {
      padding: 20px;
      color: #ffffff;
      font-size: 18px;
      font-weight: 700;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .sidebar-logo i {
      color: #f5a623;
      margin-right: 8px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 13px 20px;
      color: #aaa;
      font-size: 14px;
      transition: background-color 0.2s, color 0.2s;
    }

    .nav-item:hover {
      background-color: rgba(255,255,255,0.06);
      color: #ffffff;
    }

    .nav-item.active {
      color: #f5a623;
      background-color: rgba(245,166,35,0.1);
      border-left: 3px solid #f5a623;
    }

    .nav-item.logout {
      color: #e74c3c;
      margin-top: 20px;
    }

    /* ---- MAIN ---- */
    .main {
      margin-left: 220px;
      padding: 24px;
      width: 100%;
    }

    /* ---- TOPBAR ---- */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #ffffff;
      padding: 16px 20px;
      border-radius: 8px;
      margin-bottom: 24px;
      border: 1px solid #e0e0e0;
    }

    .topbar h2 {
      font-size: 18px;
      color: #1a1a2e;
      font-weight: 700;
    }

    .topbar span {
      font-size: 13px;
      color: #777;
    }

    /* ---- CARD ---- */
    .card {
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 20px;
    }

    /* ---- TABLE ---- */
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
    }

    th {
      text-align: left;
      padding: 10px 12px;
      background-color: #f8f9fa;
      color: #777;
      font-weight: 600;
      border-bottom: 1px solid #e0e0e0;
    }

    td {
      padding: 13px 12px;
      color: #444;
      border-bottom: 1px solid #f0f0f0;
    }

    tr:last-child td {
      border-bottom: none;
    }

    tr:hover td {
      background-color: #fafafa;
    }

    /* ---- AVATAR CIRCLE ---- */
    .avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background-color: #f5a623;
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 13px;
    }

    .customer-name {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* ---- RESPONSIVE ---- */
    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main { margin-left: 0; padding: 16px; }
    }

    @media (max-width: 600px) {
      .topbar { flex-direction: column; align-items: flex-start; gap: 6px; }
    }

  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <?php include "../includes/sidebar.php"; ?>

  <div class="main">
    <div class="topbar">
      <h2>Customers</h2>
      <!-- PHP: echo total customers -->
      <span>Total: <?php echo mysqli_num_rows($result); ?> customers</span>
    </div>

    <!-- Customers Table -->
    <div class="card">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Joined</th>
          </tr>
        </thead>
        <tbody>

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <div class="customer-name">
                <span class="avatar"><?php echo strtoupper(substr($row['name'], 0, 1)); ?></span>
                <?php echo $row['name']; ?>
              </div>
            </td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>

  </div>

</body>
</html>