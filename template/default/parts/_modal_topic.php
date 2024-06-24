<?php
/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2020-01-02 16:27
 * @File name           : _modal_topic.php
 */

?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=  __('Select the topic you are interested in'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="topic d-flex flex-wrap justify-content-center p-0">
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=annual%20report&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/annual_report.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Annual Report'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=booklet&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/booklet.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Booklet'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=eccne&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/eccne.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('ECCNE'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=iprcertificate&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/ipr_certificate.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('IPR Certificate'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=magazine&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/magazine.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Magazine'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=ngts&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/ngts.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('NGTS'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=ngtw&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/ngtw.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('NGTW'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=policybrief&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/policy_brief.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Policy Brief'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=references&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/references.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('References'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?keywords=scientific%20publication&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/scientific_publication.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Scientific publication'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-footer text-muted text-sm">
                <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            </div>
        </div>
    </div>
</div>
