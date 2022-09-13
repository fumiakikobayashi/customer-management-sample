FROM node:18.9.0-alpine

WORKDIR /app

COPY ../../../src/frontend/package.json ./

RUN npm install

COPY . .

EXPOSE 3000

CMD ["npm", "run", "dev"]
