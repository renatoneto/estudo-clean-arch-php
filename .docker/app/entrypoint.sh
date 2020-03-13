#!/usr/bin/env bash

composer install

chmod 775 storage -R

php-fpm
