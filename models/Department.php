<?php

namespace app\models;

use Yii;

class Department extends \yii\db\ActiveRecord
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
        'Governador Valadares',
        'São Felix de Minas',
        'Frei Inocencio',
        'Itabirinha',
        'Jampruca',
        'Pescador',
        'Marilac',
        'Mantena',
        'Fernandes Tourinho',
        'Santa Efigênia',
        'Divinolandia de Minas',
        'Sardoá',
        'Divino das Laranjeiras',
        'Capitão Andrade',
        'Virginopolis',
        'Vargem Grande',
        'Outros',
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
            [['protocol', 'subject', 'message', 'status', 'created'], 'required'],
            [['subject', 'status', 'updated_by'], 'integer'],
            [['message', 'answer'], 'string'],
            [['created', 'updated'], 'safe'],
            [['protocol'], 'string', 'max' => 100],
            [['reporter_phone', 'reporter_celphone'], 'string', 'max' => 50],
            [['reporter_name', 'reporter_email'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'protocol' => 'Protocolo',
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

    public function getUser()
    {
        $user = Yii::$app->getModule("user")->model("User");
        return $this->hasOne($user::className(), ['id' => 'updated_by']);
    }    
}