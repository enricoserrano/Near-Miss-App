<?php
// +------------------------------------------------------------------------+
// | class.upload.sv_SE.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Mikael Andersson 2007. All rights reserved.              |
// | Version       0.25                                                     |
// | Last modified 24/11/2007                                               |
// | Email         mikael@familjenmartinsson.com                            |
// | Web           http://www.familjenmartinsson.com                        |
// +------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify   |
// | it under the terms of the GNU General Public License version 2 as      |
// | published by the Free Software Foundation.                             |
// |                                                                        |
// | This program is distributed in the hope that it will be useful,        |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of         |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the          |
// | GNU General Public License for more details.                           |
// |                                                                        |
// | You should have received a copy of the GNU General Public License      |
// | along with this program; if not, write to the                          |
// |   Free Software Foundation, Inc., 59 Temple Place, Suite 330,          |
// |   Boston, MA 02111-1307 USA                                            |
// |                                                                        |
// | Please give credit on sites that use class.upload and submit changes   |
// | of the script so other people can use them as well.                    |
// | This script is free to use, don't abuse.                               |
// +------------------------------------------------------------------------+

/**
 * Class upload swedish translation
 *
 * @version   0.25
 * @author    Mikael Andersson (mikael@familjenmartinsson.com)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Mikael Andersson
 * @package   cmf
 * @subpackage external
 */

    $translation = array();
    $translation['file_error']                  = 'Filfel. F??rs??k igen.';
    $translation['local_file_missing']          = 'Lokal fil hittades inte.';
    $translation['local_file_not_readable']     = 'Gick inte att skriva till lokal fil.';
    $translation['uploaded_too_big_ini']        = 'Uppladdningsfel (Den uppladdade filen ??verskrider upload_max_filesize direktivet i php.ini).';
    $translation['uploaded_too_big_html']       = 'Uppladdningsfel (Den uppladdade filen ??verskrider MAX_FILE_SIZE direktivet specificerat i html formul??ret).';
    $translation['uploaded_partial']            = 'Uppladdningsfel (Filen blev bara delvis uppladdad).';
    $translation['uploaded_missing']            = 'Uppladdningsfel (Ingen fil blev uppladdad).';
    $translation['uploaded_unknown']            = 'Uppladdningsfel (Ok??nt fel).';
    $translation['try_again']                   = 'Uppladdningsfel. F??rs??k igen.';
    $translation['file_too_big']                = 'Filen ??r f??r stor.';
    $translation['no_mime']                     = 'MIME-typen kan inte hittas.';
    $translation['incorrect_file']              = 'Inkorrekt filtyp.';
    $translation['image_too_wide']              = 'Bilden ??r f??r bred.';
    $translation['image_too_narrow']            = 'Bilden ??r f??r smal.';
    $translation['image_too_high']              = 'Bildens h??jd ??r f??r h??g.';
    $translation['image_too_short']             = 'Bildens h??jd ??r f??r l??g.';
    $translation['ratio_too_high']              = 'Bildf??rh??llandet ??r f??r stort (Bilden ??r f??r bred).';
    $translation['ratio_too_low']               = 'Bildf??rh??llandet ??r f??r litet (Bilden ??r f??r h??g).';
    $translation['too_many_pixels']             = 'Bilden har f??r m??nga pixlar.';
    $translation['not_enough_pixels']           = 'Bilden har inte tillr??ckligt med pixlar.';
    $translation['file_not_uploaded']           = 'Bilden ??r inte uppladdad. Processen har stoppats.';
    $translation['already_exists']              = '%s finns redan. ??ndra filnamnet.';
    $translation['temp_file_missing']           = 'Fel tempor??r k??llfil. Processen har stoppats.';
    $translation['source_missing']              = 'Fel uppladdad tempor??r k??lfil. Processen har stoppats.';
    $translation['destination_dir']             = 'M??lkatalogen kan inte skapas. Processen har stoppats.';
    $translation['destination_dir_missing']     = 'M??lkatalogen finns inte. Processen har stoppats.';
    $translation['destination_dir_write']       = 'M??lkatalogen kan inte g??ras skrivbar. Processen har stoppats.';
    $translation['destination_path_write']      = 'M??lkatalogen ??r inte skrivbar. Processen har stoppats.';
    $translation['temp_file']                   = 'Kan inte skapa den tempor??ra filen. Processen har stoppats.';
    $translation['source_not_readable']         = 'K??llfilen ??r inte skrivbar. Processen har stoppats.';
    $translation['no_create_support']           = 'Inget st??d f??r skapandet av %s.';
    $translation['create_error']                = 'Fel vid skapandet av %s.';
    $translation['source_invalid']              = 'Kan inte l??sa in bilden. ??r det en bild?';
    $translation['gd_missing']                  = 'GD Biblioteket verkar inte vara installerat p?? servern.';
    $translation['watermark_no_create_support'] = 'Inget st??d f??r skapandet av %s, kan inte l??sa vattenst??mpel.';
    $translation['watermark_create_error']      = 'Inget st??d f??r l??sandet av %s, kan inte skapa vattenst??mpel.';
    $translation['watermark_invalid']           = 'Ok??nt bildformat, kan inte l??sa vattenst??mpel.';
    $translation['file_create']                 = 'Inget st??d f??r skapandet av %s.';
    $translation['no_conversion_type']          = 'Ingen omvandlingstyp best??md.';
    $translation['copy_failed']                 = 'Fel vid kopiering av filen. copy() misslyckades.';
    $translation['reading_failed']              = 'Fel vid inl??sning av filen.';
