<?php

namespace app\models\db\query;

use yii\db\Connection;

/**
 * Class ProvidersQuery
 * This is the ActiveQuery class for [[\app\models\db\Providers]].
 *
 * @package   app\models\db\query
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 10:42
 *
 * @see \app\models\db\Providers
 */
class ProvidersQuery extends \app\components\yii\db\AppActiveQuery
{
    /**
     * Get all rows
     *
     * @param null|Connection $db
     *
     * @return \app\models\db\Providers[]|array
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
     * @return \app\models\db\Providers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
