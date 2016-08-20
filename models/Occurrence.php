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
        'TELEFONE',
        'CONSULTA SITE',
        'EMAIL',
    ];  

    public function getReturntype()
    {
        if ($this->returntype === null) {
            return null;
        }
        return self::$Static_returntype[$this->returntype];
    } 

    public static $Static_location = [
        'Local1',
        'Local1',
        'Local1',
        'Local1',
    ];  

    public function getLocation()
    {
        if ($this->location === null) {
            return null;
        }
        return self::$Static_Location[$this->location];
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
            [['protocol', 'type', 'returntype', 'subject', 'message', 'status', 'created'], 'required'],
            [['protocol', 'type', 'returntype', 'location', 'status', 'updated_by'], 'integer'],
            [['message','answer', 'reporter_name', 'reporter_email', 'reporter_phone', 'reporter_celphone'], 'string'],
            [['created', 'updated'], 'safe'],
            [['subject'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'protocol' => 'Protocolo',
            'type' => 'Tipo da Mensagem',
            'returntype' => 'Retorno por',
            'location' => 'Local',
            'subject' => 'Assunto',
            'message' => 'Mensagem',
            'status' => 'Situação',
            'created' => 'Data',
            'updated' => 'Alteração',
            'updated_by' => 'Alterado por',
            'answer' => 'Resposta',
            'reporter_name' => 'Nome',
            'reporter_email' => 'E-mail',
            'reporter_phone' => 'Telefone',
            'reporter_celphone' => 'Celular',
        ];
    }  
}