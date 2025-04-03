# Use uma imagem base com PHP e Apache
FROM php:8.2-apache

# Instale extensões PHP necessárias para Laravel
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Habilite o mod_rewrite do Apache (necessário para Laravel)
RUN a2enmod rewrite

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho no contêiner
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . .

# Exponha a porta 80 para acessar a aplicação
EXPOSE 80

# Comando padrão para iniciar o servidor Apache
CMD ["apache2-foreground"]


# Configurar Virtual Host do Apache
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/laravel_app/public\n\
    <Directory /var/www/html/laravel_app>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

