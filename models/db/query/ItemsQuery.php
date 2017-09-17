<?php

namespace app\models\db\query;

use yii\db\Connection;

/**
 * Class ItemsQuery
 * This is the ActiveQuery class for [[\app\models\db\Items]].
 *
 * @package   app\models\db\query
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:46
 *
 * @see \app\models\db\Items
 */
class ItemsQuery extends \app\components\yii\db\AppActiveQuery
{
    /**
     * Get all rows
     *
     * @param null|Connection $db
     *
     * @return \app\models\db\Items[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * Get one row
     *
     * @param null|Connection $db
     *
     * @return \app\models\db\Items|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
