<?php

if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}

$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'Replace Underscore In TOC',
    'description' => 'Replaces underscores with hyphens in Table of Contents links',
    'version' => '1.0.0',
    'author' => 'Your Name',
);

$wgHooks['BeforePageDisplay'][] = 'ReplaceUnderscoreInTOC::onBeforePageDisplay';

class ReplaceUnderscoreInTOC {
    public static function onBeforePageDisplay( &$out, &$skin ) {
        $out->addModules( 'ext.replaceUnderscoreInTOC' );
        return true;
    }
}
