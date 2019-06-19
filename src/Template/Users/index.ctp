<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo Usuário'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Usuário') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id',['label' => 'id']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('username',['label' => 'Nome']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf',['label' => 'CPF']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('address',['label' => 'Endereço']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep',['label' => 'CEP']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('number',['label' => 'Número']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',['label' => 'Criado em']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified',['label' => 'Modificado']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->cpf) ?></td>
                <td><?= h($user->address) ?></td>
                <td><?= h($user->cep) ?></td>
                <td><?= h($user->number) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $user->id]) ?><br>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?><br>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><br>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
