<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m170913_083814_init
 * Create start database tables
 *
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   13.09.2017 10:38
 */
class m170913_083814_init extends Migration
{
    /**
     * Add changes in databases
     *
     * @return void
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable(
            'product_categories', [
                'id' => Schema::TYPE_PK . ' COMMENT "ID категории"',
                'name' => Schema::TYPE_STRING
                    . ' NOT NULL COMMENT "Название продукта"',
            ], $tableOptions . ' COMMENT "Справочник категорий продуктов"'
        );
        $this->batchInsert(
            'product_categories',
            ['id', 'name'],
            [
                ['id' => 1, 'name' => 'Овощи'],
                ['id' => 2, 'name' => 'Фрукты'],
                ['id' => 3, 'name' => 'Специи'],
            ]
        );

        $this->createTable(
            'product_types', [
                'id' => Schema::TYPE_PK . ' COMMENT "ID продукта"',
                'id_category' => Schema::TYPE_INTEGER
                    . ' COMMENT "Ссылка на таблицу product_categories"',
                'name' => Schema::TYPE_STRING
                    . ' NOT NULL COMMENT "Название продукта"'
            ], $tableOptions . ' COMMENT "Справочник продуктов"'
        );
        $this->addForeignKey(
            'fk_product_types-product_categories',
            'product_types', 'id_category',
            'product_categories', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->batchInsert(
            'product_types',
            ['id', 'id_category', 'name'],
            [
                ['id' => 1, 'id_category' => '1', 'name' => 'Картофель'],
                ['id' => 2, 'id_category' => '1', 'name' => 'Морковь'],
                ['id' => 3, 'id_category' => '2', 'name' => 'Бананы'],
                ['id' => 4, 'id_category' => '2', 'name' => 'Груши'],
                ['id' => 5, 'id_category' => '2', 'name' => 'Яблоки'],
                ['id' => 6, 'id_category' => '3', 'name' => 'Перец'],
                ['id' => 7, 'id_category' => '3', 'name' => 'Лавровый лист'],
                ['id' => 8, 'id_category' => '3', 'name' => 'Итальянские травы'],
                ['id' => 9, 'id_category' => '3', 'name' => 'Базилик'],
            ]
        );

        $this->createTable(
            'providers', [
                'id' => Schema::TYPE_PK . ' COMMENT "ID поставщика"',
                'name' => Schema::TYPE_STRING
                    . ' NOT NULL COMMENT "Название поставщика"',
                'inn' => Schema::TYPE_BIGINT . ' COMMENT "ИНН поставщика"',
                'kpp' => Schema::TYPE_INTEGER . ' COMMENT "КПП поставщика"',
                'address' => Schema::TYPE_TEXT . ' COMMENT "Адрес поставщика"',
                'phone' => Schema::TYPE_INTEGER . ' COMMENT "Телефон поставщика"'
            ], $tableOptions . ' COMMENT "Справочник поставщиков"'
        );
        $this->batchInsert(
            'providers',
            ['id', 'name', 'inn', 'kpp', 'address', 'phone'],
            [
                [
                    'id' => 1, 'name' => 'Основной поставщик', 'inn' => '',
                    'kpp' => '', 'address' => '', 'phone' => ''
                ],
                [
                    'id' => 2, 'name' => 'Магнит', 'inn' => '7789012302',
                    'kpp' => '778902001', 'phone' => '+74950521223',
                    'address' => 'г. Москва, 3 Строительный проезд, д. 7'
                ],
                [
                    'id' => 3, 'name' => 'Мир специй', 'inn' => '02354566021',
                    'kpp' => '705023001', 'phone' => '+78125061263',
                    'address' => 'г. Санкт-Петербург, Невский проспект, д. 47'
                ],
            ]
        );

        $this->createTable(
            'items', [
                'id' => Schema::TYPE_PK . ' COMMENT "ID товара"',
                'id_category' => Schema::TYPE_INTEGER
                    . ' COMMENT "Ссылка на таблицу product_categories"',
                'id_product_type' => Schema::TYPE_INTEGER
                    . ' NOT NULL COMMENT "Ссылка на таблицу product_types"',
                'quantity' => Schema::TYPE_INTEGER
                    . ' NOT NULL DEFAULT 0 COMMENT "Количество"',
                'id_provider' => Schema::TYPE_INTEGER
                    . ' NOT NULL COMMENT "Ссылка на таблицу providers"',
                'date_delivery' => Schema::TYPE_DATE
                    . ' NOT NULL COMMENT "Дата поставки"',
                'price' => Schema::TYPE_DECIMAL
                    . '(12, 2) NOT NULL DEFAULT "0.00" COMMENT "Цена"',
            ], $tableOptions . ' COMMENT "Товары"'
        );
        $this->addForeignKey(
            'fk_items-product_categories', 'items', 'id_category',
            'product_categories', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->addForeignKey(
            'fk_items-product_types', 'items', 'id_product_type',
            'product_types', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->addForeignKey(
            'fk_items-providers', 'items', 'id_provider',
            'providers', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->batchInsert(
            'items',
            [
                'id', 'id_category', 'id_product_type', 'quantity', 'id_provider',
                'date_delivery', 'price'
            ],
            [
                [
                    'id' => 1, 'id_category' => 1, 'id_product_type' => 1,
                    'quantity' => 12, 'id_provider' => 1,
                    'date_delivery' => '2017-02-23', 'price' => '20'
                ],
                [
                    'id' => 2, 'id_category' => 1, 'id_product_type' => 1,
                    'quantity' => 20, 'id_provider' => 2,
                    'date_delivery' => '2017-06-25', 'price' => '15'
                ],
                [
                    'id' => 3, 'id_category' => 1, 'id_product_type' => 2,
                    'quantity' => 5, 'id_provider' => 1,
                    'date_delivery' => '2017-03-26', 'price' => '19'
                ],
                [
                    'id' => 4, 'id_category' => 2, 'id_product_type' => 3,
                    'quantity' => 6, 'id_provider' => 1,
                    'date_delivery' => '2017-04-05', 'price' => '34'
                ],
                [
                    'id' => 5, 'id_category' => 2, 'id_product_type' => 4,
                    'quantity' => 9, 'id_provider' => 2,
                    'date_delivery' => '2017-', 'price' => '45'
                ],
                [
                    'id' => 6, 'id_category' => 2, 'id_product_type' => 5,
                    'quantity' => 12, 'id_provider' => 2,
                    'date_delivery' => '2017-04-21', 'price' => '55'
                ],
                [
                    'id' => 7, 'id_category' => 2, 'id_product_type' => 3,
                    'quantity' => 19, 'id_provider' => 2,
                    'date_delivery' => '2017-02-27', 'price' => '36'
                ],
                [
                    'id' => 8, 'id_category' => 2, 'id_product_type' => 4,
                    'quantity' => 8, 'id_provider' => 1,
                    'date_delivery' => '2017-04-12', 'price' => '48'
                ],
                [
                    'id' => 9, 'id_category' => 2, 'id_product_type' => 5,
                    'quantity' => 6, 'id_provider' => 1,
                    'date_delivery' => '2017-08-15', 'price' => '42'
                ],
                [
                    'id' => 10, 'id_category' => 3, 'id_product_type' => 6,
                    'quantity' => 5, 'id_provider' => 3,
                    'date_delivery' => '2017-09-12', 'price' => '12'
                ],
                [
                    'id' => 11, 'id_category' => 3, 'id_product_type' => 7,
                    'quantity' => 27, 'id_provider' => 3,
                    'date_delivery' => '2017-09-04', 'price' => '14'
                ],
                [
                    'id' => 12, 'id_category' => 3, 'id_product_type' => 8,
                    'quantity' => 8, 'id_provider' => 3,
                    'date_delivery' => '2017-07-03', 'price' => '76'
                ],
                [
                    'id' => 13, 'id_category' => 3, 'id_product_type' => 9,
                    'quantity' => 7, 'id_provider' => 3,
                    'date_delivery' => '2017-06-24', 'price' => '21'
                ],
                [
                    'id' => 14, 'id_category' => 3, 'id_product_type' => 6,
                    'quantity' => 32, 'id_provider' => 3,
                    'date_delivery' => '2017-08-25', 'price' => '19'
                ],
                [
                    'id' => 15, 'id_category' => 3, 'id_product_type' => 7,
                    'quantity' => 13, 'id_provider' => 2,
                    'date_delivery' => '2017-09-05', 'price' => '28'
                ],
                [
                    'id' => 16, 'id_category' => 3, 'id_product_type' => 8,
                    'quantity' => 10, 'id_provider' => 1,
                    'date_delivery' => '2017-09-11', 'price' => '150'
                ],
                [
                    'id' => 17, 'id_category' => 3, 'id_product_type' => 9,
                    'quantity' => 26, 'id_provider' => 1,
                    'date_delivery' => '2017-08-31', 'price' => '29'
                ],
                [
                    'id' => 18, 'id_category' => 3, 'id_product_type' => 6,
                    'quantity' => 85, 'id_provider' => 2,
                    'date_delivery' => '2017-07-05', 'price' => '16'
                ],
                [
                    'id' => 19, 'id_category' => 3, 'id_product_type' => 6,
                    'quantity' => 14, 'id_provider' => 2,
                    'date_delivery' => '2017-04-28', 'price' => '80'
                ],
                [
                    'id' => 20, 'id_category' => 3, 'id_product_type' => 7,
                    'quantity' => 50, 'id_provider' => 3,
                    'date_delivery' => '2017-03-17', 'price' => '200'
                ]
            ]
        );
    }

    /**
     * Roll down changes
     *
     * @return void
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_items-providers', 'items');
        $this->dropForeignKey('fk_items-product_types', 'items');
        $this->dropForeignKey('fk_items-product_categories', 'items');
        $this->dropTable('items');
        $this->dropTable('providers');
        $this->dropForeignKey(
            'fk_product_types-product_categories', 'product_types'
        );
        $this->dropTable('product_types');
        $this->dropTable('product_categories');
    }
}
