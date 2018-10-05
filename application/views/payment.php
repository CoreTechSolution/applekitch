<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
require_once(APPPATH.'third_party/stripe-php/config.php');
?>
	<div class="inner-pages backend">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once 'templates/profile_sidebar.php'; ?>
				</div>
				<div class="col-lg-9">
					<div class="contentSection">
						<div class="dashboard-section">
							<div class="box-wrapper">
								<div class="box-title"><?= $title; ?></div>
                                <div class="box-container">
                                    <div id="pay_form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a id="stripeButton" href="#" class="stripe-connect"><span>Pay with Card</span></a>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="paypal-button"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="loading" style="text-align: center; display: none;">
                                        <img src="<?= base_url('/assets/images/loading_spinner.gif') ?>" />
                                    </div>
                                    <div class="alert alert-success Paymentsuccess" style="display: none;">
                                        <strong>Success!</strong> Payment was successful.
                                    </div>
                                    <div class="alert alert-danger PaymentError" style="display: none;">
                                        <strong>Error!</strong> Please try again.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php
$price_array = explode('-', $price);
$settings=get_settings();
//print_r($settings->paypal_mode); exit();
?>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        jQuery(document).ready(function(){
            paypal.Button.render({

                env: '<?php echo $settings->paypal_mode; ?>', // Or 'sandbox/production',

                commit: true, // Show a 'Pay Now' button

                style: {
                    size: 'medium',
                    color: 'blue',
                    shape: 'rect',
                    label: 'pay'
                },

                client: {
                    <?php echo $settings->paypal_mode; ?>:'<?php echo $settings->paypal_email; ?>',
                    
                },

                payment: function(data, actions) {
                    jQuery('#pay_form').hide();
                    jQuery('#loading').show();
                    return actions.payment.create({
                        payment: {
                            transactions: [
                                {
                                    amount: {total: '<?= $price_array[1]; ?>', currency: 'GBP'}
                                }
                            ]
                        }
                    });
                },

                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function(payment) {
                        var membership_plan = '<?= $membership['id']; ?>';
                        jQuery.ajax({
                            type: "POST",
                            url: "<?= base_url('/dashboard/payment_process') ?>",
                            data: {
                                membership_plan: membership_plan,
                                ym: '<?= $price_array[0]; ?>',
                                amount: <?= $price_array[1]; ?>
                            },
                            success: function(data) {
                                jQuery('.PaymentError').hide();
                                if(data == 'success') {
                                    jQuery('.Paymentsuccess').show();
                                    jQuery('#loading').hide();
                                    jQuery('#pay_form').hide();
                                } else {
                                    jQuery('.PaymentError').show();
                                    jQuery('#loading').hide();
                                    jQuery('#pay_form').show();
                                }
                            },
                            error: function() {
                                jQuery('.PaymentError').show();
                                jQuery('#loading').hide();
                                jQuery('#pay_form').show();
                            },
                        });
                    });
                },

                onCancel: function(data, actions) {
                    jQuery('.PaymentError').show();
                    jQuery('#loading').hide();
                    jQuery('#pay_form').show();
                },

                onError: function(err) {
                    jQuery('.PaymentError').show();
                    jQuery('#loading').hide();
                    jQuery('#pay_form').show();
                }
            }, '#paypal-button');
        });

        var handler = StripeCheckout.configure({
            key: '<?php echo $stripe['publishable_key']; ?>',
            image: '<?= base_url('/assets/images/logo.png'); ?>',
            locale: 'auto',
            token: function(token) {
                jQuery('#pay_form').hide();
                jQuery('#loading').show();
                var membership_plan = '<?= $membership['id']; ?>';
                jQuery.ajax({
                    type: "POST",
                    url: "<?= base_url('/dashboard/payment_process') ?>",
                    data: {
                        stripeToken: token.id,
                        stripeEmail: token.email,
                        membership_plan: membership_plan,
                        ym: '<?= $price_array[0]; ?>',
                        amount: <?= $price_array[1]; ?>
                    },
                    success: function(data) {
                        jQuery('.PaymentError').hide();
                        if(data == 'success') {
                            jQuery('.Paymentsuccess').show();
                            jQuery('#loading').hide();
                            jQuery('#pay_form').hide();
                        } else {
                            jQuery('.PaymentError').show();
                            jQuery('#loading').hide();
                            jQuery('#pay_form').show();
                        }
                    },
                    error: function() {
                        jQuery('.PaymentError').show();
                        jQuery('#loading').hide();
                        jQuery('#pay_form').show();
                    },
                });
            }
        });

        document.getElementById('stripeButton').addEventListener('click', function(e) {
            handler.open({
                name: '<?= $membership['name']; ?>',
                description: 'Pay £ <?= $price_array[1]; ?> to subscribe.',
                amount: <?php echo $price_array[1] * 100; ?>,
                email: '<?= $user_data['email_address']; ?>',
                allowRememberMe: false
            });
            e.preventDefault();
        });

        window.addEventListener('popstate', function() {
            handler.close();
        });
    </script>
<?php
require_once 'templates/footer.php';
?>