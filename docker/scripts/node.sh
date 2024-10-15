#!/bin/bash

npm install
ENV=$(grep APP_ENV= .env | awk -F '=' '{print $2}')

echo "Ambiente atual: " "$ENV"

if [ "$ENV" = "prod" ]; then
    rm -rf public/build
    rm -f public/hot
    npm run build
else
    npm run dev
fi

