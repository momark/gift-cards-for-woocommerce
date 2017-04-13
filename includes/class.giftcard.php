<?php
/**
 * Gift Card handler
 *
 * @package     Woo Gift Cards\GiftCardHandler
 * @since       1.0.0
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Gift Card Handler Class
 *
 * @since       1.0.0
 */
class WPR_Giftcard {

    public $giftcard;

    /**
     * Setup the activation class
     *
     * @access      public
     * @since       1.0.0
     * @return      void
     */
    public function __construct(  ) {

    }


    // Function to create the gift card
    public function createCard( $giftInformation ) {
        global $wpdb;

        $giftCard['sendTheEmail'] = 0;

        if ( isset( $giftInformation['rpgc_description'] ) ) {
            $giftCard['description']    = woocommerce_clean( $giftInformation['rpgc_description'] );
            
        }
        if ( isset( $giftInformation['rpgc_to'] ) ) {
            $giftCard['to'] = woocommerce_clean( $giftInformation['rpgc_to'] );
            
        }
        if ( isset( $giftInformation['rpgc_email_to'] ) ) {
            $giftCard['toEmail']        = woocommerce_clean( $giftInformation['rpgc_email_to'] );
            
        }
        if ( isset( $giftInformation['rpgc_from'] ) ) {
            $giftCard['from']           = woocommerce_clean( $giftInformation['rpgc_from'] );
        }
        if ( isset( $giftInformation['rpgc_email_from'] ) ) {
            $giftCard['fromEmail']      = woocommerce_clean( $giftInformation['rpgc_email_from'] );
        }
        if ( isset( $giftInformation['rpgc_amount'] ) ) {
            $giftCard['amount']         = woocommerce_clean( $giftInformation['rpgc_amount'] );

            if ( ! isset( $giftInformation['rpgc_balance'] ) ) {
                $giftCard['balance']    = woocommerce_clean( $giftInformation['rpgc_amount'] );
                $giftCard['sendTheEmail'] = 1;
            }
        }
        if ( isset( $giftInformation['rpgc_balance'] ) ) {
            $giftCard['balance']   = woocommerce_clean( $giftInformation['rpgc_balance'] );
            
        }
        if ( isset( $giftInformation['rpgc_note'] ) ) {
            $giftCard['note']   = woocommerce_clean( $giftInformation['rpgc_note'] );
            
        }
        if ( isset( $giftInformation['rpgc_expiry_date'] ) ) {
            $giftCard['expiry_date'] = woocommerce_clean( $giftInformation['rpgc_expiry_date'] );
            
        } else {
            $giftCard['expiry_date'] = '';
        }
        
        if ( ( $_POST['post_title'] == '' ) || isset( $giftInformation['rpgc_regen_number'] ) ){
        
            if ( ( $giftInformation['rpgc_regen_number'] == 'yes' ) ) {
                $newNumber = apply_filters( 'rpgc_regen_number', $this->generateNumber());

                $wpdb->update( $wpdb->posts, array( 'post_title' => $newNumber ), array( 'ID' => $_POST['ID'] ) );
                $wpdb->update( $wpdb->posts, array( 'post_name' => $newNumber ), array( 'ID' => $_POST['ID'] ) );
            }
        }

        if( isset( $giftInformation['rpgc_resend_email'] ) ) {            
            $email = new WPR_Giftcard_Email();
            $post = get_post( $_POST['ID'] );
            //$email->sendEmail ( $post );

        
            $giftCard['sendTheEmail'] = 1;
        }

        update_post_meta( $_POST['ID'], '_wpr_giftcard', $giftCard );

    }

    // Function to create the gift card
    public function sendCard( $giftInformation ) {


    }

    public static function reload_card( $order_id ) {
        global $wpdb, $current_user;
        
        $order = new WC_Order( $order_id ); 
        $theItems = $order->get_items();

        $numberofGiftCards = 0;

        $rpw_reload_card_check = ( get_option( 'woocommerce_giftcard_reload_card' ) <> NULL ? get_option( 'woocommerce_giftcard_reload_card' ) : __('Reload Card', 'rpgiftcards' )  );

        foreach( $theItems as $item ){
                
            $qty = (int) $item["item_meta"]["_qty"][0];
                 
            $theItem = (int) $item["item_meta"]["_product_id"][0];

            $is_giftcard = get_post_meta( $theItem, '_giftcard', true );

            if ( $is_giftcard == "yes" ) {
                 
                for ($i = 0; $i < $qty; $i++){
                    
                    if( ( $item["item_meta"][$rpw_reload_card_check][0] <> "NA") || ( $item["item_meta"][$rpw_reload_card_check][0] <> "") ) {
                        $giftCardInfo[$numberofGiftCards]["Reload"] = $item["item_meta"][$rpw_reload_card_check][0];
                    }

                    $giftCardTotal = (float) $item["item_meta"]["_line_subtotal"][0];
                    $giftCardInfo[$numberofGiftCards]["Amount"] = $giftCardTotal / $qty;

                    $numberofGiftCards++;
                }
            }
        }

        $giftNumbers = array();

        $giftcard = new WPR_Giftcard();
        for ($i = 0; $i < $numberofGiftCards; $i++){
            if ( isset( $giftCardInfo[$i]['Reload'] ) ) {
                $giftCardID = wpr_get_giftcard_by_code( woocommerce_clean( $giftCardInfo[$i]['Reload'] ) );
                $giftcard->wpr_increase_balance( $giftCardID, $giftCardInfo[$i]['Amount'] );

                $reloads = get_post_meta( $giftCardID, '_wpr_card_reloads', true );
                
                $giftCardInfo[$i]['Order'] = $order_id;
                
                $reloads[] = $giftCardInfo[$i];

                update_post_meta( $giftCardID, '_wpr_card_reloads', $reloads );        
            }
        } 


    }

    // Function to generate the gift card number for the card
    public function generateNumber( ){

        $randomNumber = substr( number_format( time() * rand(), 0, '', '' ), 0, 15 );

        return apply_filters('rpgc_generate_number', $randomNumber);

    }

    // Function to check if a product is a gift card
    public static function wpr_is_giftcard( $giftcard_id ) {

        $giftcard = get_post_meta( $giftcard_id, '_giftcard', true );

        if ( $giftcard != 'yes' ) {
            return false;
        }

        return true;

    }


    public static function wpr_get_giftcard_by_code( $value = '' ) {
        global $wpdb;

        // Check for Giftcard
        $giftcard_found = $wpdb->get_var( $wpdb->prepare( "
            SELECT $wpdb->posts.ID
            FROM $wpdb->posts
            WHERE $wpdb->posts.post_type = 'rp_shop_giftcard'
            AND $wpdb->posts.post_status = 'publish'
            AND $wpdb->posts.post_title = '%s'
        ", $value ) );

        return $giftcard_found;

    }

    public function wpr_get_payment_amount( ){
        $giftcards      = WC()->session->giftcard_post;
        $cart           = WC()->session->cart;

        if ( isset( $giftcards ) ) {

            $balance = 0;

            foreach ($giftcards as $key => $card_id) {
                $balance += wpr_get_giftcard_balance( $card_id );
            }

            $charge_shipping    = get_option('woocommerce_enable_giftcard_charge_shipping');
            $charge_tax         = get_option('woocommerce_enable_giftcard_charge_tax');
            $charge_fee         = get_option('woocommerce_enable_giftcard_charge_fee');
            $charge_gifts       = get_option('woocommerce_enable_giftcard_charge_giftcard');

            $exclude_product    = array();
            $exclude_product    = array_filter( array_map( 'absint', explode( ',', get_option( 'wpr_giftcard_exclude_product_ids' ) ) ) );

            $giftcardPayment = 0;

            foreach( $cart as $key => $product ) {
                if ( isset( $product['product_id'] ) ) {
                    if( ! in_array( $product['product_id'], $exclude_product ) ) {

                        if ( ! WPR_Giftcard::wpr_is_giftcard( $product['product_id'] ) ) {
                            if( $charge_tax == 'yes' ){
                                $giftcardPayment += $product['line_total'];
                                $giftcardPayment += $product['line_tax'];
                            } else {
                                $giftcardPayment += $product['line_total'];
                            }
                        } else {
                            if ( $charge_gifts == "yes" ) {
                                $giftcardPayment += $product['line_total'];
                            }
                        }
                    }
                }
                
            }

            if( $charge_shipping == 'yes' ) {
                $giftcardPayment += WC()->cart->shipping_total;                
            }

            if( $charge_tax == "yes" ) {
                if( $charge_shipping == 'yes' ) {
                    $giftcardPayment += WC()->cart->shipping_tax_total;
                }
            }

            if( $charge_fee == "yes" ) {
                $giftcardPayment += WC()->cart->fee_total;
            }

            if( $charge_gifts == "yes" ) {
                $giftcardPayment += WC()->cart->fee_total;
            }

            

            if ( $giftcardPayment <= $balance ) {
                $display = $giftcardPayment;
            } else {
                $display = $balance;
            }
            return $display;
        }
        
    }


    public function wpr_decrease_balance( $giftCard_id ) {

        $payment = $this->wpr_get_payment_amount();

        if ( $payment > wpr_get_giftcard_balance( $giftCard_id ) ) {
            $newBalance = 0;
        } else {
            $newBalance = wpr_get_giftcard_balance( $giftCard_id ) - $payment;
        }

        wpr_set_giftcard_balance( $giftCard_id, $newBalance );
        
        // Check if the gift card ballance is 0 and if it is change the post status to zerobalance
        if( wpr_get_giftcard_balance( $giftCard_id ) == 0 ) {
            wpr_update_giftcard_status( $giftCard_id, 'zerobalance' );
        }



    }

    public function wpr_increase_balance( $giftCard_id, $amount ) {

        $newBalance = wpr_get_giftcard_balance( $giftCard_id ) + $amount;

        wpr_set_giftcard_balance( $giftCard_id, $newBalance );
    }


    public static function wpr_discount_total( $gift ) {
        
        //print_r( WC()->session->giftcard_post );

        $giftcard = new WPR_Giftcard(  );
        
        $discount = $giftcard->wpr_get_payment_amount();
        //print_r( $discount );
        $gift -= round( $discount, 2 );

        //WC()->cart->discount_cart = $discount + WC()->cart->discount_cart;

        return $gift;
    }



}