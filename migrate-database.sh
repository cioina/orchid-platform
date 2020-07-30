#!/bin/bash
set -e 

php artisan orchid:install \
&& php artisan orchid:admin admin admin@admin.com password
