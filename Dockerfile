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
COPY favicon.png package.json package-lock.json ./

ENV NODE_ENV=production
CMD ["npm", "run", "start"]
