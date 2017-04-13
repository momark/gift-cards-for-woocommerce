==== WooCommerce - Gift Cards ====
Contributors: rpletcher
Tags: woocommerce, gift, gift card, payment, gift certificate, certificate
Requires at least: 3.0
Tested up to: 4.7.0
Stable tag: 2.5.6
Donate link: https://ryanpletcher.com/donate/
License: GPLv2 or later

Gift Cards for WooCommerce allows you to create gift cards that your customers purchase on your site. 

== Description ==

Gift Cards for WooCommerce is a plugin which allows you to manage and sell gift certificates for your site. You can sell them to your visitors, and accept payments through any of your other payment gateways.  It will then allow your customers to purchase gift card on the site that you will manually create.

You can now add additional functionality to the gift card plugin using some of my premium plugins offered through <a href="http://wp-ronin.com?source=wordpress">wp-ronin.com</a>.  If you are looking for some functionality that I have not created let me know and I would be happy to look into offering it in the future.

If you have an interest in translating this plugin please let me know.

== Installation ==
1. Install the WooCommerce Gift Cards plugin (Install and activate <a href="http://wordpress.org/plugins/woocommerce/">Woocommerce</a> first)
2. Activate the plugin
3. Create Gift Card Products (Static price only - must set Giftcard as a single product)


== Frequently Asked Questions ==

Q: I want to be able to do ______ with my gift card but you dont have the feature included.  How can I get that?
A: You can find more plugins at <a href="http://wp-ronin.com">wp-ronin.com</a> that will extend the features of the plugin.

Q: How do i create a gift card for my customers to purchase?
A: You will need to create a product like every other product you sell.  You will need to select the gift card option during the creation 

Q: The gift card is not sending automatically when the customer purchases it online.  Why not?
A: This is a feature that is not included in the free version of the gift card.  You can get this option <a href="https://wp-ronin.com/downloads/auto-send-email-woocommerce-gift-cards/">here</a>.

Q: Is there a way to create an option for my customers to specify the value on the gift card?
A: You can do this with one of my premium plugins that I offer on my site <a href="https://wp-ronin.com">here</a>

Q: Can I customize the email that is sent out?
A: Unfortunately that is not a current feature.  The format of the email will match the email format of your site.  I will be looking into making it a feature in the future.

== Changelog ==
= 2.5.6 =
* FIX: Bug where verification of email address not showing when requiring email address

= 2.5.5 =
* FIX: Cards being created on failed order

= 2.5.4 =
* FIX: Prevent duplicate emails from being sent on a resend
* FIX: Default option on when sending a gift card when option is not selected

= 2.5.3 =
* FIX: Order detail errors

= 2.5.2 =
* ADD: Ability to use multiple cards on one order
* ADD: Language directories to save translated files
* FIX: Issue with indicating that the email has been sent

= 2.4.1 =
* ADD: Additional changes for the physical cards
* FIX: Change the link to Google Script to account for secure sites
* FIX: Email validation on physical cards

= 2.4.0 =
* FIX: Changed test function name to avoid possibility of duplicate function
* FIX: Issue with card not calculating on the site
* ADD: Updated variation labels to match with what is selected in the admin
* ADD: Additional gift card product options
* ADD: Reload already existing gift cards
* ADD: Disable coupons when gift card is in use
* ADD: One time use gift cards

= 2.3.4 =
* FIX: Rounding issue with half cent values

= 2.3.3 =
* FIX: Issue with adding giftcards using AJAX
* FIX: Gift card panel height

= 2.3.2 =
* FIX: Removing Gift card option on product
* FIX: Discount calculations
* ADD: Internationalize some additional lines of text

= 2.3.1 =
* FIX: Page title changing when adding items to menu

= 2.3.0 =
* FIX: Some functionality with emails sending
* FIX: Shortcode value return
* FIX: Custom price not showing when no price is set

= 2.2.2 =
* ADD: Ability to customize email message text
* ADD: Ability to edit the text for redeeming the gift card
* ADD: Show options link on the plugin page
* FIX: Email send issues
* FIX: Tax calculation

= 2.2.1 =
* FIX: Product validation allowing products through when required

= 2.2.0 =
* UPDATE: Enabled multiple quanties to be sold of a single gift card.
* UPDATE: Made discounting of gift cards to work
* FIX: Update notice on newly installed plugin

= 2.1.1 =
* FIX: Product not saving as a gift card
* FIX: Missed translation field on Checkout page

= 2.1.0 =
* FIX: Calles for classes

= 2.0.0 =
* UPDATE: Optimized code for better database management
* ADD: Database updater
* ADD: Ability to manually set Gift card number on creation
* ADD: Short code to decrease card value Manually

= 1.7.6.1 =
* FIX: Email Error

= 1.7.6 =
* FIX: Text field options

= 1.7.5 =
* FIX: Duplicate card numbers being created

= 1.7.4 =
* FIX: Fixed plugin localization
* FIX: Email templates

= 1.7.3 =
* FIX: Test email removed

= 1.7.2 =
* FIX: Optimized Email functions
* UPDATE: Save Functions
* FIX: Text domains

= 1.7.1 =
* FIX: Positioning of gift card field for cart
* FIX: Gift Card Metabox Creation
* UPDATE: File Structure of plugin
* ADD: Gift card usage display on gift card page

= 1.7.0 =
* UPDATE: Updating how options page functions for premium plugins
* UPDATE: Optimized gift card calculation
* UPDATE: Checking for WooCommerce as an active Plugins
* FIX: Gift Card reporting on all purchase
* FIX: Prevent Gift Cards from being used on Gift Card Purchase
* FIX: Made text domain name actual value rather than constant
* ADD: Refunded amount notice back to the gift card
* ADD: Area to show all orders gift card was used on
* ADD: Gift Card Details to cart Display
* ADD: Ability to select what can be used on Gift card (Shipping, Tax, Fees)

= 1.6.5 =
* FIX: Updating gift card post type for more security
* UPDATE: Changed Text Domain from contact to actual text domain

= 1.6.4 =
* FIX: Card number creation function, limit to one number generation

= 1.6.3 =
* ADD: Sales price added
* ADD: Ability to add multiple settings pages
* ADD: Function look for Gift Card Values
* FIX: On cart update gift card recalculated
* FIX: Fixed quantity display
* FIX: Number generation for site not using english
* FIX: Expiration reporting on emails

= 1.6.2 
* FIX: Gift Card Number Creation for translated sites
* FIX: Updated localization scripts
* FIX: Adding gift card to cart procedure
* FIX: Paypal process
* ADD: Ability to require customers to enter gift card data
* ADD: Line for Gift card on the order totals

= 1.6.1 =
* FIX: Virtual Product issue

= 1.6 =
* FIX: Created Premium plugin page
* FIX: Updated file stucture
* ADD: New License Page

= 1.5.1 =
* FIX: Removing a function that forces purchasable status

= 1.5 =
* FIX: Removing array index on gift card variable
* FIX: Variable refrences
* ADD: Ability to choose if the gift card is a virtual product or physical product.
* ADD: Check to ensure that WooCommerce is installed
* ADD: Filter and Action hooks to numerous locations
* ADD: Link to Gift card product from the order page
* UPDATE: Changed $woocommerce variable to WC()


= 1.4 =
* FIX: Change to a sigleton file format
* FIX: Paypal calculation
* ADD: Additional check to see if a gift card has already been applied
* ADD: Ability to enter gift card on cart page
* ADD: Additional settings to admin panel

= 1.3.8 =
* FIX: Display of Gift Card Payment on receipt

= 1.3.7 =
* ADD: Ability to change placeholder information on products page
* ADD: Ability to add multiple gift cards to the cart
* ADD: Edit a gift cards already in the cart
* ADD: Customization of button to buy gift card
* ADD: Created more Q&A information on Wordpress.org

= 1.3.5 =
* FIX: Creation of Zerobalance orders created
* ADD: Ability to resend Gift Card Email
* ADD: Ability to regenerate the card number
* UPDATE: Style change of gift card section on order page

= 1.3.4.1 =
* FIX: Fixed issue with gift cards being changed to zero balance no matter the balance.
* FIX: Display of giftcard information on all products has been limited to just products that are gift cardss

= 1.3.4 =
* ADD: Experation date is checked when using the card
* ADD: Ability to regenerate the card number if needed
* ADD: Ability to send out gift card after initial creation
* ADD: Translations to Spanish, German, and Norwegian
* ADD: Ability to filter out gift cards with a zero balnce
* ADD: Information on where you can get additional plugins
* FIX: Preven customers from selecting a quantity on the gift card

= 1.3.2 =
* FIX: Gift card fields on all the products
* FIX: More issues with spelling

= 1.3.1 =
* FIX: Updated place holder to display the information correctly.
* FIX: Corrected path on a script to call correct location.

= 1.3 =
* CHANGE: Changed file stucture of plugin
* ADD: Gift Card panel in WooCommerce Settings
* ADD: Ability to determine if your customers can pay for shipping with their giftcard
* ADD: Setting to determine a default experation date for gift cards purchased online
* ADD: Documentation for plugin.

= 1.2.5 =
* FIX: Display of giftcard paymnt on email reciept will now display

= 1.2.4 =
* FIX: Removed a var_dump accidentally left in the code

= 1.2.3 =
* FIX: Paypal now will get Giftcard Data on the receipt as a discount
* FIX: Undefined index on order page when no giftcard is present has been fixed

= 1.2.2 =
* FIX: Fixed calculation in cart when you change a giftcard on checkout

= 1.2.1 =
* FIX: Set the sending address for giftcard emails
* FIX: Removed the addition fields for Giftcards on products that are not

= 1.2 =
* ADD: Automatic email sent when gift card is created in admin control panel
* ADD: Check mark option in product to set as a gift card 
* ADD: Remaining balance of card displayed on receipt
* ADD: Fields add to gift card product to enter information
* FIX: Information on gift card on order can not be update
* FIX: Balance of gift card returned on an order that is refunded

= 1.1 =
* FIX: Made it possible to edit a gift card after creation
* FIX: A couple of formating errors

= 1.0 =
* Initial Release

== Screenshots ==
1. Gift card added to WooCommerce settings panel.
2. Check mark to make a product a gift card
3. Option to show field on check out for gift card
4. Gift card option closed
5. Products that are set to gift card will have extra fields
6. Gift card value added to totals

== Upgrade Notice ==
Make sure that you back up your database before upgrading.  You will need to run the gift card updater to use the new version and I dont want you to loose any information. Documentation coming soon and additional payment gateways will also be added soon.
