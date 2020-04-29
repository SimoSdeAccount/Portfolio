<?php
include("GlobalVars.php");
session_start();
StartEventValidering(); 
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Styles/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Styles/PortfolioStyles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12">
             <?php
             Menu();
             ?>
            </div>
        </div>
        <div class="row">
            <div id="LogoContent" class="col-sm-12">
                Logo
            </div>
        </div>
        <div class="row">
            <div id="MainContainer" class="col-sm-9">
                <div id="Main" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                            <?php
                            MainHeader();
                            ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div class="col-sm-12">
                            <?php
                            MainContent();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="RightContainer" class="col-sm-3">
                <div id="TopRight" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                            <?php
                            TopRightHeader();
                            ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div id="TopRightContent" class="col-sm-12">
                            <?php
                            TopRightContent();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="BottomRight" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                            <?php
                            BottomRightHeader();
                            ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div class="col-sm-12">
                            <?php
                            BottomRightContent();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="FooterContainer" class="col-sm-12">
                <nav id="Footer" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
                    Copryright &copy; portfolio
                </nav>
            </div>
        </div>
    </body>
</html>
<?php
function StartEventValidering() //problemet er at overføre fra starteventvalidering ned i maincontent
{ 
    include("Switches/StartEventSwitch.php");
}
function Menu() 
{
    include("Switches/MenuSwitch.php");
}
function MainHeader() 
{
    $GLOBALS['Section'] = "Header";
    include("Switches/MainContentSwitch.php");
}
function MainContent() 
{
    $GLOBALS['Section'] = "Content";
    include("Switches/MainContentSwitch.php");
}
function TopRightHeader() 
{
    $GLOBALS['Section'] = "Header";
    include("Switches/TopRightSwitch.php");
}
function TopRightContent() 
{
    $GLOBALS['Section'] = "Content";
    include("Switches/TopRightSwitch.php");
}
function BottomRightHeader() 
{
    $GLOBALS['Section'] = "Header";
    include("Switches/BottomRightSwitch.php");
}
function BottomRightContent() 
{
    $GLOBALS['Section'] = "Content";
    include("Switches/BottomRightSwitch.php");
}
?>