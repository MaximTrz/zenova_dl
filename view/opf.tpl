<option value="0"> Не выбран </option>
<?php foreach ($opf['data'] as $opf): ?>

<?php
            $uid = $opf['uid'];
            $name = $opf['name'];
         ?>

<option value="<?= $uid ?>"><?= "{$name}" ?></option>

<?php endforeach; ?>