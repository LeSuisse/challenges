FROM alpine:3.4

RUN apk add --no-cache caddy

COPY Caddyfile /etc/Caddyfile
COPY src/ /var/www/html/

WORKDIR /var/www/html/

CMD ["caddy", "--conf=/etc/Caddyfile", "-agree", "-email=thomas@gerbet.me"]