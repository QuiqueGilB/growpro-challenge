FROM node:18-alpine3.18
WORKDIR /app

RUN npm init react-app . \
    && npm install @api-platform/admin

COPY src/App.js /app/src/App.js
EXPOSE 3000
CMD ["npm", "start"]
