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

<div class="container">
    <div class="about-grid">
        <div class="about-content-div">
            <h1 class="our-story-heading">Our Story</h1>
            <p class="about-page-content">
                <?php echo $about_content; ?>
            </p>
        </div>
        <div class="about-content-img">
            <img src="./assets/uploads/about-content-image.png" class="about-img">
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="about-below-banner" style="background: #E91E63 url('./assets/uploads/who-we-are1.webp') center center; width:100%; height:78%"></div>
        </div>
        <div class="col-md-6">
            <div class="about-below-banner" style="background-color: #E91E63 url('./assets/uploads/who-we-are.png') center center; width:100%; height:78%"></div>
        </div>
    </div>
    <br>
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
                    "Quality is not a spark, it's the flame we carry. At <b style="color: #E91E63;">Magical Crackers</b>, we believe in crafting fireworks that leave a lasting mark-vibrant and unforgettable."
                </p>
            </div>
        </div>
    </section>
</div>