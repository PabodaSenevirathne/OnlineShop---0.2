<?php
require 'connection.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $id"));
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="js/form.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <title>Berlino</title>
</head>

<body>
    <header class>
        <div class="logo">
            <img src="images/logo2.svg" alt="Your Logo" width="100" height="100">
        </div>
        <div class="title">
            <h1>Welcome to Our Online Store</h1>
            <p>Your One-Stop Shop for Quality Products</p>
        </div>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="#">Proucts</a>
            </li>
            <li>
                <a href="#">Locations</a>
            </li>
            <li>
                <a href="#">About</a>
                <ul class="sub_menu">
                    <li>
                        <a href="#">Mission</a>
                        <ul class="sub_sub_menu">
                            <li>
                                <a href="#">Mission</a>
                            </li>
                            <li>
                                <a href="#">Vision</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Vision</a>
                    </li>
                    <li>
                        <a href="#">Team</a>
                    </li>
                </ul>
            </li>

            <li>
            <a href="create_shop_managers.php">Create</a>
            </li>
            <li>
                <a href="shopping-cart.php">Cart</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>


    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="images/c-4.jpg" style="width:100%">
            <div class="text">Our Shop</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="images/c-5.jpg" style="width:100%">
            <div class="text">Explore Shoes</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="images/c-6.jpg" style="width:100%">
            <div class="text">Wedding Shoes</div>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <br><br>
    <h3>New Arrivals</h3>
    <section class="work-experience main-description">
        <div class="product">
            <img src="images/p-1.jpg" alt="Product 1">
            <h3>Sneakers</h3>
            <p>Price: $8.99</p>
            <button onclick="addToCart('Sneakers', 8.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-2.jpg" alt="Product 2">
            <h3>Timberland Men</h3>
            <p>Price: $74.99</p>
            <button onclick="addToCart('Timberland Men', 74.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-3.jpg" alt="Product 3">
            <h3>Nunn Bush</h3>
            <p>Price: $60.99</p>
            <button onclick="addToCart('Nunn Bush', 60.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-4.jpg" alt="Product 3">
            <h3>Vince Camuto</h3>
            <p>Price: $30.99</p>
            <button onclick="addToCart('Vince Camuto', 30.99)">Add to Cart</button>
        </div>
    </section>

    <h3>Best Sellers</h3>
    <section class="work-experience main-description">
        <div class="product">
            <img src="images/p-5.jpg" alt="Product 1">
            <h3>Aldo</h3>
            <p>Price: $19.99</p>
            <button onclick="addToCart('Aldo', 19.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-6.jpg" alt="Product 2">
            <h3>Clarks Men's</h3>
            <p>Price: $24.99</p>
            <button onclick="addToCart('Clarks Men', 24.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-7.jpg" alt="Product 3">
            <h3>Elements</h3>
            <p>Price: $29.99</p>
            <button onclick="addToCart('Elements', 29.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="images/p-8.jpg" alt="Product 3">
            <h3>Chelsea Boots</h3>
            <p>Price: $29.99</p>
            <button onclick="addToCart('Chelsea Boots', 19.99)">Add to Cart</button>
        </div>

    </section>



    <section class="country main-description">
        <article class="left-corner">
            <img class="image" src="images/2.jpg" alt="Country Image" width="20" height="50">
        </article>
        <article class="right-corner set-space">
            <h2>Why Buy From Us</h2>
            <p class="details-of-srilanka">Welcome to your Ultimate Destination for Stylish and Comfortable Footwear!,
                we're passionate about one thing – helping you put your best foot forward. Our journey began with a
                simple yet powerful vision: to provide high-quality, fashionable, and affordable shoes for people from
                all walks of life.We believe that the right pair of shoes can transform your day, boosting your
                confidence and comfort. Our mission is to design and
                offer a wide range of shoes that not only look great but also feel amazing to wear. We're here to make
                every step you take a joyful experience.</p>
            <p>Our shoes are crafted with precision and care, using the finest materials to ensure durability, comfort,
                and style. We partner with skilled artisans and designers who are dedicated to creating footwear that
                meets the highest standards of quality.</p>
        </article>
    </section>

    <h3>Our Partners</h3>
    <section class="work-experience main-description">

        <div class="image-container">
            <img class="image" src="images/company3.svg" alt="Product 1">
        </div>

        <div class="image-container">
            <img class="image" src="images/company2.svg" alt="Image 1">

        </div>

        <div class="image-container">
            <img class="image" src="images/company1.svg" alt="Image 1">

        </div>
    </section>

    <div class="clear"></div>
    <footer>
        <p>
            &copy; 2023-2024 by Paboda Senervirathne . All Rights Reserved
        </p>
    </footer>
</body>

</html>