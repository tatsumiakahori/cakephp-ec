<div class="users form content">
    <?= $this->Flash->render() ?>
    <h3>ログイン</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>メールアドレスとパスワードを入力してください</legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('ログイン')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("新規登録はこちら", ['action' => 'add']) ?>
</div>
