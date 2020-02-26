<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<title>Cetak Label Skripsi</title>

<body>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <div class="well">
        <!-- <img src="about:blank" id="result-image"> -->
        <!-- <a href="javascript:;" onclick="LatestPost();" class="btn btn-info">Take Latest Post Box</a> -->
        <div class="row">
            <?php foreach ($skripsi as $s) : ?>
                <div class="col-lg-2 text-center" style="border: thin solid black" id="konten">
                    <tr><b>PERPUSTAKAAN</b></tr><br>
                    <tr><b>STIK-IJ</b></tr><br>
                    <tr><b><?= $s['id']; ?></b></tr></br>
                    <tr><b><?= $s['nama']; ?></b></tr></br>
                    <tr><b><?= $s['judul']; ?></b></tr></br>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

</body>

</html>

<script>
    function LatestPost() {
        html2canvas(document.querySelector(".well"), {
            onrendered: function(canvas) {
                var img = canvas.toDataURL();
                $("#well").attr('src', img).show();
                canvas.toBlob(function(blob) {
                    saveAs(blob, "LatestPost.png");
                });
            },
            allowTaint: true,
            imageTimeout: 0,
            useCORS: true
        });
        return false;
    }
</script>