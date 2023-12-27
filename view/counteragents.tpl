<option value="0"> Не выбран </option>
<?php foreach ($counteragents['data']['counteragents'] as $counteragent): ?>

        <?php
            $uid = $counteragent['uid'];
            $name = $counteragent['name'];
         ?>

<option value="<?= $uid ?>"><?= "{$name}" ?></option>

<?php endforeach; ?>