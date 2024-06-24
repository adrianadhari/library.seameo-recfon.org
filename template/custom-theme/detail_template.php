<?php

/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2019-01-30 00:58
 * @File name           : detail_template.php
 */
$setBookmarked = trim(isset($_SESSION['bookmark'][$biblio_id]) ? 'bg-success text-white rounded-lg px-2 py-1' : 'text-secondary px-2 py-1');
?>

<div class="">
    <h1 class="font-bold text-2xl pb-4"><?= $title; ?></h1>

    <div class="flex flex-col lg:flex-row gap-4">
        <div class="lg:w-1/4 lg:py-4">
            <div class="bg-grey-light p-12 rounded">
                <div class="shadow">
                    <?= $image; ?>
                </div>
            </div>

            <div class="py-4">
                <h3 class="text-xl font-bold pb-2">Author</h3>
                <?= $authors ?>
            </div>
        </div>

        <div class="lg:w-3/4 lg:py-4">
            <p class="text-justify pb-4 text-lg">
                <?= $notes ? $notes : '<i>' . __('Description Not Available') . '</i>'; ?>
            </p>

            <div>
                <h4 class="font-bold text-xl">Detail Information</h4>
                <table class="table-auto">
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Series Title'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2" itemprop="alternativeHeadline" property="alternativeHeadline">
                            <?php echo ($series_title) ? $series_title : '-'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Call Number'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2"><?php echo ($call_number) ? $call_number : '-'; ?></td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Publisher'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2">
                            <span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization" itemscope><?php echo $publish_place ?></span> :
                            <span itemprop="publisher" property="publisher"><?php echo $publisher_name ?></span>.,
                            <span itemprop="datePublished" property="datePublished"><?php echo $publish_year ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Collation'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2" itemprop="numberOfPages" property="numberOfPages">
                            <?php echo ($collation) ? $collation : '-'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Language'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2">
                            <meta itemprop="inLanguage" property="inLanguage" content="<?php echo $language_name ?>" /><?php echo $language_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('ISBN/ISSN'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2" itemprop="isbn" property="isbn">
                            <?php echo ($isbn_issn) ? $isbn_issn : '-'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold w-1/2"><?= __('Classification'); ?></td>
                        <td class="p-2">:</td>
                        <td class="p-2"><?php echo ($classification) ? $classification : '-'; ?></td>
                    </tr>
                </table>
            </div>

            <div class="py-4">
                <h4 class="font-bold text-xl">File Attachment</h4>
                <div itemprop="associatedMedia">
                    <?= !$file_att ? '<i>' . __('No Data') . '</i>' : $file_att; ?>
                </div>
            </div>

            <div>
                <h4 class="font-bold text-xl">Subject(s)</h4>
                <div class="flex items-center flex-wrap gap-1" itemprop="keywords" property="keywords">
                    <?php echo ($subjects) ? $subjects : '-'; ?>
                </div>
            </div>
        </div>
    </div>
</div>