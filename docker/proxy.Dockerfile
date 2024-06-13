FROM nginx:1.27.0-alpine
COPY proxy.conf /etc/nginx/conf.d/
CMD ["nginx", "-g", "daemon off;"]