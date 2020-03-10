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
    <label class="col-sm-2 col-form-label col-form-label-sm">Название</label>
    <div class="col-sm-10">
        <input type="text" name="title" class="form-control form-control-sm">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm">Текст</label>
    <div class="col-sm-10">
        <textarea name="text" class="form-control form-control-sm"  rows="3"></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm">Автор</label>
    <div class="col-sm-10">
        <select name="author" class="form-control form-control-sm">
            <option>--------</option>
            <?php if (!empty($authors)): ?>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['id']; ?>"><?php echo $author['fname']; ?>/<?php echo $author['sname']; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm">Дата</label>
    <div class="col-sm-10">
        <input type="date" name="date" class="form-control form-control-sm">
    </div>
</div>
    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
</form>