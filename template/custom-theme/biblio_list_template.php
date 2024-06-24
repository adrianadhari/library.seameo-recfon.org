<?php

/**
 * Template for Biblio List
 * name of memberID text field must be: memberID
 * name of institution text field must be: institution
 *
 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
 *
 * Slims 8 (Akasia)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

use SLiMS\Url;

$label_cache = array();
/**
 *
 * Format bibliographic item list for OPAC display
 *
 * @param   object $dbs
 * @param   array $biblio_detail
 * @param   int $n
 * @param   array $settings
 * @param   array $return_back
 *
 * @return string
 */
function biblio_list_format($dbs, $biblio_detail, $n, $settings = array(), &$return_back = array())
{
    global $label_cache, $sysconf;
    // init output var
    $output     = '';

    $title      = $biblio_detail['title'];
    $biblio_id  = $biblio_detail['biblio_id'];
    $detail_url = SWB . 'index.php?p=show_detail&id=' . $biblio_id . '&keywords=' . urlencode($settings['keywords'] ?? '');
    $cite_url   = SWB . 'index.php?p=cite&id=' . $biblio_id . '&keywords=' . $settings['keywords'];
    // $title_link = '<a href="'.$detail_url.'" class="titleField" itemprop="name" property="name" title="'.__('View record detail description for this title').'">'.$title.'</a>';

    // image thumbnail
    $images_loc = 'images/docs/' . $biblio_detail['image'];
    if ($biblio_detail['image'] == '' || $biblio_detail['image'] == NULL) {
        $images_loc = 'images/default/image.png';
    }
    $thumb_url = './lib/minigalnano/createthumb.php?filename=' . urlencode($images_loc) . '&width=240';

    // notes
    $notes = getNotes($dbs, $biblio_id);
    $custom_field = '';
    $grid_item_content = '';
    $i = 0;
    $expand = true;
    if ($settings['enable_custom_frontpage'] and $settings['custom_fields']) {
        $custom_field = '<dl class="row text-sm">';
        foreach ($settings['custom_fields'] as $field => $field_opts) {
            if ($field_opts[0] == 1) {
                $field_value = (trim($biblio_detail[$field] ?? '') !== '' ? $biblio_detail[$field] : '-');
                $custom_field .= '<dt class="col-sm-3">' . $field_opts[1] . '</dt><dd class="col-sm-9">' . $field_value . '</dd>';
                $grid_item_content .= '<li class="list-group-item"><label>' . $field_opts[1] . '</label><span class="text-right">' . $field_value . '</span></li>';
                $i++;
            }
        }
        $custom_field .= '</dl>';
    }
    if (empty($notes)) {
        $notes = $custom_field;
        $expand = false;
    }

    // availability
    $availability = getAvailability($dbs, $biblio_id, $sysconf);
    $class_avail = ($availability > 0) ? '' : 'text-danger';

    // authors
    $_authors = isset($biblio_detail['author']) ? $biblio_detail['author'] : biblio_list_model::getAuthors($dbs, $biblio_id, true);
    $_authors_string = '';
    if ($_authors) {
        if (!is_array($_authors)) {
            $_authors = explode('-', $_authors);
        }
        foreach ($_authors as $a) {
            $a = trim($a);
            $_authors_string .= '<a href="index.php?author=' . urlencode($a) . '&search=Search" itemprop="name" property="name" class="btn btn-outline-secondary btn-rounded">' . $a . '</a>';
        }
    }

    $output .= '<div class="col">';
    $output .= '<div class="card h-100 mb-3">';
    $__ = '__';
    $title_cite = str_replace('{title}', substr($title, 0, 50), __('Citation for: {title}'));

    $output .= '<div class="p-5 flex justify-center items-center bg-grey-light">';
    $output .= '<img loading="lazy" src="' . $thumb_url . '" class="img-fluid img-thumbnail shadow ' . ($availability > 0 ?: 'not-available') . '" title="' . ($availability > 0 ?:  __('Items is not available')) . '"/>';
    $output .= '</div>';
    $output .= '<div class="card-body">';
    $output .= '<a href="' . $detail_url . '" class="text-lg text-dark text-decoration-none">' . $title . '</a>';
    $output .= '</div>';
    $output .= '<div class="card-footer bg-transparent">';
    $output .= '<a class="btn btn-outline-secondary w-full openPopUp citationLink" href="' . $cite_url . '" title="' . $title_cite . '">' . $__('Cite') . '</a>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

function getNotes($dbs, $biblio_id)
{
    $query = $dbs->query('SELECT notes FROM biblio WHERE biblio_id = ' . $biblio_id);
    $data = $query->fetch_row();
    return addEllipsis($data[0], 400);
}

function addEllipsis($string, $length, $end = '…')
{
    if (strlen($string ?? '') > $length) {
        $length -= strlen($end);
        $string  = substr($string, 0, $length);
        $string .= $end;
    }

    return $string;
}

function getAvailability($dbs, $biblio_id, $sysconf)
{
    // get total number of this biblio items/copies
    $_item_q = $dbs->query('SELECT COUNT(*) FROM item WHERE biblio_id=' . $biblio_id);
    $_item_c = $_item_q->fetch_row();
    // get total number of currently borrowed copies
    $_borrowed_q = $dbs->query('SELECT COUNT(*) FROM loan AS l INNER JOIN item AS i'
        . ' ON l.item_code=i.item_code WHERE l.is_lent=1 AND l.is_return=0 AND i.biblio_id=' . $biblio_id);
    $_borrowed_c = $_borrowed_q->fetch_row();
    // total available
    $_total_avail = $_item_c[0] - $_borrowed_c[0];

    return $_total_avail;
}

function createButton(int $biblio_id, string $title)
{
    $commentUrlCondition = (utility::isMemberLogin() ?
        Url::getSlimsBaseUri('?p=show_detail&id=' . $biblio_id . '#comment') :
        Url::getSlimsBaseUri('?p=member&destination=' . Url::getSlimsBaseUri('?p=show_detail&id=' . $biblio_id . '#comment')->encode()));

    list($comment, $bookmark, $share) = [__('Comment'), (in_array($biblio_id, $_SESSION['bookmark'] ?? []) ? __('Bookmarked') : __('Bookmark')), __('Share')];

    $setBookmarked = trim(isset($_SESSION['bookmark'][$biblio_id]) ? 'bg-success text-white rounded-lg' : 'text-secondary');
    return <<<HTML
    <div class="d-flex flex-row text-xs my-1">
        <a href="{$commentUrlCondition}" style="cursor: pointer" class="text-decoration-none text-secondary font-weight-bolder mr-1 px-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
            {$comment}
        </a>
        <a href="javascript:void(0)" style="cursor: pointer" data-id="{$biblio_id}" class="bookMarkBook text-decoration-none font-weight-bolder mr-1 px-2 py-1 {$setBookmarked}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-postcard-heart" viewBox="0 0 16 16">
                <path d="M8 4.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm3.5.878c1.482-1.42 4.795 1.392 0 4.622-4.795-3.23-1.482-6.043 0-4.622ZM2.5 5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z"/>
                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2Z"/>
            </svg>
            <label id="label-{$biblio_id}" style="cursor: pointer !important" class="m-0">{$bookmark}</label>
        </a>
        <a href="javascript:void(0)" style="cursor: pointer" data-id="{$biblio_id}" data-title="{$title}" data-toggle="modal" data-target="#mediaSocialModal" class="text-decoration-none text-secondary font-weight-bolder mr-1 px-2 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
            </svg>
            {$share}
        </a>
    </div>
    HTML;
}