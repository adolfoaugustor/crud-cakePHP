<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    /**
     * Initialize method
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->add('cpf','custom',
                ['rule'=>
                    function($cpf)
                    {
                        // Verifica se um número foi informado
                        if(empty($cpf)) {
                            return false;
                        }

                        // Elimina possivel mascara
                        $cpf = preg_replace('[^0-9]', '', $cpf);
                        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                        // Verifica se o numero de digitos informados é igual a 11
                        if (strlen($cpf) != 11) {
                            return false;
                        }
                        // Verifica se nenhuma das sequências invalidas abaixo foi digitada
                        else if ($cpf == '00000000000' ||
                            $cpf == '11111111111' ||
                            $cpf == '22222222222' ||
                            $cpf == '33333333333' ||
                            $cpf == '44444444444' ||
                            $cpf == '55555555555' ||
                            $cpf == '66666666666' ||
                            $cpf == '77777777777' ||
                            $cpf == '88888888888' ||
                            $cpf == '99999999999') {
                            return false;
                            // Calcula os digitos verificadores para verificar se o cpf é valido
                        } else {

                            for ($t = 9; $t < 11; $t++) {

                                for ($d = 0, $c = 0; $c < $t; $c++) {
                                    $d += $cpf{$c} * (($t + 1) - $c);
                                }
                                $d = ((10 * $d) % 11) % 10;
                                if ($cpf{$c} != $d) {
                                    return false;
                                }
                            }

                            return true;
                        }

                    },
                    // Caso retorne falso ele vai retornar uma mensagem falando que é inválido
                    'message'=>'CPF Inválido'
                ])->allowEmptyString('cpf', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', true);

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->allowEmptyString('cep', true);

        $validator
            ->scalar('number')
            ->maxLength('number', 50)
            ->requirePresence('number', 'create')
            ->allowEmptyString('number', true);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
