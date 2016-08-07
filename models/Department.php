<?php

namespace app\models;

use Yii;

class Department extends \yii\db\ActiveRecord
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

    public static $Static_employee = [
        'NÃO INFORMAR',
        'SIM',
        'NÃO',
        'NÃO, SOU CLIENTE',
    ];  

    public function getEmployee()
    {
        if ($this->employee === null) {
            return null;
        }
        return self::$Static_employee[$this->employee];
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
            [['type', 'returntype', 'employee', 'status', 'updated_by'], 'integer'],
            [['message', 'answer'], 'string'],
            [['created', 'updated'], 'safe'],
            [['protocol'], 'string', 'max' => 100],
            [['subject', 'reporter_phone', 'reporter_celphone'], 'string', 'max' => 50],
            [['reporter_name', 'reporter_email'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'protocol' => 'Protocolo',
            'type' => 'Tipo da Mensagem',
            'returntype' => 'Retorno por',
            'employee' => 'É funcionário?',
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