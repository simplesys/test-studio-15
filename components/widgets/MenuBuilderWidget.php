<?php

namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class MenuBuilder
 * Widget create links and menu items
 *
 * @package app\components\widgets
 * @author Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created 14.09.2017 14:35
 */
class MenuBuilderWidget extends Widget
{
    /**
     * @var array
     */
    public $elements;
    /**
     * @var string link|listLink
     */
    public $type;
    /**
     * @var string
     */
    public $ulClass = 'not-decorate-list';
    /**
     * @var string
     */
    public $liClass = 'list-link';

    /**
     * Create links
     *
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    public function run(): string
    {
        if ($this->type === 'link') {
            return $this->getSimpleLinks();
        } elseif ($this->type === 'listLink') {
            return $this->getListLinks();
        } else {
            return 'Not correct format links';
        }
    }

    /**
     * Get links string
     *
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    private function getSimpleLinks(): string
    {
        $links = '';

        foreach ($this->elements as $element) {
            $links .= Html::a(
                $element['text'], Url::to([$element['link']])
            ) . ' ';
        }

        return trim($links);
    }

    /**
     * Get links list
     *
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    private function getListLinks(): string
    {
        $links = '<ul class=' . $this->ulClass . '>';

        foreach ($this->elements as $element) {
            if (isset($element['icon'])) {
                $element['text'] = '<i class="' . $element['icon']
                    .'"></i>' . $element['text'];
            }

            $links .= '<li class=' . $this->liClass . '>'
                . Html::a(
                    $element['text'], Url::to([$element['link']])
                ) . '</li>';
        }

        $links .= '</ul>';

        return $links;
    }
}
