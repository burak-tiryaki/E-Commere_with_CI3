# E-Commerce Site with CI3

E-commerce site, I made using CodeIgniter3.

Admin operations:
* Adding users and products.
* User and product update.
* View and confirm orders.
* User authorizations are all included.

User operations:
* Registration and login
* Adding products to cart, changing cart quantity and purchasing.
* Check the status of ordered products.
* Updating your own information.

It's live! You can try it-> [https://store.buraktiryaki.me](https://store.buraktiryaki.me)

## Here's what you need to do if you want to publish it on your own site:
* Go to config.php and update this setting: `$config['sess_save_path'] = sys_get_temp_dir();`
* Set the PHP version of the site to 7.4.33 max.
* In PHP settings, set 'open_basedir()' to "none".