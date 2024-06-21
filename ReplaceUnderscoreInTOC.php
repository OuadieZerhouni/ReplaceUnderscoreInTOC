<?php
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}

$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'Replace Underscore In TOC',
    'description' => 'Replaces underscores with hyphens in Table of Contents links',
    'version' => '1.0.0',
    'author' => 'Ouadie ZERHOUNI',
);

$wgHooks['BeforePageDisplay'][] = 'ReplaceUnderscoreInTOC::onBeforePageDisplay';

class ReplaceUnderscoreInTOC {
    /**
     * Hook to modify TOC anchors before page display.
     *
     * @param OutputPage $out
     * @param Skin $skin
     * @return bool
     */
    public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
        // Get the current HTML content
        $html = $out->getHTML();

        // Replace underscores with hyphens in TOC anchors
        $modifiedHtml = self::replaceTocAnchorsAndHeadlines($html);
        // Set the modified HTML back to OutputPage
        $out->clearHTML();
        $out->addHTML($modifiedHtml);

        return true;
    }

    /**
     * Replace underscores with hyphens in TOC HTML anchors and headline IDs.
     *
     * @param string $html
     * @return string
     */
    private static function replaceTocAnchorsAndHeadlines( $html ) {
        // Replace underscores with hyphens in TOC href attributes
        $html = preg_replace_callback(
            '/<li class="toclevel-[0-9]+ tocsection-[0-9]+">.*?<a href="#([^"]+)".*?<\/a>/s',
            function($matches) {
                $newHref = str_replace('_', '-', $matches[1]);
                return str_replace($matches[1], $newHref, $matches[0]);
            },
            $html
        );

        // Replace underscores with hyphens in all href that start with #
        $html = preg_replace_callback(
            '/<a href="#([^"]+)"/s',
            function($matches) {
                $newHref = str_replace('_', '-', $matches[1]);
                return str_replace($matches[1], $newHref, $matches[0]);
            },
            $html
        );

        // Replace underscores with hyphens in headline IDs
        $html = preg_replace_callback(
            '/<span class="mw-headline" id="([^"]+)">/s',
            function($matches) {
                $newId = str_replace('_', '-', $matches[1]);
                return str_replace($matches[1], $newId, $matches[0]);
            },
            $html
        );

        return $html;
    }
}
