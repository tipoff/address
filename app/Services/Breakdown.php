<?php

namespace App\Services;

use DrewRoberts\Media\Models\Image;
use DrewRoberts\Media\Models\Video;
use ParsedownExtra;

class Breakdown extends ParsedownExtra
{
    /**
     * The array index is the first character of the pattern to match.
     * It is not possible to define patterns longer than one character directly here, as only the first
     * character of the line will be checked. (eg. Setting $this->BlockTypes['{tag'] won't work.).
     *
     * The second array is a list of all functions that should be called when the character is found.
     *
     * Leave out the 'block' or 'inline' part of the function name, as it will be prepended automatically.
     */
    public function __construct()
    {
        parent::__construct();

        $this->BlockTypes['?'][] = 'FAQSection';
    }

    protected function blockFAQSection($line)
    {
        if (! preg_match('/^\?{3}/', $line['text'])) {
            return;
        }

        $block = [
            'char' => $line['text'][0],
            'element' => [
                'name' => 'amp-accordion',
                'handler' => 'elements',
                'attributes' => [
                    'layout' => 'container',
                    'disable-session-states' => '',
                    'class' => 'ampstart-dropdown',
                ],
            ],
        ];

        $block['section'] = [
            'name' => 'section',
            'handler' => 'elements',
            'text' => [
                [
                    'name' => 'header',
                    'attributes' => [
                        'class' => 'faq-header',
                        'role' => 'heading',
                        'aria-expanded' => 'false',
                    ],
                    'handler' => 'text',
                    'text' => null,
                ],
                [
                    'name' => 'div',
                    'attributes' => [
                        'class' => 'faq-body',
                    ],
                    'handler' => 'lines',
                    'text' => [],
                ],
            ],
        ];

        $block['element']['text'][] = &$block['section'];

        return $block;
    }

    /**
     * Appending the word `continue` to the function name will cause this function to be
     * called to process any following lines, until $block['complete'] is set to be 'true'.
     */
    protected function blockFAQSectionContinue($line, $block)
    {
        // block is done
        if (isset($block['complete'])) {
            return;
        }

        // A blank newline has occurred.
        if (isset($block['interrupted'])) {
            $block['section']['text'][1]['text'][] = '';
            unset($block['interrupted']);
        }

        // Check for end of the block.
        if (preg_match('/\?{3}/', $line['text'])) {
            $block['complete'] = true;

            return $block;
        }

        // store line text for further processing
        if (empty($block['section']['text'][0]['text'])) {
            $block['section']['text'][0]['text'] = '## '.$line['text'];
        } else {
            $block['section']['text'][1]['text'][] = $line['text'];
        }

        return $block;
    }

    protected function inlineImage($excerpt)
    {
        $image = parent::inlineImage($excerpt);

        if ($image === null) {
            return;
        }

        $src = $image['element']['attributes']['src'];

        // This could be done outside of our video list, but I prefer to have them in a database table.
        if (substr($src, 0, 2) == 'v=') {
            if (Video::where('name', substr($src, 2))->first()) {
                $dbvideo = Video::where('name', substr($src, 2))->first();
                $image['element']['name'] = 'amp-youtube';
                $image['element']['attributes']['data-videoid'] = $dbvideo->name;
                $image['element']['attributes']['height'] = '270';
                $image['element']['attributes']['width'] = '480';
                $image['element']['attributes']['src'] = null;
                $image['element']['attributes']['alt'] = null;
                $image['element']['attributes']['layout'] = 'responsive';
            }
        }

        if (ctype_digit($src)) {
            if (Image::find($src)) {
                $dbimage = Image::find($src);
                $image['element']['name'] = 'amp-img';
                $image['element']['attributes']['src'] = $dbimage->url;
                $image['element']['attributes']['height'] = $dbimage->height;
                $image['element']['attributes']['width'] = $dbimage->width;
                $image['element']['attributes']['alt'] = $dbimage->description;
                $image['element']['attributes']['layout'] = 'responsive';
            }
        }

        return $image;
    }
}
