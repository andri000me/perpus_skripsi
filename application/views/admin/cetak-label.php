<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php foreach ($skripsi as $s) : ?>
        <div class="row">
            <div class="col-lg-3">
                <table>
                    <th>PERPUSTAKAAN</th>
                    <!-- <th>&nbsp; PERPUSTAKAAN</th> -->
                    <!-- <th>&nbsp; PERPUSTAKAAN</!-->
                    <tr>
                        <td><b>STIK-IJ</td>
                        <!-- <td><b>&nbsp; STIK-IJ</td> -->
                        <!-- <td><b>&nbsp; STIK-IJ</td> -->
                    </tr>
                    <tr>
                        <td><b><?= $s['nama']; ?></b></td>
                        <!-- <td><b>&nbsp; 002</b></td> -->
                        <!-- <td><b>&nbsp; 002</b></! -->
                    </tr>
                    <tr>
                        <td><b>DYM</b></td>
                        <!-- <td><b>&nbsp; DYM</b></td> -->
                        <!-- <b><b>&nbsp; DYM</b></td> -->
                    </tr>
                    <tr>
                        <td><b>J</b></td>
                        <!-- <td><b>&nbsp; J</b></td> -->
                        <!-- <td><b>&nbsp; J</b></td> -->
                    </tr>
                </table>
            </div>
            <div class="col-lg-3">
                <table>
                    <th>PERPUSTAKAAN</th>
                    <!-- <th>&nbsp; PERPUSTAKAAN</th> -->
                    <!-- <th>&nbsp; PERPUSTAKAAN</!-->
                    <tr>
                        <td><b>STIK-IJ</td>
                        <!-- <td><b>&nbsp; STIK-IJ</td> -->
                        <!-- <td><b>&nbsp; STIK-IJ</td> -->
                    </tr>
                    <tr>
                        <td><b><?= $s['nama']; ?></b></td>
                        <!-- <td><b>&nbsp; 002</b></td> -->
                        <!-- <td><b>&nbsp; 002</b></! -->
                    </tr>
                    <tr>
                        <td><b>DYM</b></td>
                        <!-- <td><b>&nbsp; DYM</b></td> -->
                        <!-- <b><b>&nbsp; DYM</b></td> -->
                    </tr>
                    <tr>
                        <td><b>J</b></td>
                        <!-- <td><b>&nbsp; J</b></td> -->
                        <!-- <td><b>&nbsp; J</b></td> -->
                    </tr>
                </table>
            </div>
        </div>

        <!-- <table class="basic" cellspacing="0" cellpadding="1" width="100%" border="0" style="font-size:14px;">
            <thead align="center">
                <tr>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                    <th scope="col">PERPUSTAKAAN</th>
                </tr>
            </thead>
            <thead align="center">
                <tr>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                    <th scope="col">STIK-IJ</th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <th scope="row">001</th>
                    <th scope="row">002</th>
                    <th scope="row">003</th>
                    <th scope="row">004</th>
                    <th scope="row">005</th>
                    <th scope="row">006</th>
                    <th scope="row">006</th>
                </tr>
                <tr>
                    <th scope="row">SAP</th>
                    <th scope="row">DYM</th>
                    <th scope="row">AND</th>
                    <th scope="row">BUR</th>
                    <th scope="row">SIR</th>
                    <th scope="row">HER</th>
                    <th scope="row">HER</th>
                </tr>
                <tr>
                    <th scope="row">A</th>
                    <th scope="row">C</th>
                    <th scope="row">I</th>
                    <th scope="row">K</th>
                    <th scope="row">L</th>
                    <th scope="row">P</th>
                    <th scope="row">P</th>
                </tr>
            </tbody>
        </table> -->

    <?php endforeach; ?>
    <!-- <tbody>

            <?php foreach ($skripsi as $s) : ?>
                <div class="table-responsive-lg">
                    <table class="table" border="1">
                        <tr>PERPUSTAKAAN</tr>
                        <tr>STIK-IJ</tr>
                    </table>
                </div>
            <?php endforeach; ?>
        </tbody> -->
    <!-- </table> -->
    <br>

</body>

</html>


<!-- fungsi untuk print(cetak) den baganti icon -->
<script>
    window.print();

    function change_favicon(img) {
        var favicon = document.querySelector('link[rel="shortcut icon"]');

        if (!favicon) {
            favicon = document.createElement('link');
            favicon.setAttribute('rel', 'shortcut icon');
            var head = document.querySelector('head');
            head.appendChild(favicon);
        }


        favicon.setAttribute('type', 'image/png');
        favicon.setAttribute('href', img);
    }

    change_favicon('<?= base_url('assets/img/print.png'); ?>');
</script>