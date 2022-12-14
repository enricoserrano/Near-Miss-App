<?php
// +------------------------------------------------------------------------+
// | class.upload.lt_LT.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Dainius Kaupaitis 2010. All rights reserved.             |
// | Version       0.32                                                     |
// | Last modified 10/13/2014                                               |
// | Email         dk@sum.lt                                                |
// | Web           http://sum.lt                                            |
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
 * Class upload lithuanian translation
 *
 * @version   0.32
 * @author    Dainius Kaupaitis (dk@sum.lt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Dainius Kaupaitis
 * @package   cmf
 * @subpackage external
 */

    $translation = array();
    $translation['file_error']                  = 'Klaida faile. Bandykite dar kart??.';
    $translation['local_file_missing']          = 'Lokalus failas neegzistuoja.';
    $translation['local_file_not_readable']     = 'Ne??manoma nuskaityti lokalaus failo.';
    $translation['uploaded_too_big_ini']        = 'Pakrovimo klaida (pakrauto failo dydis vir??ija upload_max_filesize parametr?? php.ini faile).';
    $translation['uploaded_too_big_html']       = 'Pakrovimo klaida (pakrauto failo dydis vir??ija MAX_FILE_SIZE parametr?? HTML formoje).';
    $translation['uploaded_partial']            = 'Pakrovimo klaida (failas buvo pakrautas tik dalinai).';
    $translation['uploaded_missing']            = 'Pakrovimo klaida (nepakrautas joks failas).';
    $translation['uploaded_no_tmp_dir']         = 'Pakrovimo klaida (n??ra laikinos direktorijos).';
    $translation['uploaded_cant_write']         = 'Pakrovimo klaida (nepavyko ??ra??yti failo ?? disk??).';
    $translation['uploaded_err_extension']      = 'Pakrovimo klaida (pakrovimas sustabdytas d??l pl??tinio).';
    $translation['uploaded_unknown']            = 'Pakrovimo klaida (ne??inomas klaidos kodas).';
    $translation['try_again']                   = 'Pakrovimo klaida. Bandykite dar kart??.';
    $translation['file_too_big']                = 'Failas per didelis.';
    $translation['no_mime']                     = 'Nenustatytas MIME tipas.';
    $translation['incorrect_file']              = 'Neteisingas failo tipas.';
    $translation['image_too_wide']              = 'Paveiksl??lis per platus.';
    $translation['image_too_narrow']            = 'Paveiksl??lis per siauras.';
    $translation['image_too_high']              = 'Paveiksl??lis per auk??tas.';
    $translation['image_too_short']             = 'Paveiksl??lis per ??emas.';
    $translation['ratio_too_high']              = 'Paveiksl??lio kra??tini?? santykis per didelis (per platus).';
    $translation['ratio_too_low']               = 'Paveiksl??lio kra??tini?? santykis per ma??as (per auk??tas).';
    $translation['too_many_pixels']             = 'Paveiksl??lyje yra per daug pikseli??.';
    $translation['not_enough_pixels']           = 'Paveiksl??lyje yra per ma??ai pikseli??.';
    $translation['file_not_uploaded']           = 'Failas nepakrautas. Ne??manoma apdoroti.';
    $translation['already_exists']              = '%s jau egzistuoja. Pakeiskite failo pavadinim??.';
    $translation['temp_file_missing']           = 'N??ra laikino ??altinio failo. Ne??manoma apdoroti.';
    $translation['source_missing']              = 'N??ra pakrauto ??altinio failo. Ne??manoma apdoroti.';
    $translation['destination_dir']             = 'Ne??manoma sukurti paskirties direktorijos. Ne??manoma apdoroti.';
    $translation['destination_dir_missing']     = 'Paskirties direktorija neegzistuoja. Ne??manoma apdoroti.';
    $translation['destination_path_not_dir']    = 'Paskirties kelias n??ra direktorija. Ne??manoma apdoroti.';
    $translation['destination_dir_write']       = 'Paskirties direktorijos teis??s negali b??ti pakeistos ra??ymui. Ne??manoma apdoroti.';
    $translation['destination_path_write']      = 'Paskirties kelias yra u??draustas ra??ymui. Ne??manoma apdoroti.';
    $translation['temp_file']                   = 'Ne??manoma nuskaityti laikino failo. Ne??manoma apdoroti.';
    $translation['source_not_readable']         = 'Ne??manoma nuskaityti ??altinio failo. Ne??manoma apdoroti.';
    $translation['no_create_support']           = 'Nepalaikomas suk??rimas i?? %s.';
    $translation['create_error']                = 'Klaida sukuriant %s paveiksl??l?? i?? ??altinio.';
    $translation['source_invalid']              = 'Ne??manoma nuskaityti paveiksl??lio ??altinio. Ne grafinis failo tipas?';
    $translation['gd_missing']                  = 'Pana??u, kad n??ra GD.';
    $translation['watermark_no_create_support'] = 'Nepalaikomas suk??rimas i?? %s, ne??manoma nuskaityti vandens ??enklo.';
    $translation['watermark_create_error']      = 'Nepalaikomas %s skaitymas, ne??manoma sukurti vandens ??enklo.';
    $translation['watermark_invalid']           = 'Neatpa??intas paveiksl??lio tipas, ne??manoma nuskaityti vandens ??enklo.';
    $translation['file_create']                 = 'Nepalaikomas %s suk??rimas.';
    $translation['no_conversion_type']          = 'Nenusakytas konvertavimo tipas.';
    $translation['copy_failed']                 = 'Klaida kopijuojant fail?? serveryje. copy() klaida.';
    $translation['reading_failed']              = 'Klaida skaitant fail??.';
