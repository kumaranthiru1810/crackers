

<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $faq_title = $row['faq_title'];
    $faq_banner = $row['faq_banner'];
}
?>
<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $faq_banner; ?>);">
    <div class="inner">
        <h1><?php echo $faq_title; ?></h1>
    </div>
</div>

<div class="page faq-section">
    <div class="container">
        <div class="row">            
            <div class="col-md-8 col-md-offset-2">
                
                <div class="faq-header">
                    <h2>Frequently Asked Questions</h2>
                    <p>Find answers to common questions about our products and services</p>
                </div>
                
                <div class="panel-group" id="faqAccordion">                    

                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_faq");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <h5><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" href="#question<?php echo $row['faq_id']; ?>">
                                        <i class="fa fa-question-circle"></i> <?php echo $row['faq_title']; ?>
                                    </a></h5>
                                </h4>
                            </div>
                            <div id="question<?php echo $row['faq_id']; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>
                                    <p>
                                        <?php echo $row['faq_content']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>

<?php include('./footer_bottom.php'); ?>