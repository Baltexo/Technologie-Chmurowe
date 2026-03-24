FROM alpine AS builder

ARG VERSION
ENV APP_VERSION=$VERSION

WORKDIR /app

# strona HTML
RUN echo "<html> <body style='font-family: sans-serif; text-align: center;'> " > index.html && \
    echo "<h1>Laboratorium 5 - TCh</h1>" >> index.html && \
    echo "<p><strong>Wersja aplikacji:</strong> ${APP_VERSION}</p>" >> index.html && \
    echo "<p><strong>Hostname:</strong> REPLACE_HOSTNAME</p>" >> index.html && \
    echo "<p><strong>Adres IP:</strong> REPLACE_IP</p>" >> index.html && \
    echo "</body> </html>" >> index.html

FROM nginx:alpine

EXPOSE 80

COPY --from=builder /app/index.html /usr/share/nginx/html/index.html

RUN apk add --no-cache curl

# healthcheck
HEALTHCHECK --interval=10s --timeout=3s \
  CMD curl -f http://localhost/ || exit 1

CMD ["/bin/sh", "-c", \
     "sed -i \"s/REPLACE_HOSTNAME/$(hostname)/g\" /usr/share/nginx/html/index.html && \
      sed -i \"s/REPLACE_IP/$(hostname -i)/g\" /usr/share/nginx/html/index.html && \
      nginx -g 'daemon off;'"]
