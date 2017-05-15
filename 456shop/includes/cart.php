<?php global $woocommerce; ?>

						<div class="header-cart btn-group pull-right">
						    <a class="dropdown-toggle Total cart-icon" data-toggle="dropdown" href="#">
						    	<?php _e('Cart', GETTEXT_DOMAIN ); ?> - <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
						    </a>
						    <div class="dropdown-menu">
								<div class="header_cart_list">
								
									<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
								
										<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								
											$_product = $cart_item['data'];
								
											// Only display if allowed
											if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
												continue;
								
											// Get price
											$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
								
											$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );?>
								
											<div class="item clearfix">
												<a class="cart-thumbnail" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $_product->get_image('widget-thumb'); ?></a>
												<div class="cart-content">
													<a class="cart-title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
													<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
													<div class="cart-meta">
														<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">remove</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', GETTEXT_DOMAIN) ), $cart_item_key );?>
														<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
													</div>
												</div>
											</div>
											
										<?php endforeach; ?>
								
									<?php else : ?>
								
										<div class="empty"><?php _e('No products in the cart.', GETTEXT_DOMAIN); ?></div>
								
									<?php endif; ?>
								
								</div><!-- end product list -->
								
								<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
								
								<div class="header_cart_footer">
									<p class="total cleanfix"><strong><?php _e('Cart Subtotal', GETTEXT_DOMAIN); ?>:</strong> <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></p>
								
									<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
								
									<p class="buttons">
										<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn btn-primary btn-small"><?php _e('View Cart &rarr;', GETTEXT_DOMAIN); ?></a>
										<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn btn-primary btn-small checkout"><?php _e('Checkout &rarr;', GETTEXT_DOMAIN); ?></a>
									</p>
								</div>
								
								<?php endif; ?>
						    </div>
						</div>
						<?php if (is_user_logged_in()) { ?>
							<div class="header-cart-navi">
								<a href="<?php echo wp_logout_url(home_url()); ?>"><?php _e( 'Logout', GETTEXT_DOMAIN ); ?></a> <span class="separator">|</span>
								<a href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')); ?>"><?php _e( 'My Account', GETTEXT_DOMAIN ); ?></a>	
							</div>
						<?php } else{ ?>
							<div class="header-cart-navi">
								<a href="#login-modal" role="button" data-toggle="modal"><?php _e( 'Login', GETTEXT_DOMAIN ); ?></a> <span class="separator">|</span>
								<a href="#register-modal" role="button" data-toggle="modal"><?php _e( 'Register', GETTEXT_DOMAIN ); ?></a>
							</div>
							<!-- login-modal -->
							<div id="login-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="<?php _e( 'Login', GETTEXT_DOMAIN ); ?>" aria-hidden="true">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3><?php _e( 'Login', GETTEXT_DOMAIN ); ?></h3>
								</div>
								<div class="modal-body">
									<?php $woocommerce->show_messages(); ?>										
									<form method="post" class="login">
										<p class="form-row form-row-first">
											<label for="username"><?php _e('Username or email', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
											<input type="text" class="input-text" name="username" id="username" />
										</p>
										<p class="form-row form-row-last">
											<label for="password"><?php _e('Password', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
											<input class="input-text" type="password" name="password" id="password" />
										</p>
										<div class="clear"></div>
										<p class="form-row">
											<?php $woocommerce->nonce_field('login', 'login') ?>
											<input type="submit" class="button" name="login" value="<?php _e('Login', GETTEXT_DOMAIN); ?>" />
											<a class="lost_password" href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>"><?php _e('Lost Password?', GETTEXT_DOMAIN); ?></a>
										</p>
									</form>
								</div>
								<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</div>
							<div id="register-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="<?php _e( 'Register', GETTEXT_DOMAIN ); ?>" aria-hidden="true">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3><?php _e( 'Register', GETTEXT_DOMAIN ); ?></h3>
								</div>
								<div class="modal-body">
									<?php $woocommerce->show_messages(); ?>	
									<form method="post" class="register">
							
										<?php if ( get_option( 'woocommerce_registration_email_for_username' ) == 'no' ) : ?>
							
											<p class="form-row form-row-first">
												<label for="reg_username"><?php _e('Username', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
												<input type="text" class="input-text" name="username" id="reg_username" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
											</p>
							
											<p class="form-row form-row-last">
							
										<?php else : ?>
							
											<p class="form-row form-row-wide">
							
										<?php endif; ?>
							
											<label for="reg_email"><?php _e('Email', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
											<input type="email" class="input-text" name="email" id="reg_email" value="<?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?>" />
										</p>
							
										<div class="clear"></div>
							
										<p class="form-row form-row-first">
											<label for="reg_password"><?php _e('Password', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
											<input type="password" class="input-text" name="password" id="reg_password" value="<?php if (isset($_POST['password'])) echo esc_attr($_POST['password']); ?>" />
										</p>
										<p class="form-row form-row-last">
											<label for="reg_password2"><?php _e('Re-enter password', GETTEXT_DOMAIN); ?> <span class="required">*</span></label>
											<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if (isset($_POST['password2'])) echo esc_attr($_POST['password2']); ?>" />
										</p>
										<div class="clear"></div>
							
										<!-- Spam Trap -->
										<div style="left:-999em; position:absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" /></div>
							
										<?php do_action( 'register_form' ); ?>
							
										<p class="form-row">
											<?php $woocommerce->nonce_field('register', 'register') ?>
											<input type="submit" class="button" name="register" value="<?php _e('Register', GETTEXT_DOMAIN); ?>" />
										</p>
							
									</form>
								</div>
								<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</div>
						<?php }?>