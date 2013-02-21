<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>stream.cx - Next Generation Streaming | Main</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="robots" content="noindex,nofollow">
<meta name="description" content="stream.cx is an easy to use open-source web-administration tool to manage multiple SHOUTcast Server at the same time.">
<link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/bootstrap-responsive.css" rel="stylesheet">
<link href="./css/bootstrap-overrides.css" rel="stylesheet">
<link href="./css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href="./css/slate.css" rel="stylesheet">
<link href="./css/slate-responsive.css" rel="stylesheet">
<link href="./css/pages/dashboard.css" rel="stylesheet">
<script src="./js/jquery-1.7.2.min.js"></script>
<script src="./js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="./js/jquery.ui.touch-punch.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/Slate.js"></script>
<script src="./js/plugins/excanvas/excanvas.min.js"></script>
<script src="./js/plugins/flot/jquery.flot.js"></script>
<script src="./js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="./js/plugins/flot/jquery.flot.pie.js"></script>
<script src="./js/plugins/flot/jquery.flot.resize.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

<div id="header">
  <div class="container">
    <h1><a href="./">stream.cx - Next Generation Streaming</a></h1>
    <div id="info"> <a href="javascript:;" id="info-trigger"> <i class="icon-cog"></i> </a>
      <div id="info-menu">
        <div class="info-details">
          <h4>Willkommen zurück, Kunde0248</h4>
          <p> Ihr aktuelles <a href="javascript:;">Kontoguthaben</a>: <i>17,41€</i> <br>
            Sie haben <a href="javascript:;">5 ungelesene</a> Benachrichtigungen </p>
        </div>
      </div>
    </div>
  </div> 
</div>

<div id="nav">
  <div class="container"> <a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <i class="icon-reorder"></i> </a>
    <div class="nav-collapse">
      <ul class="nav">
        <li class="nav-icon"> <a href="#"> <i class="icon-th"></i> Übersicht </a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-hdd"></i> Radioserver <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#">Steuerung</a></li>
            <li><a href="#">Einstellungen</a></li>
            <li class="dropdown"> <a href="#"> Auto-DJ <i class="icon-chevron-right sub-menu-caret"></i> </a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="#">Playlisten</a></li>
                <li><a href="#">Medien-Upload</a></li>
                <li><a href="#">Einstellungen</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#"> Werkzeuge <i class="icon-chevron-right sub-menu-caret"></i> </a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="#">Statistiken</a></li>
                <li><a href="#">Protokolle</a></li>
                <li><a href="#">HTML Tools</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-money"></i> Guthaben <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#">Ein -/ Auszahlung</a></li>
            <li><a href="#">Rechnungen</a></li>
            <li><a href="#">Einstellungen</a></li>
          </ul>
        </li>
        <li class="nav-icon"> <a href="#"> <i class="icon-user"></i> Konto </a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-money"></i> Reseller <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#">Überblick</a></li>
            <li><a href="#">Rechnungen</a></li>
            <li><a href="#">Interface</a></li>
            <li class="dropdown"> <a href="#"> Kunden <i class="icon-chevron-right sub-menu-caret"></i> </a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="#">Verwaltung</a></li>
                <li><a href="#">Produkt-Zuweisung</a></li>
              </ul>
            </li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-question-sign"></i> Support <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="./login.html">Dokumentation</a></li>
            <li><a href="./signup.html">Häufig gestellte Fragen</a></li>
            <li><a href="./error.html">Kunden-Support</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav pull-right">
        <li class="nav-icon"> <a href="#"> <i class="icon-off"></i> <span>Abmelden</span> </a> </li>
      </ul>
    </div>    
  </div>
</div>

<div id="content">
    {$content}
</div>

<div id="footer">
  <div class="container"> &copy; 2013. stream.cx - Next Generation Streaming. Alle Rechte vorbehalten. Alle Preise inkl. gesetzlicher MwSt. - <a href="#">Impressum</a> | <a href="#">Datenschutz</a> | <a href="#">AGB</a> | <a href="#">Radio Policy</a> </div>
</div>

</body>
</html>
