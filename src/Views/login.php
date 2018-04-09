<?php $this->layout('layout/single')?>

<div class="uk-section-large">
    <div class="uk-container uk-container-large">
        <div uk-grid="" class="uk-child-width-1-1@s uk-child-width-2-3@l uk-grid">
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl uk-first-column"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-body">
                        <center> <h2>PHP PostgreSQL Kit</h2> </center>
                        <br/>
                        <form method="POST" data-bitwarden-watching="1">
                            <fieldset class="uk-fieldset">

                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                                        <input name="user" class="uk-input" type="user" placeholder="Username">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password" class="uk-input" type="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                    <span class="uk-form-icon" uk-icon="icon: database"></span>
                                        <input name="dbname" class="uk-input" type="text" placeholder="Database">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <center>
                                        <button type="submit" class="uk-button uk-button-primary">
                                            <span uk-icon="icon: forward"></span>&nbsp;Login
                                        </button>
                                    </center>
                                </div>


                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
        </div>
    </div>
</div>
