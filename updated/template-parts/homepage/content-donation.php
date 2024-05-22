<?php
    // donation-section
    $donation_title = get_field('donation_title', get_the_ID());
    $donation_content = get_field('donation_content', get_the_ID());
?>
<section class="donation_section layout_padding">
    <div class="donation-suport col-sm-12 col-md-6">
        <img src="/wp-content/themes/afmuseum/images/support1.png" alt="donation1-image" />
    </div>
    <div class="donation-image col-sm-12 col-md-12">
        <img src="/wp-content/themes/afmuseum/images/support2.png" alt="donation1-image" />
    </div>
    <div class="container">
        <div class="row">
            <div class="donation-image col-sm-12 col-md-6">
                <img src="/wp-content/themes/afmuseum/images/donation1-image.png" alt="donation1-image" />
            </div>
            <div class="donation-title col-sm-12 col-md-6">
                <div class="donation-info">
                    <div class="heading_container">
                        <h2>A GIFT THAT<br/>EXPANDS A LEGACY<?= $donation_title; ?></h2>
                    </div>
                    <div class="donation_content">
                        <p>Awe-inspiring aircraft. Moving stories of American heroes. An
                        unparalleled collection reflecting USAF/industry aerospace
                        achievements. Education programs that inspire young minds.
                        <?= $donation_content; ?>    
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="donation-label col-sm-12 col-md-5">
                <div class="heading_container">
                    <h2>DONATE TODAY</h2>
                </div>
            </div>
            <div class="donation-title col-sm-12 col-md-7">
                <div class="donation-price">
                    <div class="price-label">
                        Choose Your Amount
                    </div>
                    <div class="donation-price-option">
                        <ul class="row price-option">
                            <?php
                                $price_option = get_field('price_option');
                                if ($price_option) {
                                    foreach($price_option as $option_key => $option_value) {
                            ?>
                                    <li class="<?= $option_key == 1 ? "active " : null; ?>col-sm-12 col-md-2">
                                        <a href="#<?= $option_value['price_value']; ?>">$<?= $option_value['price_value']; ?></a>
                                    </li>
                            <?php 
                                    }
                                }
                            ?>
                            <li class="<?= $option_key == 1 ? "active" : null; ?> col-sm-12 col-md-2">
                                <a href="#other">Other</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="donation-payment">
                    <div class="payment-label">
                        Choose Your Payment
                    </div>
                    <div class="payment-option">
                        <a href="#paypal" class="paypal-option"></a>
                        <a href="#visa" class="visa-option"></a>
                    </div>
                </div>
                <div class="donation-option">
                    <a href="#one" class="option-image active">One Time</a>
                    <a href="#off" class="option-image">Recurring</a>
                </div>
                <div class="btn-box">
                    <a href="<?= get_permalink(17); ?>">SUBMIT PAYMENT</a>
                </div>
            </div>
        </div>
    </div>
</section>