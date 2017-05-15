<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */


global $woocommerce;
?>

<?php if ($order) : ?>

	<?php if (in_array($order->status, array('failed'))) : ?>

		<p><?php _e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', GETTEXT_DOMAIN); ?></p>

		<p><?php
			if (is_user_logged_in()) :
				_e('Please attempt your purchase again or go to your account page.', GETTEXT_DOMAIN);
			else :
				_e('Please attempt your purchase again.', GETTEXT_DOMAIN);
			endif;
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e('Pay', GETTEXT_DOMAIN) ?></a>
			<?php if (is_user_logged_in()) : ?>
			<a href="<?php echo esc_url( get_permalink(woocommerce_get_page_id('myaccount')) ); ?>" class="button pay"><?php _e('My Account', GETTEXT_DOMAIN); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<p><?php _e('Thank you. Your order has been received.', GETTEXT_DOMAIN); ?></p>

		<ul class="order_details">
			<li class="order">
				<?php _e('Order:', GETTEXT_DOMAIN); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e('Date:', GETTEXT_DOMAIN); ?>
				<strong><?php echo date_i18n(get_option('date_format'), strtotime($order->order_date)); ?></strong>
			</li>
			<li class="total">
				<?php _e('Total:', GETTEXT_DOMAIN); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php if ($order->payment_method_title) : ?>
			<li class="method">
				<?php _e('Payment method:', GETTEXT_DOMAIN); ?>
				<strong><?php
					echo $order->payment_method_title;
				?></strong>
			</li>
			<?php endif; ?>
		</ul>
		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p><?php _e('Thank you. Your order has been received.', GETTEXT_DOMAIN); ?></p>

<?php endif; ?>