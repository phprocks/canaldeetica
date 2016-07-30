<?php

namespace app\models;

use Yii;

class Occurrence extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'occurrence';
    }

    public static $Static_type = [
        'DÚVIDA',
        'ELOGIO',
        'RECLAMAÇÃO',
        'SUGESTÃO',
        'OUTROS',
    ];  

    public function getType()
    {
        if ($this->type === null) {
            return null;
        }
        return self::$Static_type[$this->type];
    }    

    public static $Static_return = [
        'CARTA',
        'CONSULTA PELA INTERNET',
        'E-MAIL',
    ];  

    public function getReturn()
    {
        if ($this->return === null) {
            return null;
        }
        return self::$Static_return[$this->return];
    } 

    public static $Static_status = [
        'PENDENTE',
        'EM ANÁLISE',
        'FINALIZADO',
    ];  

    public function getStatus()
    {
        if ($this->status === null) {
            return null;
        }
        return self::$Static_status[$this->status];
    }    

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