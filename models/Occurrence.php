<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "occurrence".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $return_by
 * @property string $subject
 * @property string $message
 * @property integer $status_id
 * @property string $created
 * @property string $updated
 * @property integer $user_id
 * @property integer $updated_by
 */
class Occurrence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'occurrence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'return_by', 'subject', 'message', 'status_id', 'created', 'updated', 'user_id', 'updated_by'], 'required'],
            [['type_id', 'return_by', 'status_id', 'user_id', 'updated_by'], 'integer'],
            [['message'], 'string'],
            [['created', 'updated'], 'safe'],
            [['subject'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Tipo',
            'return_by' => 'Retorno por',
            'subject' => 'Assunto',
            'message' => 'Mensagem',
            'status_id' => 'Situação',
            'created' => 'Data',
            'updated' => 'Alteração',
            'user_id' => 'User',
            'updated_by' => 'Updated By',
        ];
    }
}
