<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:27:04+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _home.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T18:43:45+07:00

?>

<section id="section1 container-fluid">
    <header class="">
        <div class="mask"></div>
        <?php
        // ------------------------------------------------------------------------
        // include navbar
        // ------------------------------------------------------------------------
        include '_navbar.php'; ?>
    </header>
</section>

<div id="slims-home">
    <div class="container mx-auto px-2 lg:px-6">
        <!-- Hero -->
        <div class="flex lg:flex-row flex-col-reverse items-center lg:justify-between gap-4">
            <div class="w-full lg:w-1/2 text-lg-start text-center">
                <h1 class="fs-1 font-bold">
                    Beyond <span class="text-primary">Boundaries</span>
                </h1>
                <h1 class="fs-1 font-bold">
                    <span class="text-primary">Beyond</span> Books
                </h1>
                <p class="pt-4">
                    Step into a world where knowledge knows no bounds.
                    At Library SEAMEO RECFON, we redefine the library
                    experience, offering you more than just books –
                    we provide a gateway to a vast universe of
                    intellectual exploration.
                </p>
            </div>
            <div class="w-full lg:w-1/2">
                <img src="<?php echo assets('images/hero.svg'); ?>" class="w-full">
            </div>
        </div>
        <!-- Hero -->
    </div>

    <div class="py-12">
        <?php
        // --------------------------------------------------------------------------
        // include search form part
        // --------------------------------------------------------------------------
        include '_search-form.php'; ?>
    </div>

    <section class="mt-5 pb-12 container">
        <h4 class="text-2xl text-center text-bold my-4"><?php echo __('Select the topic you are interested in'); ?></h4>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <a href="index.php?keywords=eccne&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/eccne.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('ECCNE'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=ngts&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/ngts.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('NGTS'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=ngtw&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/ngtw.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('NGTW'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=annual+report&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/annual_report.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('Annual Report'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=booklet&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/booklet.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('Booklet'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=iprcertificate&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/ipr_certificate.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('IPR Certificate'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=magazine&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/magazine.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('Magazine'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=policybrief&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/policy_brief.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('Policy Brief'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=references&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/references.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('References'); ?></p>
                </a>
            </div>
            <div class="col">
                <a href="index.php?keywords=scientific publication&search=search" class="flex flex-col items-center rounded shadow py-6 text-decoration-none link-dark">
                    <img src="<?php echo assets('images/topic/scientific_publication.svg'); ?>" width="90" class="mb-3 mx-auto" />
                    <p class="font-medium text-xl"><?php echo __('Scientific Publication'); ?></p>
                </a>
            </div>
        </div>
    </section>

    <?php if ($sysconf['template']['classic_popular_collection']) : ?>
        <section class="mt-5 container">
            <h4 class=" mb-4">
                <?php echo __('Popular among our collections'); ?>
                <br>
                <small class="subtitle-section"><?php echo __('Our library\'s line of collection that have been favoured by our users were shown here. Look for them. Borrow them. Hope you also like them'); ?></small>
            </h4>

            <slims-group-subject url="index.php?p=api/subject/popular"></slims-group-subject>
            <slims-collection url="index.php?p=api/biblio/popular"></slims-collection>

        </section>
    <?php endif; ?>

    <?php if ($sysconf['template']['classic_new_collection']) : ?>
        <section class="mt-5 pb-12 container">
            <h4 class=" mb-4">
                <?php echo __('New collections + updated'); ?>
                <br>
                <small class="subtitle-section"><?php echo __('These are new collections list. Hope you like them. Maybe not all of them are new. But in term of time, we make sure that these are fresh from our processing oven'); ?></small>
            </h4>

            <slims-group-subject url="index.php?p=api/subject/latest"></slims-group-subject>
            <slims-collection url="index.php?p=api/biblio/latest"></slims-collection>

        </section>
    <?php endif; ?>
</div>