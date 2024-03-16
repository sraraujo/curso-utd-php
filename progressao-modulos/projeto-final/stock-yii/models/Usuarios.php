<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property int $ativo
 * @property string $tipoAcesso
 * @property string $isDeleted
 * @property string $loginAtual
 * @property string $loginFim
 * @property string $cadastrado
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'ativo', 'tipoAcesso', 'isDeleted'], 'required'],
            [['ativo'], 'integer'],
            [['loginAtual', 'loginFim', 'cadastrado'], 'safe'],
            [['nome'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 50],
            [['senha'], 'string', 'max' => 40],
            [['tipoAcesso'], 'string', 'max' => 5],
            [['isDeleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'ativo' => 'Ativo',
            'tipoAcesso' => 'Tipo Acesso',
            'isDeleted' => 'Is Deleted',
            'loginAtual' => 'Login Atual',
            'loginFim' => 'Login Fim',
            'cadastrado' => 'Cadastrado',
        ];
    }
}
