<style>
  footer {
      padding: 2rem 0;
      border-top: 1px solid #333;
      text-align: center;
      color: #777;
    }

    footer {
      background-color: #2c2c2c;
      color: #fff;
      padding: 40px 0;
      margin-top: 10px;
    }

    .footer-title {
      font-weight: bold;
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }

    .footer-title::after {
      content: '';
      display: block;
      width: 30px;
      height: 2px;
      background-color: #0d6efd; /*azul Bootstrap */
      margin-top: 4px;
    }

    .footer-link, .footer-contact {
      color: #ccc;
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
    }

    .footer-link:hover {
      color: #fff;
    }

    .social-icons a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      margin-right: 10px;
      background-color: #1c1c1c;
      border-radius: 50%;
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    .social-icons a:hover {
      background-color:rgb(65, 65, 65);
    }

    .bi-instagram,.bi-github,.bi-whatsapp,.bi-facebook{
      color: #fff;
    }

    .bi-instagram a:hover {
      background-color: #000000;
    }

  </style>

<footer>
    <div class="container">
      <div class="row text-start text-md-left">
        <div class="col-md-4 mb-4">
          <h5 class="footer-title">Páginas</h5>
       
        </div>
        <div class="col-md-4 mb-4">
          <h5 class="footer-title">Contato</h5>
          <span class="footer-contact">75-2332-2323</span>
          <span class="footer-contact">Cerboninal@gmail.com</span>
        </div>
        <div class="col-md-4">
          <h5 class="footer-title">Rede Social</h5>
          <div class="social-icons mt-2">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
            <a target="_blank" href="https://www.instagram.com/cetirbboninal/"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="https://github.com/vitorAraj"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
  footer {
    background-color: #f8f9fa;
    color: #6c757d;
    padding: 30px 0;
    border-top: 1px solid #dee2e6;
  }

  .footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    text-align: center;
  }

  .footer-left,
  .footer-right {
    flex: 1;
    min-width: 150px;
  }

  .footer-center {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .footer-links a {
    margin: 0 10px;
    color: #6c757d;
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
  }

  .footer-links a:hover {
    text-decoration: underline;
    color: #0d6efd;
  }

  .footer-icon {
    font-size: 30px;
    background-color: #000;
    color: white;
    padding: 5px 10px;
    border-radius: 8px;
  }

  @media (max-width: 768px) {
    .footer-content {
      flex-direction: column;
      gap: 15px;
    }
  }
</style>

<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-left">
        &copy; 2025 Company, Inc
      </div>
      <div class="footer-center">
        <span class="footer-icon">B</span>
      </div>
      <div class="footer-right footer-links">
        <a href="#">Home</a>
        <a href="#">Features</a>
        <a href="#">Pricing</a>
        <a href="#">FAQs</a>
        <a href="#">About</a>
      </div>
    </div>
  </div>
</footer>
