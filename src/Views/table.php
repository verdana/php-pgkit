<?php $this->layout('layout/main') ?>

<div class="uk-section-small uk-section-default header">
    <ul class="uk-breadcrumb">
        <a href="/home" uk-icon="icon: home"></a>
        <li><span>Postgres</span></li>
    </ul>
</div>

<div class="uk-section-small uk-section-default">
    <ul uk-tab>
        <li class="uk-active"><a href="">结构</a></li>
        <li><a href="">数据</a></li>
        <li class="uk-disabled"><a>备份</a></li>
    </ul>
    <div class="uk-overflow-auto">
        <table class="tm-table uk-table uk-table-divider uk-table-small uk-table-responsive">
            <thead>
                <tr>
                    <th>Schema</th>
                    <th>Table</th>
                    <th>Owner</th>
                    <th>Space</th>
                    <th>Index</th>
                    <th>Rules</th>
                    <th>Triggers</th>
                    <th>Row Security</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $table): ?>
                <tr>
                    <td><?= $table['schemaname'] ?></td>
                    <td><?= $table['tablename'] ?></td>
                    <td><?= $table['tableowner'] ?></td>
                    <td><?= $table['tablespace'] ?></td>
                    <td><?= $table['hasindexes'] ?></td>
                    <td><?= $table['hasrules'] ?></td>
                    <td><?= $table['hastriggers'] ?></td>
                    <td><?= $table['rowsecurity'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
