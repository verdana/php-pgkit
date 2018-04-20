<?php $this->layout('layout/main') ?>

<div class="uk-section-small uk-section-default header">
    <ul class="uk-breadcrumb">
        <a href="/home" uk-icon="icon: home"></a>
        <li><span><?= $dbname ?></span></li>
    </ul>
</div>

<div class="uk-section-small uk-section-default">
    <ul id="table-tabs" uk-tab>
        <li class="uk-active"><a href="">结构</a></li>
        <li><a href="<?= $this->uri() ?>">数据</a></li>
        <li class="uk-disabled"><a>备份</a></li>
    </ul>
    <ul class="uk-switcher">
        <li>
            <div class="uk-overflow-auto">
                <table class="tm-table uk-table uk-table-divider uk-table-small uk-table-responsive">
                    <thead>
                        <tr>
                            <th>Column</th>
                            <th>Type</th>
                            <th>collation_name</th>
                            <th>Nullable</th>
                            <th>Default</th>
                            <th>Action</th>
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
                            <th>Column</th>
                            <th>Type</th>
                            <th>collation_name</th>
                            <th>Nullable</th>
                            <th>Default</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>

</div>
