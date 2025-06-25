server {
    server_name erm.anantgadaili.com.np www.erm.anantgadaili.com.np;

    root /var/www/erms;
    index index.php index.html index.htm;

    location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.3-fpm.sock;  # adjust PHP version if needed
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
    }
    location ~ /\.ht {
    deny all;
    }

    listen [::]:443 ssl ipv6only=on; # managed by Certbot
    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/erm.anantgadaili.com.np/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/erm.anantgadaili.com.np/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot

}
server {
    if ($host = erm.anantgadaili.com.np) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    listen 80;
    listen [::]:80;
    server_name erm.anantgadaili.com.np www.erm.anantgadaili.com.np;
    return 404; # managed by Certbot


}