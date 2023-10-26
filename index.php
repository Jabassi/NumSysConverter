<?php
// Output text
$sel_from_des = "";
$sel_from_bin = "";
$sel_from_oct = "";
$sel_from_hex = "";
$userInput = "";
$numSysFrom = [];
$numSysTo = "";
$base_from = 2;
$base_to = 2;
$givenSystem = "";
$convertedSystem = "";

$errors = [];

error_reporting(0);

?>

    <!doctype html>
    <html lang="fi">

    <head>
        <title>Lukujärjestelmämuuntaja</title>
        <meta charset="UTF-8">
        <meta name="description" content="HTML-sivupohja v0.3">
        <meta name="author" content="Jaakko Leinonen, Lapin AMK">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Changa&family=Tilt+Neon&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <div class="header">
        <h1>Lukujärjestelmämuuntaja</h1>
    </div>
    <div class="main-content">

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                        Käyttöohje
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">  <!--class: show deleted-->
                <div class="accordion-body">
                    <p>Näpyttele haluamasi luku numerokenttään, valitse lukujärjestelmä josta haluat luvun käännettävän klikkaamalla valintaa.
                    Näpäytä lopuksi "Muunna"-nappia. Vastaukseksi saat luvun neljässä eri lukujärjestelmässä esitettynä.</p> <br>
                        <hr>
                    <p>Sovellus ei ole vielä täysin valmis, mutta toimii jo pääasiallisesti.</p>
                    </div>
                </div>
            </div>
        </div>


            <div class="selector-wrapper">

            <!------ FORM BEGINS ------>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="selector-content container-fluid" method="post">

                    <!--<div class="selector-content row">-->
                <div class="row selector-content">
                    <!-- number input -->
                    <div class="input-number-area col-md-4">
                        <div class="input-tip tip">
                            <p>määritä luku</p>
                        </div>
                        <div class="input-field">
                            <input type="text" id="userInputNumber" name="txtAmount" size="14"/>
                            <label for="userInputNumber"></label>
                        </div>

                    </div>

                    <!-- from-system select -->
                    <div class="from-system-area col-md-8">
                        <div class="select-tip tip">
                            <p> valitse lähtöarvon järjestelmä</p>
                        </div>
                        <div class="btn-group btn-group-primary col-9" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="radio_from" id="btnradio1" value="des" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradio1">desimaali</label>

                            <input type="radio" class="btn-check" name="radio_from" id="btnradio2" value="bin" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradio2">binääri</label>

                            <input type="radio" class="btn-check" name="radio_from" id="btnradio3" value="oct" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradio3">oktaali</label>

                            <input type="radio" class="btn-check" name="radio_from" id="btnradio4" value="hex" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradio4">heksadesimaali</label>
                        </div>

                    </div>
                </div>

                <!-- buttons -->
                <div class="row">
                    <div class="button-area col-12">
                        <button type="submit" class="btn btn-primary btn-con ch-btn" name="submit">Muunna
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                        </button>
                        <button href="index.php" class="btn btn-outline-light ch-btn" name="btnReset">Tyhjennä valinnat</button>

                    </div>
                </div>

                </form>
            <!--</div>-->
            <!-- form ends -->

        </div>





            <?php
            function convert($userInput, int $base_from, int $base_to) {
                return base_convert(htmlspecialchars($userInput), $base_from, $base_to);
            }
            ?>

            <?php
            $radio_from = [""];
                // Check if form was submitted
                /*if(isset($_POST['radio_from']))*/
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get post values
                $userInput   = $_POST['txtAmount'];
                $numSysFrom  = $_POST['radio_from'];


                // --- error validations ---
                if ($userInput == "") {
                    $errors[] = "Et ole määrittänyt lukua!";
                }
                if (!$numSysFrom) {
                    $errors[] = "Alkuperäinen lukujärjestelmä vaaditaan tiedoksi!";
                }
                if (intval($userInput) === FALSE) {
                    $errors[] = "Anna luku numeroina!";
                }
                ?>

                <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger">
                        <div><?php echo $error ?></div>
                    </div>
                <?php }

                }?>




                <?php

                if (empty($errors)) {

                    switch ($numSysFrom) {
                        case "des":
                            $base_from = 10;
                            $givenSystem = "desimaali";
                            break;
                        case "bin":
                            $base_from = 2;
                            $givenSystem = "binääri";
                            break;
                        case "oct":
                            $base_from = 8;
                            $givenSystem = "oktaali";
                            break;
                        case "hex":
                            $base_from = 16;
                            $givenSystem = "heksadesimaali";
                            break;
                    }

                ?>
            <div class="result-area">
                <div class="result-box row">

                <div class="converted-box col-md-3">
                    <div class="given-header converted" id="bg1">
                        <p>desimaali</p>
                        <p class="base">[10-kantainen]</p>
                    </div>
                    <div class="given-number">
                        <?php echo convert($userInput, $base_from, 10); ?>
                    </div>
                </div>
                <div class="converted-box col-md-3">
                    <div class="given-header converted" id="bg2">
                        <p>binääri</p>
                        <p class="base">[2-kantainen]</p>
                    </div>
                    <div class="given-number">
                        <?php echo convert($userInput, $base_from, 2); ?>
                    </div>
                </div>
                <div class="converted-box col-md-3">
                    <div class="given-header converted" id="bg3">
                        <p>oktaali</p>
                        <p class="base">[8-kantainen]</p>
                    </div>
                    <div class="given-number">
                        <?php echo convert($userInput, $base_from, 8); ?>
                    </div>
                </div>
                <div class="converted-box col-md-3">
                    <div class="given-header converted" id="bg4">
                        <p>heksadesimaali</p>
                        <p class="base">[16-kantainen]</p>
                    </div>
                    <div class="given-number">
                        <?php echo convert($userInput, $base_from, 16); ?>
                    </div>
                </div>
            </div>
            </div>

        <?php } ?>

            <!------ ADDITIONAL INFO AREA BEGINS ------>

            <div class="additional-info">
                <p class="d-inline-flex gap-1">
                    <button class="btn btn-primary logic-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfo1" aria-expanded="false" aria-controls="collapseInfo1">
                        Toimintalogiikkaa kiinnostaa
                    </button>
                    <a href="https://github.com/Jabassi/NumSysConverter" target="blank">
                        <button class="btn btn-primary logic-button">
                            Tekee mieli hämmästellä lähdekoodia GitHubissa >>
                        </button>
                    </a>
                </p>
                <div class="collapse" id="collapseInfo1">
                    <div class="info-image">
                        <img src="images/NumSysConverter_diagram.png" alt="diagram">
                    </div>
                </div>
            </div>

            <!------ ADDITIONAL INFO AREA ENDS ------>





        </div>  <!-- result-area ends -->











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>

