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
        $modifiedHtml = self::replaceTocAnchors($html);

        // Set the modified HTML back to OutputPage
        $out->clearHTML();
        $out->addHTML($modifiedHtml);

        return true;
    }

    /**
     * Replace underscores with hyphens in TOC HTML anchors.
     *
     * @param string $html
     * @return string
     */
    private static function replaceTocAnchors( $html ) {
        return preg_replace_callback(
            '/href="#([^"]+)"/',
            function($matches) {
                return 'href="#' . str_replace('_', '-', $matches[1]) . '"';
            },
            $html
        );
    }
}