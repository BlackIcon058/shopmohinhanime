
  <!--FOOTER-->
  <footer>
    <div class="wrapper">
      <p>© 2024 EIPI,Inc. All Rights Reserved</p>
      <nav class="footer-nav">
        <a href="#">Term of Use</a>
        <a href="#">Privacy</a>
      </nav>
    </div>
  </footer>

  <!--SCRIPT-->
  <!-- <script>
    // lay data tu file JSON
    let products =null;
    fetch('products.json')
    .then(response => response.json())
    .then(data => {
      products = data;
      console.log(products);
      addDataToHTML();
    })

    // dua data vao html
    let listProduct = document.querySelector('.listProduct');
    function addDataToHTML() {
      products.forEach(product => {
        let newProduct = document.createElement('a');
        newProduct.href = 'prod/detail.html?id=' + product.id;
        newProduct.classList.add('item');
        newProduct.innerHTML=`
        <div class="cart-icon">
            <i class='bx bx-cart'></i>
          </div>
          <div class="image-product">
            <img src= "${product.image}">
          </div>
          <h2>${product.name}</h2>
          <div class="price">$ ${product.price}</div>
        `;
        listProduct.appendChild(newProduct);
      })
    }
  </script> -->

  <script src="./assets/JS/main.js"></script>
  <!-- <script src="./assets/JS/signup.js"></script> -->
  <script src="assets/js_functions_for_customers/jquery-3.2.1.min.js"></script>
	<script src="assets/js_functions_for_customers/jQuery.js"></script>

</body>
</html>