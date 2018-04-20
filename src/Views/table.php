<?php $this->layout('layout/main') ?>

<div class="uk-section-small uk-section-default header">
    <ul class="uk-breadcrumb">
        <!-- <li><a href="/home" uk-icon="icon: home"></a></li> -->
        <li><a href="/home">Home</a></li>
        <li><span><?= $dbname ?></span></li>
    </ul>
</div>

<div class="uk-section-small uk-section-default">
    <ul id="table-tabs" uk-tab>
        <li class="uk-active"><a href="#">结构</a></li>
        <li><a href="#">数据</a></li>
        <li><a href="#">备份</a></li>
    </ul>
    <ul class="uk-switcher">
        <li>
            <div class="uk-overflow-auto">
                <table class="tm-table uk-table uk-table-divider uk-table-small uk-table-responsive">
                    <thead>
                        <tr>
                            <th>Column</th>
                            <th>Type</th>
                            <th>Collation</th>
                            <th>Nullable</th>
                            <th>Default</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($columns as $col): ?>
                        <tr>
                            <td><?= $col['column_name']         ?></td>
                            <td><?= $this->column_type($col)    ?></td>
                            <td><?= $col['collation_name']      ?></td>
                            <td><?= $this->column_isnull($col)  ?></td>
                            <td><?= $col['column_default']      ?></td>
                            <td>
                                <a href="#" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                <a href="#" class="uk-icon-link" uk-icon="trash"></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>
            <div class="uk-overflow-auto">
                <table class="tm-table uk-table uk-table-divider uk-table-small uk-table-responsive">
                    <thead>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                            <th><?= $column['column_name'] ?></th>
                            <?php endforeach ?>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                            <td<?= $this->print_tip($row[$column['column_name']]) ?>><?= $this->print_val($row[$column['column_name']]) ?></td>
                            <?php endforeach ?>
                            <td>
                                <a href="#" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                <a href="#" class="uk-icon-link" uk-icon="trash"></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>
</div>
