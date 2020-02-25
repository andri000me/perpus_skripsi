<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<title>Cetak Label</title>

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div class="row">
        <?php foreach ($skripsi as $s) : ?>
            <div class="col-lg-2 text-center" id="kotak" style="border: thin solid black">
                <tr><b>PERPUSTAKAAN</b></tr><br>
                <tr><b>STIK-IJ</b></tr><br>
                <tr><b><?= $s['id']; ?></b></tr></br>
                <tr><b><?= $s['nama']; ?></b></tr></br>
                <tr><b><?= $s['judul']; ?></b></tr></br>
            </div>
        <?php endforeach; ?>
    </div>

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