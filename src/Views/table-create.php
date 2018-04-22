<?php $this->layout('layout/main')?>

<div class="uk-section-small uk-section-default header">
    <ul class="uk-breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/db/<?=$dbname?>"><?=$dbname?></a></li>
        <li><span>Create a new table</span></li>
    </ul>
</div>

<div class="uk-section-default uk-margin uk-position-relative">
    <ul id="table-tabs" uk-tab>
        <li class="uk-active"><a href="#">创建新的数据表</a></li>
    </ul>

    <div class="uk-overflow-auto uk-padding">
        <form class="uk-form-horizontal uk-margin-large">
            <table class="uk-table uk-table-justify">
                <thead>
                    <tr>
                        <th class="uk-table-shrink">字段名</th>
                        <th class="uk-table-">类型</th>
                        <th class="uk-table-">长度</th>
                        <th class="uk-table-*">默认</th>
                        <th class="uk-table-*">排序规则</th>
                        <th class="uk-table-*">NULL</th>
                        <th class="uk-table-*">索引</th>
                        <th>编码</th>
                        <th class="uk-table-expand"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < 5; ++$i): ?>
                    <tr>
                        <td><input class="uk-input uk-form-small uk-form-width-small" type="text"></td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <optgroup label="Common">
                                    <option>integer</option>
                                    <option>text</option>
                                    <option>numeric</option>
                                </optgroup>
                                <optgroup label="Numeric">
                                    <option>smallint</option>
                                    <option>integer</option>
                                    <option>bigint</option>
                                    <option>decimal</option>
                                    <option>numeric</option>
                                    <option>real</option>
                                    <option>double precision</option>
                                    <option>smallserial</option>
                                    <option>serial</option>
                                    <option>bigserial</option>
                                </optgroup>
                                <optgroup label="Monetary">
                                    <option>money</option>
                                </optgroup>
                                <optgroup label="Character">
                                    <option>character varying</option>
                                    <option>character</option>
                                    <option>text</option>
                                </optgroup>
                                <optgroup label="Binary Data">
                                    <option>bytea</option>
                                </optgroup>
                                <optgroup label="Date Time">
                                    <option>timestamp without timezone</option>
                                    <option>timestamp with timezone</option>
                                    <option>date</option>
                                    <option>time without timezone</option>
                                    <option>time with timezone</option>
                                    <option>interval</option>
                                </optgroup>
                                <optgroup label="Boolean">
                                    <option>boolean</option>
                                </optgroup>
                                <optgroup label="Enumerated">
                                    <option>enum</option>
                                </optgroup>
                                <optgroup label="Geometric">
                                    <option>point</option>
                                    <option>line</option>
                                    <option>lseg</option>
                                    <option>box</option>
                                    <option>path</option>
                                    <option>polygon</option>
                                    <option>circle</option>
                                </optgroup>
                                <optgroup label="Network Address">
                                    <option>cidr</option>
                                    <option>inet</option>
                                    <option>macaddr</option>
                                    <option>macaddr8</option>
                                </optgroup>
                                <optgroup label="Bit String">
                                    <option>bit</option>
                                    <option>bit varying</option>
                                </optgroup>
                                <optgroup label="Text Search">
                                    <option>tsquery</option>
                                    <option>tsvector</option>
                                </optgroup>
                                <optgroup label="UUID">
                                    <option>uuid</option>
                                </optgroup>
                                <optgroup label="XML">
                                    <option>xml</option>
                                </optgroup>
                                <optgroup label="Json">
                                    <option>json</option>
                                    <option>jsonb</option>
                                </optgroup>
                            </select>
                        </td>
                        <td><input class="uk-input uk-form-small uk-form-width-small" type="text"></td>
                        <td><input class="uk-input uk-form-small uk-form-width-small" type="text"></td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <option>NOT NULL</option>
                                <option>NULL</option>
                            </select>
                        </td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <option>NOT NULL</option>
                                <option>NULL</option>
                            </select>
                        </td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <option>Primary</option>
                                <option>Unique</option>
                                <option>Index</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
