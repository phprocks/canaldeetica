<?php

namespace app\models;

use Yii;

class Occurrence extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'occurrence';
    }

    public static $Static_subject = [
        'Conflito de Interesses',
        'Discriminação ou práticas abusivas (assedio moral ou sexual)',
        'Fraudes (internas e/ou externas)',
        'Violação / descumprimentos de normativos internos',
        'Comercialização de produtos nas dependencias da entidade',
        'Quebra de sigilo',
        'Outros',
    ];  

    public function getSubject()
    {
        if ($this->subject === null) {
            return null;
        }
        return self::$Static_subject[$this->subject];
    }

    public static $Static_location = [
        'Governador Valadares',
        'Frei Inocencio',
        'São Felix de Minas',
        'Itabirinha',
        'Outros',
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
            [['protocol', 'subject', 'location', 'message', 'status', 'created'], 'required'],
            [['protocol', 'subject', 'location', 'status', 'updated_by'], 'integer'],
            [['message','answer', 'reporter_name', 'reporter_email', 'reporter_phone', 'reporter_celphone'], 'string'],
            [['created', 'updated'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'protocol' => 'Protocolo',
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