# Установка #

1. Склонировать репозиторий.

2. В корне проекта выполнить установку библиотек - 
***composer install***

3. Создать базу данных. Переименовать файл */config/db.php.example* 
в */config/db.php* и внести в него данные для подключения к базе.

4. Применить миграцию - ***./yii migrate***

Для разработки может быть необходимо в файле /web/index.php
раскомментировать первые строки для включения панели разработчика и 
генератора кода Gii. 

<br>
<br>
<br>


# Студия 15 — Тестовое задание описание #

Реализовать 3 справочника и работу с ними

1. Список типов продуктов (банан, апельсин, картофель и т.д.).
2. Список их категорий (фрукт, овощ).
3. Список товарных позиций связанный с этими справочниками.

Реализовать интерфейс управления

Для разработки интерфейса использовать Twitter Bootstrap. 
Внешний вид интерфейса на усмотрение разработчика (формы, фильтры, 
списки).

Реализовать функционал позволяющий добавлять/редактировать/удалять 
новые типы продуктов, категории и товарные позиции.

Реализовать таблицу позиций с возможностью сортировки и фильтрации 
(поля справочников должны фильтроваться выпадающими списками) по 
всем полям.

**Формат отображения справочника товаров:**

Тип   | Категория | Количество | Поставщик | Дата поставки | Цена

Банан | Фрукт     | 5          | Магнит    | 01.01.2017    | 100


**Требования к технологиям и фреймворкам**

PHP 7+
MySQL 5.5+
Yii2
Twitter Bootstrap

Опубликовать исходный код в публичном репозитории Github
