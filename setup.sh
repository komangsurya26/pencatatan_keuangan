#!/bin/bash

# Copy .env file
cp .env.example .env

# Start Docker containers
docker compose up -d --build

# Wait for containers to be ready
echo "Waiting for containers to be ready..."
sleep 10

# Install Composer dependencies
docker compose exec app composer install

# Generate application key
docker compose exec app php artisan key:generate

# Install NPM dependencies
docker compose exec app npm install

# Run NPM
docker compose exec -d app npm run watch

# Set permissions
chmod -R 777 storage bootstrap/cache

echo "Setup completed! You can now access:"
echo "- http://localhost:3000 (with hot reload)"
echo "- http://localhost:8000 (without hot reload)" 