<option value="0"> Не выбран </option>
<?php foreach ($terminals['city'] as $city): ?>
    <?php foreach ($city['terminals']['terminal'] as $terminal): ?>
        <?php
            $id = $terminal['id'];
            $name = $terminal['name'];
            $address = $terminal['address'];
         ?>
        <option value="<?= $id ?>"><?= "{$name} {$address}" ?></option>
    <?php endforeach; ?>
<?php endforeach; ?>