<?php
$page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Mobile-Store/style.css">
</head>
<body>

<nav class="navbar">
    <div class="container nav-inner">
        <a href="index.php" class="logo">
            <i class="fa-solid fa-mobile-screen"></i> MobileZone
        </a>

            <div class="nav-search">
                <input type="text" id="search" class="search-input" placeholder="Search phones...">
                <button class="search-btn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div id="searchResults">
                    
                </div>
            </div>

             <!-- Hamburger -->
        <button class="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="nav-icons">
            <?php if(isset($_SESSION['name']) ){ ?>
            <div class="user-menu">
                <span class="user-name">👤 <?php echo $_SESSION['name']; ?> ▼</span>
                <div class="dropdown">
                    <a href="profile.php">Profile</a>
                    <a href="orders.php">Orders</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>

           <?php } else{
               echo '<a href="register.php" class="register"><i class="fa-solid fa-user"></i> Register </a> | 
                     <a href="login.php" class="register"><i class="fa-solid fa-user"></i> Log In </a> ';

            } ?>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-sidebar">
            <button class="close-btn">
                <i class="fa-solid fa-x"></i>
            </button>
            <div class="links">
            <ul class="toggle-links">
                <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
                <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
                <li><a href="#brands" class="<?= ($page == 'brand.php') ? 'active' : '' ?>">Brands</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            </div>
  
            <div class="sidebar-divider"></div>

            <p class="sidebar-user-label">Account</p>

            <div class="sidebar-user">
            <?php if (isset($_SESSION['name'])) { ?>
                <a href="logout.php" class="sidebar-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            <?php } else { ?>
                <a href="login.php" class="btn-login-side">
                <i class="fa-solid fa-right-to-bracket"></i> Login
                </a>
                <a href="register.php" class="btn-register-side">
                <i class="fa-solid fa-user-plus"></i> Register
                </a>
            <?php } ?>
            </div>
        </div>
    </div>
    

    <div class="page-links">
        <!-- Desktop Navigation -->
        <ul class="nav-links">
            <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
            <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
            <li><a href="#brands" class="<?= ($page == 'brand.php') ? 'active' : '' ?>">Brands</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
</nav>

<script>
  // Menu toggle for smaller screens
const menuBtn = document.querySelector('.menu-toggle');
const closeBtn = document.querySelector('.close-btn');
const mobileMenu = document.querySelector('.mobile-sidebar');

menuBtn.addEventListener('click', ()=>{
  mobileMenu.classList.add('active')
})

closeBtn.addEventListener('click', ()=>{
  mobileMenu.classList.remove('active')
})



// Live Search Section
let search = document.getElementById("search")
let searchResults = document.getElementById("searchResults")

search.addEventListener("input", ()=>{
      searchMobile()
})

async function searchMobile() {
    searchResults.innerHTML = ""
    let keyword = search.value
    if(keyword == ""){
        searchResults.style.display = "none"
    }

if(keyword != ""){
    searchResults.style.display = "block"
  const response = await fetch("search.php?keyword=" + keyword)
  console.log(response);
  
  const data = await response.json()
  console.log(data);

  data.forEach((phone)=>{
      searchResults.innerHTML += `<a href="mobile-details.php?id=${phone.ID}" class="search-item"> ${phone.Model} </a> `
      
    })
    
}
}


</script>
</body>
</html>

