FROM node:18-alpine

# For Sharp compatability
RUN apk add --no-cache vips-dev

WORKDIR /home
COPY build build
COPY config config
COPY database database
COPY node_modules node_modules
COPY public public
COPY src src
COPY .env favicon.png package.json package-lock.json ./

ARG DB_ROOT_PASSWORD
ENV DATABASE_PASSWORD=${DB_ROOT_PASSWORD}
ENV NODE_ENV=production

CMD ["npm", "run", "start"]
