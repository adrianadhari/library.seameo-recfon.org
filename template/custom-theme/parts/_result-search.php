<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:32:46+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _result-search.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T16:53:58+07:00

?>

<div class="result-search">
    <section id="section1 container-fluid">
        <header class="">
            <div class="mask"></div>
            <?php
            // ----------------------------------------------------------------------
            // include navbar part
            // ----------------------------------------------------------------------
            include '_navbar.php'; ?>
        </header>
        <div class="py-12">
            <?php
            // ------------------------------------------------------------------------
            // include search form part
            // ------------------------------------------------------------------------
            include '_search-form.php'; ?>
        </div>
    </section>

    <section class="container">
        <div class="my-4 text-lg border-b">
            <?php echo $search_result_info ?>
        </div>

        <div class="wrapper mb-4">
            <?php
            if (ENVIRONMENT == 'development' && !empty($engine->getError())) echo '<div class="alert alert-danger mt-2 text-center">' . $engine->getError() . '</div>';
            // catch empty list
            if (trim(strip_tags($main_content)) === '') {
                echo '<div class="d-flex justify-content-center">
                                <img src="' . assets('images/empty.svg') . '" />
                              </div>
                              <div class="text-center text-danger pb-4"><strong>' . __('No Result') . '.</strong> ' . __('Please try again') . '</div>';
            } else {
                echo '<div class="biblioResult">'.$main_content.'</div>';
            }
            ?>
        </div>
    </section>
</div>