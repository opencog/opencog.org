<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

# set a blank logo.  In our MediaWiki-1.16 I'm not sure how this was
# being done.
#
$wgLogo = "";

wfLoadExtension( 'SyntaxHighlight_GeSHi' );

require_once( "$IP/extensions/GraphViz/GraphViz.php");
#wfLoadExtension( 'GraphViz' ); # This is not working on mediawiki-1.27.1
$wgGraphVizSettings->execPath = "/usr/bin/dot";

wfLoadExtension( 'ReplaceText' );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}

$wgSitename = "OpenCog";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/wikihome";
$wgScriptExtension = ".php";
$wgArticlePath = "/w/$1";
$wgUsePathInfo = true;


$wgEnableEmail = true;
$wgEnableUserEmail = true;

# TODO: Replace appropriately
$wgEmergencyContact = "xxxxx";
$wgPasswordSender = "xxxxx";

## For a detailed description of the following switches see
## http://www.mediawiki.org/wiki/Extension:Email_notification
## and http://www.mediawiki.org/wiki/Extension:Email_notification
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

# TODO: Replace with appropriate
$wgDBtype           = "mysql";
$wgDBserver         = "xxxxx";
$wgDBname           = "xxxxx";
$wgDBuser           = "xxxxx";
$wgDBpassword       = "xxxxx";

# MySQL specific settings
$wgDBprefix         = "oc_";

# MySQL table options to use during installation or update
#$wgDBTableOptions   = "TYPE=InnoDB";
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;

# Postgres specific settings
$wgDBport           = "5432";
$wgDBmwschema       = "mediawiki";
$wgDBts2schema      = "public";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgStrictFileExtensions = false;

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
$wgHashedUploadDirectory = true;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = true;

$wgLocalInterwiki   = strtolower( $wgSitename );

$wgShowIPinHeader = false;

$wgLanguageCode = "en";

# TODO: Replace with appropriate key see
# https://www.mediawiki.org/wiki/Manual:$wgSecretKey
$wgSecretKey ="xxxxx";

# Disable anonymous edits
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['user']['edit'] = true;

$wgEnableUploads = true;

$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['replacetext'] = true;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
## TODO: clone https://github.com/figure002/cavendishmw into skins directory.
$wgDefaultSkin = 'cavendishmw';
# wfLoadSkin('cavendishmw'); # This causes error
# This is required for loading the cavendishmw as it hasn't been updated for
# mediawiki-1.27.1
require_once("$IP/skins/cavendishmw/cavendishmw.php");

# TODO: favicon.ico is found in the directory containing this file, within this
# repo. Copy to $wgScriptPath.
$wgFavicon = "$wgScriptPath/favicon.ico";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.2";
$wgRightsIcon = "${wgScriptPath}/resources/assets/licenses/gnu-fdl.png";
# $wgRightsCode = "gfdl1_3"; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );

define("ns_tt", 100);
define("ns_prime", 102);
define("ns_prime_talk", 103);
define("ns_mind", 104);

$wgExtraNamespaces[ns_tt] = "tt";
$wgExtraNamespaces[ns_prime] = "OpenCogPrime";
$wgExtraNamespaces[ns_prime_talk] = "Talk:OpenCogPrime";
$wgExtraNamespaces[ns_mind] = "MindOntology";

$wgNamespaceProtection[ns_tt] = array( 'edittt' );
$wgGroupPermissions['*']['edittt'] = false;
$wgGroupPermissions['sysop']['edittt'] = true;

$wgNamespaceProtection[ns_prime] = array( 'editprime' );
$wgGroupPermissions['*']['editprime'] = false;
$wgGroupPermissions['user']['editprime'] = true;

$wgNamespaceProtection[ns_mind] = array( 'editmind' );
$wgGroupPermissions['*']['editmind'] = false;
$wgGroupPermissions['user']['editmind'] = true;

$wgContentNamespaces[] = array(ns_tt,ns_prime,ns_mind);

$wgNamespacesWithSubpages[ns_tt] = true;
$wgNamespacesWithSubpages[ns_prime] = true;
$wgNamespacesWithSubpages[ns_mind] = true;

$wgNamespacesToBeSearchedDefault = array(
       -1                => false,
       NS_MAIN           => true,
       NS_USER           => false,
       NS_USER_TALK      => false,
       NS_PROJECT_TALK   => false,
       NS_IMAGE_TALK     => false,
       NS_IMAGE_TALK     => false,
       NS_TEMPLATE_TALK  => false,
       NS_HELP_TALK      => false,
       NS_CATEGORY_TALK  => false,
       102               => true,
       104               => true
);

$wgShowExceptionDetails = true;

require_once( "$IP/extensions/HTMLets/HTMLets.php" );
# wfLoadExtension( 'HTMLets' ); # This is not working on mediawiki-1.27.1
$wgHTMLetsDirectory = "$IP/htmlets";

wfLoadExtension( 'Nuke' );

# spam protection
wfLoadExtensions( array( 'ConfirmEdit', 'ConfirmEdit/QuestyCaptcha' ) );
$wgCaptchaClass = 'QuestyCaptcha';

# TODO: Replace 'xxxxx' with the questions and answers
$wgCaptchaQuestions[] = array( 'question' => "xxxxx", 'answer' => "xxxxx" );
$wgGroupPermissions['*'            ]['skipcaptcha'] = false;
$wgGroupPermissions['user'         ]['skipcaptcha'] = false;
$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = false;
$wgGroupPermissions['bot'          ]['skipcaptcha'] = false; // registered bots
$wgGroupPermissions['sysop'        ]['skipcaptcha'] = true;
$wgCaptchaTriggers['edit']          = false;
$wgCaptchaTriggers['create']        = true;
$wgCaptchaTriggers['addurl']        = true;
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['badlogin']      = true;

# Only users with accounts four days old or older can create pages
# Requires MW 1.6 or higher.
# Anonymous users can't create pages
$wgGroupPermissions['*'            ]['createpage'] = false;
$wgGroupPermissions['user'         ]['createpage'] = false;
$wgGroupPermissions['autoconfirmed']['createpage'] = true;
$wgAutoConfirmAge = 86400 * 4; # Four days times 86400 seconds/day

require_once("$IP/extensions/BiblioPlus/BiblioPlus.php");
#wfLoadExtension('BiblioPlus'); # This is not working on mediawiki-1.27.1

require_once("$IP/extensions/Math/Math.php");
# TODO: texvc is a static binary. So, if you don't have ocaml on the host
# compile and secure copy it to the appropriate directory. Read the
# README in the directory Math/math/ for details.
## Set MathML as default rendering option
$wgDefaultUserOptions['math'] = 'mathml';
$wgMathFullRestbaseURL= 'https://api.formulasearchengine.com/';

wfLoadExtension('Cite');
wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions = true;

require_once "$IP/extensions/DeleteBatch/DeleteBatch.php";
#wfLoadExtension( 'DeleteBatch' ); # This is not working on mediawiki-1.27.1
$wgGroupPermissions['bureaucrat']['deletebatch'] = false;
$wgGroupPermissions['sysop']['deletebatch'] = true;

$wgUseAjax = true;
require_once "$IP/extensions/CategoryTree/CategoryTree.php";
#wfLoadExtension( 'CategoryTree' );  # This is not working on mediawiki-1.27.1
$wgCategoryTreeDefaultOptions['mode'] = 'pages';
$wgCategoryTreeSpecialPageOptions['mode'] = 'pages';
$wgCategoryTreeCategoryPageOptions['mode'] = 'pages';

###################################
# NEW ENTRIES ON 2016-09-6
###################################
/**
 * This is the list of preferred extensions for uploading files. Uploading files
 * with extensions not in this list will trigger a warning.
 *
 * @warning If you add any OpenOffice or Microsoft Office file formats here,
 * such as odt or doc, and untrusted users are allowed to upload files, then
 * your wiki will be vulnerable to cross-site request forgery (CSRF).
 */
$wgFileExtensions = [ 'png', 'gif', 'jpg', 'jpeg', 'webp', 'svg' ];

/**
 * Files with these extensions will never be allowed as uploads.
 * An array of file extensions to blacklist. You should append to this array
 * if you want to blacklist additional files.
 */
$wgFileBlacklist = [
	# HTML may contain cookie-stealing JavaScript and web bugs
	'html', 'htm', 'js', 'jsb', 'mhtml', 'mht', 'xhtml', 'xht',
	# PHP scripts may execute arbitrary code on the server
	'php', 'phtml', 'php3', 'php4', 'php5', 'phps',
	# Other types that may be interpreted by some servers
	'shtml', 'jhtml', 'pl', 'py', 'cgi',
	# May contain harmful executables for Windows victims
	'exe', 'scr', 'dll', 'msi', 'vbs', 'bat', 'com', 'pif', 'cmd', 'vxd', 'cpl' ];

/**
 * Files with these MIME types will never be allowed as uploads
 * if $wgVerifyMimeType is enabled.
 */
$wgMimeTypeBlacklist = [
	# HTML may contain cookie-stealing JavaScript and web bugs
	'text/html', 'text/javascript', 'text/x-javascript', 'application/x-shellscript',
	# PHP scripts may execute arbitrary code on the server
	'application/x-php', 'text/x-php',
	# Other types that may be interpreted by some servers
	'text/x-python', 'text/x-perl', 'text/x-bash', 'text/x-sh', 'text/x-csh',
	# Client-side hazards on Internet Explorer
	'text/scriptlet', 'application/x-msdownload',
	# Windows metafile, client-side vulnerability on some systems
	'application/x-msmetafile',
];

/**
 * Scalable Vector Graphics (SVG) may be uploaded as images.
 * Since SVG support is not yet standard in browsers, it is
 * necessary to rasterize SVGs to PNG as a fallback format.
 *
 * An external program is required to perform this conversion.
 * If set to an array, the first item is a PHP callable and any further items
 * are passed as parameters after $srcPath, $dstPath, $width, $height
 */
$wgSVGConverters = [
	'ImageMagick' =>
		'$path/convert -background "#ffffff00" -thumbnail $widthx$height\! $input PNG:$output',
	'sodipodi' => '$path/sodipodi -z -w $width -f $input -e $output',
	'inkscape' => '$path/inkscape -z -w $width -f $input -e $output',
	'batik' => 'java -Djava.awt.headless=true -jar $path/batik-rasterizer.jar -w $width -d '
		. '$output $input',
	'rsvg' => '$path/rsvg-convert -w $width -h $height -o $output $input',
	'imgserv' => '$path/imgserv-wrapper -i svg -o png -w$width $input $output',
	'ImagickExt' => [ 'SvgHandler::rasterizeImagickExt' ],
];

/**
 * Pick a converter defined in $wgSVGConverters
 */
$wgSVGConverter = 'ImageMagick';

/**
 * If not in the executable PATH, specify the SVG converter path.
 */
$wgSVGConverterPath = '/usr/bin';

# TODO: During manitenance uncomment the following variable.
#$wgReadOnly = 'Site Maintenance';
