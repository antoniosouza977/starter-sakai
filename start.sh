#!/bin/bash
docker compose down
# Function to update or add environment variable in .env file
update_env_var() {
    local var_name=$1
    local var_value=$2
    local env_file=".env"

    # Check if the variable is already set in the .env file
    if grep -q "^${var_name}=" "$env_file"; then
        # Update existing variable
        sed -i "s|^${var_name}=.*|${var_name}=${var_value}|" "$env_file"
    else
        # Add new variable
        echo "${var_name}=${var_value}" >> "$env_file"
    fi
}

# Determine the host IP address (for Linux)
HOST_IP=$(hostname -I | awk '{print $1}')

# Set default port if not provided
PORT=${VITE_HMR_PORT:-5173}

# Update or add VITE_HMR_HOST and VITE_HMR_PORT in .env file
update_env_var "VITE_HMR_HOST" "$HOST_IP"
update_env_var "VITE_HMR_PORT" "$PORT"

echo "Updated VITE_HMR_HOST to $HOST_IP and VITE_HMR_PORT to $PORT in .env file"


docker compose up -d --build
