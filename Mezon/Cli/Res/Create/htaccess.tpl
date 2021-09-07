# use mod_rewrite for pretty URL support
RewriteEngine on

RewriteRule ^Cron/(.*)$ Cron/$1 [L]
RewriteRule ^Include/(.*)$ Include/$1 [L]
RewriteRule ^Res/(.*)$ Res/$1 [L]
RewriteRule ^vendor/(.*)$ vendor/$1 [L]

RewriteRule ^Res/Images/(.*)$ Res/Images/$1 [L]
RewriteRule ^([a-z0-9A-Z_\/\.\-\@%\ :,]+)/?(.*)$ index.php?r=$1&%{QUERY_STRING} [L]
RewriteRule ^/?(.*)$ index.php?r=index&%{QUERY_STRING} [L]