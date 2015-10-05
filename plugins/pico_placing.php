<?php
class Pico_Placing {

/**
 * Pico-Placing
 * Copyright (c) 2014, Olli Erik Keskinen
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 *
 * * Redistributions in binary form must reproduce the above copyright notice, this
 *   list of conditions and the following disclaimer in the documentation and/or
 *   other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author Olli Erik Keskinen
 * @license http://opensource.org/licenses/BSD-2-Clause
 */

	public function before_read_file_meta(&$headers) {
		$headers['placing'] = 'Placing';
	}

	//get_page_data(&$data, $page_meta)
	public function get_page_data(&$data, $page_meta) {
		$data['placing'] = isset($page_meta['placing']) ? intval($page_meta['placing']) : 0;
	}

	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) 
	{
            global $config;
            if ($config['pages_order_by'] = 'placing') {
            $sorted_pages = array();

            $amountDigits = strlen($this->getHighestPlacing($pages));

            $placing_id = 0;
            foreach ($pages as $page) {
                $sorted_pages[ $this->formatAmountDigits($page['placing'], $amountDigits) . '-' . $placing_id ] = $page;
                $placing_id++;
            }

            ksort($sorted_pages);
            $pages = $sorted_pages;
        }
    }
	
    /**
     * @param array $pages
     * @return int
     */
    private function getHighestPlacing(array $pages)
    {
        $highest = 0;
        foreach($pages as $page) {
            $placing = intval($page['placing']);
            if( $placing > $highest ) {
                $highest = $placing;
            }
        }

        return $highest;
    }

    /**
     * @param int|string $number
     * @param int $digits
     * @return string
     */
    private function formatAmountDigits($number, $digits)
    {
        while( strlen($number) < $digits ) {
            $number = '0' . $number;
        }

        return $number;
    }

}
?>
