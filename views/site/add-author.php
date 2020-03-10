<div class="text-center text-danger block-info">
<?php if (!empty($_SESSION['error'])): ?>
    <?php foreach ($_SESSION['error'] as $error): ?>
        <?php echo $error; ?><br>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($_SESSION['success'])): ?>
    <?php echo $_SESSION['success']; ?>
<?php endif; ?>
    <?php unset($_SESSION['error'], $_SESSION['success']);?>
</div>
<form method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm">Автор (имя)</label>
        <div class="col-sm-10">
            <input type="text" name="fname" class="form-control form-control-sm">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm">Автор (Фамилия)</label>
        <div class="col-sm-10">
            <input type="text" name="sname" class="form-control form-control-sm">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm">Автор (email)</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control form-control-sm">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
</form>