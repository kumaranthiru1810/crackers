<?php require_once('header.php'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
   $about_title = $row['about_title'];
    $about_content = $row['about_content'];
    $about_banner = $row['about_banner'];
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $about_banner; ?>); background-position:center center">
    <div class="inner">
        <h1><?php echo $about_title; ?></h1>
    </div>
</div>

<div class="about-grid">
    <div class="about-content-div">
        <h1 class="our-story-heading">Our Story</h1>
        <p class="about-page-content">
            <?php echo $about_content;?>
        </p>
        <div class="stats-container">
            <div class="stat-item">
                <h3>10+</h3>
                <p class="mini-para">Years of Fireworks Service</p>
            </div>
            <div class="stat-item">
                <h3>1500+</h3>
                <p class="mini-para">Satisfied Spark Lovers & Clients</p>
            </div>
            <div class="stat-item">
                <h3>30+</h3>
                <p class="mini-para">Crackers Recognitions</p>
            </div>
        </div>
    </div>
    <div class="about-content-img">
        <img src="./assets/uploads/about-content-image.jpg">
    </div>
</div>

<div class="about-main">
    <div class="who-we-are">
        <h1>Who We Are ?<br><span class="line"></span></h1>
        
        <p>Magical crackers ignite the imagination and a bring a touch of wonder to every celebration. With an enchanting collections of Magical Fireworks, we turn ordinary moments into unforgettable spectacles<under a starlit sky./p>
        <ul class="feature-list">
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer Dazzling Variety Of Fantasy & Enchanted Fireworks</li>
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer Supreme Quality With Safe And Reliable Sparkle</li>
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer Mystical Designs Inspired By Ancient Legends</li>
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer Spectacular Displays For Festivals & Special Events</li>
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer Dedicated Support To Make Celebrations Hassle-Free</li>
            <li><i class="fas fa-angle-right arrow-icon"></i>Offer High-Quality Magical Crackers At Unbeatable Prices</li>
        </ul>
    </div>
</div>
<div class="about-below-main">
    <div class="about-below-img">
        <div class="contact-content">
            <h2>Contact Us For More Information</h2>
        </div>
        <div class="get-an-quote-btn">
            <a href="./contact.php">GET AN QUOTE</a>
        </div>
    </div>
</div>

<section class="vision-mission">
    <div class="container">
        <div class="section-header">
            <h2>Our Vision & Mission<br></h2>
            <p>Igniting celebrations, inspiring joy</p>
        </div>
        <div class="vm-grid">
            <div class="vm-card">
                <div class="vm-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Vision</h3>
                <p>
                    To become the most trusted and innovative names in the Fireworks industry , spreading joy through safe , eco-friendly, and high-quality crackers that bring 
                    brightness to every celebrations, while honoring cultural traditions with a modern spark.
                </p>
            </div>
            <div class="vm-card">
                <div class="vm-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Mission</h3>
                <p>
                    Our mission is to design and deliver fireworks that light up moments of happiness with safety ,creativity, and sustainability. We aim to foster long-term relationships with our 
                    customers by offering products that combine festival spirit with responsible manufacturing, vibrant experiences, and uncompromising quality.
                </p>
            </div>
        </div>
        <div class="quote-text">
            <p>
              "Quality is not a spark, it's the flame we carry. At <b>Magical Crackers</b>, we believe in crafting fireworks that leave a lasting mark-vibrant and unforgettable."
            </p>
        </div>
    </div>
</section>



<?php require_once('footer.php'); ?>

<?php include('./footer_bottom.php'); ?>