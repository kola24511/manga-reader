<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Manga Reader

Проект представляет собой сервис для онлайн чтения.

Планы по разработке:

- [x] Страницы с книгами
- [ ] Функционал (компонент рисующий содержимое книг)
- [ ] Личный кабинет пользователя с подписками
- [ ] Группы по интересам 
- [ ] Система рекомендаций
- [ ] Система поиска
- [ ] Платные подписки

## Запуск проекта

Инициализация проекта

    git clone https://github.com/kola24511/manga-reader.git
    cp .env.example .env
	composer install
	npm install
	php artisan key:generate
    php artisan storage:link

Для запуска проекта в docker можно использовать сокращения комманд с помощью Make:

    make in - docker exec

	make up - docker compose up -d

    make stop - docker compose stop

    make down - docker compose down

	make start - docker compose start
