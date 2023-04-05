<div class="admin-default-index">
    <h1><?= 'Головна сторінка адміністратора'//$this->context->action->uniqueId ?></h1>
	<!-- add page content -->
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
