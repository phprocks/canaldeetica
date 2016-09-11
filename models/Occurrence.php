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
        'Denúncias', 'Reclamações', 'Elogios', 'Sugestões', 'Outros'
    ];  

    public function getSubject()
    {
        if ($this->subject === null) {
            return null;
        }
        return self::$Static_subject[$this->subject];
    }

    public static $Static_location = [
        'Capitão Andrade',
        'Divino das Laranjeiras',
        'Divinolandia de Minas',
        'Fernandes Tourinho',
        'Frei Inocencio',
        'Governador Valadares',
        'Itabirinha',
        'Jampruca',
        'Mantena',
        'Marilac',
        'Outros',
        'Pescador',
        'Santa Efigênia',
        'Sardoá',
        'São Felix de Minas',
        'Vargem Grande',
        'Virginopolis',
    ];  

    public function getLocation()
    {
        if ($this->location === null) {
            return null;
        }
        return self::$Static_location[$this->location];
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
            'subject' => 'Tipo',
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