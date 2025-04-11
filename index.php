<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>



<?php
include 'db_connect.php'; // Include database connection

// Fetch products from the database
$query = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Haven</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <!-- header section start -->

    <header>
        <div class="header-1">
            <div class="share">
                <span> follow us: </span>
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>




         <div class="call">
    <?php

    if (isset($_SESSION['user_id'])) {
        echo '<a href="logout.php">Logout</a>';
        echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
    } else {
        echo '<a href="login_form.php">Log in</a>';
        echo '<a href="registation_form.php">Sign Up</a>';
    }
    ?>
        </div>





        </div> 

        <div class="header-2">

            <a href="#" class="logo"> <i class="fas fa-seedling"></i> GREEN HAVEN </a>

            <form action="" class="search-bar-container">
                <input type="search" id="search-bar" placeholder="search here...">
                <label for="search-bar" class="fas fa-search"></label>
            </form>

        </div>

        <div class="header-3">

            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="#category">Category</a>
                <a href="#product">Product</a>
                <a href="#deal">Deal</a>
                <a href="#contact">Contact</a>
            </nav>

            <div class="icons">
    
  
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<a href="profile.php" class="fas fa-user-circle"></a>'; // Profile page link
    } else {
        echo '<a href="login_form.php" class="fas fa-user-circle"></a>'; // Login page
    }
    ?>
    <a href="cart.php" class="fas fa-shopping-cart"> 
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            echo '<span>(' . count($_SESSION['cart']) . ')</span>';
        }
        ?>
    </a>
      <a href="#" class="fas fa-heart"></a>

</div>



        </div>

    </header>

    <!-- header section end -->

    <!--home section start-->

    <section class="home" id="home">

        <div class="swiper  home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box" style="background: url(slide1.jpg);">
                        <div class="content">
                            <span>Up To 75% Off</span>
                            <h3>plant Big Sale Special Offer</h3>
                            <a href="#product" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url(slide2.jpg);">
                        <div class="content">
                            <span>Up To 45% Off</span>
                            <h3>Plant Make People Happy</h3>
                            <a href="#product" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url(slide3.jpg);">
                        <div class="content">
                            <span>Up To 65% Off</span>
                            <h3>Decorate Your Home Now</h3>
                            <a href="#product" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- home section end -->

    <!-- banner section start -->

    <section class="banner-container">

        <div class="banner">
            <img src="banner1.jpg" alt="">
            <div class="content">
                <span>New Arrivals</span>
                <h3>House Plants</h3>
                <a href="#product" class="btn">Shop Now</a>
            </div>
        </div>

        <div class="banner">
            <img src="banner2.jpg" alt="">
            <div class="content">
                <span>New Arrivels</span>
                <h3>Office plants</h3>
                <a href="#product" class="btn">Shop now</a>
            </div>
        </div>


    </section>

    <!-- banner section end -->
    <!-- catagiry section start -->
    <section class="category " id="category">
        <h1 class="heading">Shop By Catagiry</h1>
        <div class="box-container">
            <div class="box">
                <img src="cat5.jpg" alt="">
                <div class="content">
                    <h3>Bonsai</h3>
                    <a href="#product" class="btn">shop Now</a>
                </div>
            </div>
            <div class="box">
                <img src="cat6.jpg" alt="">
                <div class="content">
                    <h3>Plants For House</h3>
                    <a href="#product" class="btn">Shop Now</a>
                </div>
            </div>
            <div class="box">
                <img src="cat3.jpg" alt="">
                <div class="content">
                    <h3>Plants For Office</h3>
                    <a href="#product" class="btn">Shop Now</a>
                </div>
            </div>
            <div class="box">
                <img src="cat4.jpg" alt="">
                <div class="content">
                    <h3>Gift plants</h3>
                    <a href="#product" class="btn">Shop Now</a>
                </div>
            </div>
        </div>

    </section>
    <!-- catagiry section end -->

    <!-- Product Section -->
    <section class="product" id="product">
    <h1 class="heading">New Products</h1>
    <div class="box-container">
        <?php
        include 'db_connect.php'; // Ensure connection to database
        
        $sql = "SELECT * FROM products ORDER BY id DESC"; // Fetch latest products
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="box">
                    <span class="discount">-<?php echo $row['discount']; ?>%</span>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['plant_name']; ?>">
                    <h3><?php echo $row['plant_name']; ?></h3>
                    <div class="stars">
                        <?php 
                        for ($i = 0; $i < $row['stars']; $i++) {
                            echo '<i class="fas fa-star"></i>';
                        }
                        for ($i = $row['stars']; $i < 5; $i++) {
                            echo '<i class="far fa-star"></i>';
                        }
                        ?>
                    </div>
                    <div class="quantity">
                        <span>Quantity :</span>
                        <input type="number" min="1" max="100" value="1">
                    </div>
                    <div class="price">
                        <span style="text-decoration: line-through;">$<?php echo number_format($row        ['price'], 2); ?></span>
                                $<?php echo number_format($row['price'] * (1 - ($row['discount'] / 100)), 2); ?>
                    </div>

                    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn">Add to Cart</a>


                </div>
        <?php 
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>
</section>

    <!-- product section end -->

    <!-- icons section starts -->

    <section class="icons-container">
        <div class="icon">
            <img src="1.png" alt="">
            <div class="content">
                <h3>Free Shipping</h3>
                <p>Free Shipping On Order</p>
            </div>
        </div>
        <div class="icon">
            <img src="2.png" alt="">
            <div class="content">
                <h3>100% Money Back</h3>
                <p>You've 30 Days To Return</p>
            </div>
        </div>
        <div class="icon">
            <img src="3.png" alt="">
            <div class="content">
                <h3>Payment Secure</h3>
                <p>100% Secure payment</p>
            </div>
        </div>
        <div class="icon">
            <img src="4.png" alt="">
            <div class="content">
                <h3>Support 24/7</h3>
                <p>Contact Us Anytime</p>
            </div>
        </div>
    </section>


    <!-- icons section end -->

    <!-- deal section start -->
    <section class="deal" id="deal">
        <h1 class="heading">Deal Of The Day</h1>
        <div class="row">
            <div class="content">
                <h3 class="title">Don't Miss The Deal</h3>
                <p>Adenium pot plants flat 25% discount! Use coupon-code: FLAT20. Toggle ... Explore Our Wide Range of Indoor and Outdoor Plants</p>
                <div class="count-down">
                    <div class="box">
                        <h3 id="day">00</h3>
                        <span>Day</span>
                    </div>
                    <div class="box">
                        <h3 id="hour">00</h3>
                        <span>hour</span>
                    </div>
                    <div class="box">
                        <h3 id="minute">00</h3>
                        <span>minute</span>
                    </div>
                    <div class="box">
                        <h3 id="second">00</h3>
                        <span>second</span>
                    </div>
                </div>
                <a href="#product" class="btn">Check Out Deal</a>
            </div>

            <div class="image">
                <img src="deal.jpg" alt="">
            </div>

        </div>


    </section>



    <!-- deal section end -->

    <!-- contact section start -->

    <section class="contact" id="contact">
        <h1 class="heading">Get in touch</h1>
        <div class="row">
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5765.696742009219!2d76.24354123618012!3d18.453627857713055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc570677a7facdf%3A0x45aa27320bca70d4!2sNaigaon%2C%20Maharashtra%20413510!5e1!3m2!1sen!2sin!4v1741003546302!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy" ></iframe>

                <form action="contact.php" method="POST">
    <div class="inputBox">
        <input type="text" name="name" required>
        <label>Name</label>
    </div>
    <div class="inputBox">
        <input type="email" name="email" required>
        <label>Email</label>
    </div>
    <div class="inputBox">
        <input type="number" name="number" required>
        <label>Number</label>
    </div>
    <div class="inputBox">
        <textarea name="message" cols="30" rows="10" required></textarea>
        <label>Message</label>
    </div>
    <input type="submit" value="Send Message" class="btn">
</form>

        </div>
    </section>


    <!-- contact section end -->

    <!-- footer section start -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                <p>Empowering everyone to embrace plant parenthood. Whether you're a seasoned gardener or just beginning, <span>GREEN HAVEN</span> is here for everyone. Explore our wide-ranging collection and embark on your gardening adventure with us today!  </p>
            </div>
            <div class="box">
                <h3>Branch Locations</h3>
                <a href="#">india</a>
                <a href="#">USA</a>
                <a href="#">Japan</a>
                <a href="#">France</a>
            </div>
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Catagiry</a>
                <a href="#">Product</a>
                <a href="#">Contact</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">instagram</a>
                <a href="#">LinkedIn</a>
            </div>
        </div>
        <h1 class="credit">Created by <span>Mr. Amar Garad</span>| All Rights Reserved!</h1>
    </section>

    <!-- footer section start -->

    <!-- scroll top button -->
    <a href="#home" class="scroll-top fas fa-angle-up"></a>




    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>