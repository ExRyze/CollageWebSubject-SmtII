<?php

define("SALT", "QA1sx@Ed3fV$357");

// Database
define("HOST", "localhost"); // host
define("USER", "root"); // username
define("PASS", ""); // password
define("NAME", "web_project"); // database name

// Default Controller
define("DEF_CTRL", "home");
define("DEF_MTHD", "index");
define("DEF_PRMS", []);

// Urls
define("BURL", "/Collage/Semester II"); // base url
define("COMP", "../app/views/components"); // components url
define("OSS", "../public"); // store url

// Components
define("TEST", "../app/views/temp/"); // head
// C - Home
define("HHEAD", COMP."/home/head.php"); // head
define("HBAR", COMP."/home/bar.php"); // topbar
define("HCOPY", COMP."/home/copy.php"); // copyright
define("HFOOT", COMP."/home/foot.php"); // script
// C - Dashboard
define("DHEAD", COMP."/dashboard/head.php"); // head
define("DBAR", COMP."/dashboard/bar.php"); // topbar
define("DNAV", COMP."/dashboard/nav.php"); // navbar
define("DCOPY", COMP."/dashboard/copy.php"); // copyright
define("DFOOT", COMP."/dashboard/foot.php"); // script

// Access public
define("CSS", BURL."/css"); // css
define("IMG", BURL."/img"); // img
define("JS", BURL."/js"); // js
define("LIB", BURL."/libs"); // vendor

// Store public
define("OSSIMG", OSS."/img"); // img