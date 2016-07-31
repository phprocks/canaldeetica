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

    public static $Static_returntype = [
        'CARTA',
        'CONSULTA PELA INTERNET',
        'EMAIL',
    ];  

    public function getReturntype()
    {
        if ($this->returntype === null) {
            return null;
        }
        return self::$Static_returntype[$this->returntype];
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
            [['type', 'returntype', 'subject', 'message', 'status', 'created', 'user_id'], 'required'],
            [['type', 'returntype', 'status', 'user_id', 'updated_by'], 'integer'],
            [['message'], 'string'],
            [['created', 'updated'], 'safe'],
            [['subject'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Tipo',
            'returntype' => 'Retorno por',
            'subject' => 'Assunto',
            'message' => 'Mensagem',
            'status' => 'Situação',
            'created' => 'Data',
            'updated' => 'Alteração',
            'user_id' => 'User',
            'updated_by' => 'Updated By',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }    
}