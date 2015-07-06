<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $src
 * @property string $name
 * @property string $desc
 * @property integer $status
 * @property integer $ordering
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['status', 'ordering'], 'integer'],
            [['src'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'name' => 'Name',
            'desc' => 'Desc',
            'status' => 'Status',
            'ordering' => 'Ordering',
        ];
    }
}
