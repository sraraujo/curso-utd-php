<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string $nome
 * @property string $codigo
 * @property float $preco
 * @property string $estoque
 * @property int $ativo
 * @property string $isDeleted
 * @property string $cadastrado
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'codigo', 'preco', 'estoque', 'ativo', 'isDeleted'], 'required'],
            [['preco'], 'number'],
            [['ativo'], 'integer'],
            [['cadastrado'], 'safe'],
            [['nome'], 'string', 'max' => 60],
            [['codigo'], 'string', 'max' => 15],
            [['estoque'], 'string', 'max' => 5],
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
            'codigo' => 'Codigo',
            'preco' => 'Preco',
            'estoque' => 'Estoque',
            'ativo' => 'Ativo',
            'isDeleted' => 'Is Deleted',
            'cadastrado' => 'Cadastrado',
        ];
    }
}
