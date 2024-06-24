<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-25T10:31:54+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _search-form.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T16:53:56+07:00

?>

<div class="search" id="search-wraper" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex flex-wrap flex-lg-nowrap">
                    <div class="p-2 w-100">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <form class="" action="index.php" method="get" @submit.prevent="searchSubmit">
                                    <input type="hidden" name="search" value="search">
                                    <input ref="keywords" value="<?= htmlentities(getQuery('keywords')) ?>" v-model.trim="keywords" @focus="searchOnFocus" @blur="searchOnBlur" type="text" id="search-input" name="keywords" class="input-transparent w-100" autocomplete="off" placeholder="<?= __('Enter keyword to search collection...'); ?>" />
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 flex-shrink-1">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#adv-modal">
                            <?= __('Advanced Search'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>