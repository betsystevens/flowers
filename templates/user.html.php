<h2><?= $heading ?></h2>
<div class="header user">
    <div></div>
    <div>Id</div>
    <div>Name</div>
    <div>Email</div>
    <div>Password</div>
</div>

<?php foreach ($users as $row): ?>

    <div class="output user">
        <div class="edit">
            <a class="btn" 
                href="/flowers/public/user/update?id=<?= $row['id'] ?>">
                edit
            </a>
        </div>
        <?php foreach ($row as $key => $field): ?>
            <div class="field <?= $key ?>">
                <?= ($field == '' ? $key:$field) ?>
            </div>   
        <?php endforeach; ?>

        <form action="/flowers/public/user/delete" method="post">
            <input type="hidden"
                        name="id"
                        value="<?= $row['id'] ?>">
            <input type="submit" value="delete" class="btn">
        </form>
    </div>
    <hr></hr>
 <?php endforeach; ?>   
