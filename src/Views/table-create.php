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
            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Text</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Some text...">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-select">Select</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="form-horizontal-select">
                        <option>Option 01</option>
                        <option>Option 02</option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-label">Radio</div>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input class="uk-radio" type="radio" name="radio1"> Option 01</label><br>
                    <label><input class="uk-radio" type="radio" name="radio1"> Option 02</label>
                </div>
            </div>

        </form>
    </div>
</div>
