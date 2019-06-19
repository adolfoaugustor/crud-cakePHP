<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listagem Usuários'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Adicionar Usuário') ?></legend>
        <?php
            echo $this->Form->control('username',[
                'label' => 'Nome'
            ]);
            echo $this->Form->control('cpf',[
                'label' => 'CPF'
            ]);
            echo $this->Form->control('cep',[
                'label' => 'CEP'
            ]);
            echo $this->Form->control('address',[
                'label' => 'Endereço'
            ]);
            echo $this->Form->control('number',[
                'label' => 'Número'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
