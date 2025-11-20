FROM nginx
COPY limits.conf /etc/security/limits.conf
RUN mkdir -p /var/www/html/public && chown -R nginx:nginx /var/www/html
