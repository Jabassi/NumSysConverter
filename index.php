<?php
// Output text
$sel_from_des = "";
$sel_from_bin = "";
$sel_from_oct = "";
$sel_from_hex = "";
$userInput = 0;
$numSysFrom = "";
$numSysTo = "";
$base_from = 2;
$base_to = 2;
$givenSystem = "";
$convertedSystem = "";

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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <div class="header">
        <h1>Lukujärjestelmämuuntaja</h1>
    </div>
    <div class="container">

        <div class="selector-wrapper row">

            <!-- form starts -->
            <div class="selector-content col-12 align-self-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- number input -->
                    <div class="input-number-area row">
                        <div class="input-tip col-3">
                            <p>anna luku:</p>
                        </div>
                        <div class="input-field col-9">
                            <input type="text" id="userInputNumber" name="txtAmount" size="14"/>
                            <label for="userInputNumber"></label>
                        </div>

                    </div>
                    <hr>
                    <!-- from-system select -->
                    <div class="from-system row">
                        <div class="select-tip col-3">
                            <p>lähtöarvon järjestelmä</p>
                        </div>
                        <div class="btn-group col-9" role="group" aria-label="Basic radio toggle button group">
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
                    <hr>
                    <!-- to-system select -->
                    <div class="to-system row">
                        <div class="select-tip col-3">
                            <p>lopullinen järjestelmä</p>
                        </div>
                        <div class="btn-group col-9" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="radio_to" id="btnradioB1" value="des" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradioB1">desimaali</label>

                            <input type="radio" class="btn-check" name="radio_to" id="btnradioB2" value="bin" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradioB2">binääri</label>

                            <input type="radio" class="btn-check" name="radio_to" id="btnradioB3" value="oct" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradioB3">oktaali</label>

                            <input type="radio" class="btn-check" name="radio_to" id="btnradioB4" value="hex" autocomplete="off"/>
                            <label class="btn btn-outline-primary ns-btn" for="btnradioB4">heksadesimaali</label>
                        </div>

                    </div>
                    <hr>

                    <div class="btnWrapper">
                        <button href="index.php" class="btn" name="btnReset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-con" name="btnConvert">Käännä</button>
                    </div>

                </form>
            </div>
            <!-- form ends -->

        </div>



        <div class="result-area">
            <?php



            function convert(int $userInput, int $base_from, int $base_to) {
                return base_convert($userInput, $base_from, $base_to);
            }


            ?>

            <p>
                <?php
                // Check if form was submitted
                if(isset($_POST['radio_from'])) {
                // Get post values
                $userInput   = $_POST['txtAmount'];
                $numSysFrom  = $_POST['radio_from'];
                $numSysTo    = $_POST['radio_to'];

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

                switch ($numSysTo) {
                    case "des":
                        $base_to = 10;
                        $convertedSystem = "desimaali";
                        break;
                    case "bin":
                        $base_to = 2;
                        $convertedSystem = "binääri";
                        break;
                    case "oct":
                        $base_to = 8;
                        $convertedSystem = "oktaali";
                        break;
                    case "hex":
                        $base_to = 16;
                        $convertedSystem = "heksadesimaali";
                        break;
                }

                ?>
            <div class="result-box row">
                <div class="given-box col-5">
                    <div class="given-header">
                        <p>annettu luku</p>
                    </div>
                    <div class="given-number">
                        <?php echo $userInput; ?>
                    </div>
                    <div class="given-system">
                        <?php echo $givenSystem; ?>
                    </div>
                </div>
                <div class="converted-box col-5">
                    <div class="given-header converted">
                        <p>käännetty luku</p>
                    </div>
                    <div class="given-number">
                        <?php echo convert($userInput, $base_from, $base_to); ?>
                    </div>
                    <div class="given-system">
                        <?php echo $convertedSystem; ?>
                    </div>
                </div>

            </div>




        <?php
        } else {
            echo "Anna kaikki tiedot!";
        }
        ?>
            </p>




        </div>  <!-- result-area ends -->
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>


<?php

?>