<?php $this->layout('layout/main') ?>

<div class="uk-section-small uk-section-default header">
    <ul class="uk-breadcrumb">
        <a href="/home" uk-icon="icon: home"></a>
    </ul>
</div>

<div class="uk-section-small uk-section-default">
    <ul uk-tab>
        <li class="uk-active"><a href="">结构</a></li>
        <li><a href="">数据</a></li>
        <li class="uk-disabled"><a>备份</a></li>
    </ul>
    <table class="uk-table uk-table-hover uk-table-small">
        <thead>
            <tr>
                <th>Table Heading</th>
                <th>Table Heading</th>
                <th>Table Heading</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Table Data</td>
                <td>Table Data</td>
                <td>Table Data</td>
            </tr>
            <tr>
                <td>Table Data</td>
                <td>Table Data</td>
                <td>Table Data</td>
            </tr>
            <tr>
                <td>Table Data</td>
                <td>Table Data</td>
                <td>Table Data</td>
            </tr>
        </tbody>
    </table>
</div>
