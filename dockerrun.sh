docker run -p 80:80 \
    --mount type=bind,source="$PWD",target=/var/www/html \
    villapilis:latest