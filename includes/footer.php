<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* ========================
   FOOTER
======================== */
.footer {
  background-color: #1a1a2e;
  color: #ccc;
  padding: 50px 0 0;
}

.footer-inner {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1.5fr;
  gap: 30px;
  padding-bottom: 40px;
}

.footer-col h3 {
  color: #ffffff;
  font-size: 18px;
  margin-bottom: 12px;
}

.footer-col h3 i {
  color: #f5a623;
}

.footer-col h4 {
  color: #ffffff;
  font-size: 15px;
  margin-bottom: 12px;
}

.footer-col p {
  font-size: 13px;
  line-height: 1.8;
}

.footer-col ul li {
  margin-bottom: 8px;
}

.footer-col ul a {
  font-size: 13px;
  color: #aaa;
  transition: color 0.2s;
}

.footer-col ul a:hover {
  color: #f5a623;
}

.footer-col p i {
  color: #f5a623;
  margin-right: 6px;
}

.social-icons {
  display: flex;
  gap: 12px;
  margin-top: 14px;
}

.social-icons a {
  color: #aaa;
  font-size: 18px;
  transition: color 0.2s;
}

.social-icons a:hover {
  color: #f5a623;
}

.footer-bottom {
  border-top: 1px solid #2a2a4a;
  text-align: center;
  padding: 16px;
  font-size: 13px;
  color: #666;
}
</style>
<body>
    
  <footer class="footer" >
    <section id="contact">
    <div class="container footer-inner">
      <div class="footer-col">
        <h3><i class="fa-solid fa-mobile-screen"></i> MobileZone</h3>
        <p>Your trusted online store for the latest smartphones at the best prices.</p>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Products</a></li>
          <li><a href="#brands">Brands</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Brands</h4>
        <ul>
          <li><a href="#">Apple</a></li>
          <li><a href="#">Samsung</a></li>
          <li><a href="#">Xiaomi</a></li>
          <li><a href="#">OnePlus</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p><i class="fa-solid fa-envelope"></i> info@mobilezone.com</p>
        <p><i class="fa-solid fa-phone"></i> +92 300 1234567</p>
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2026 MobileZone. All rights reserved.</p>
    </div>
    </section>
  </footer>
</body>
</html>