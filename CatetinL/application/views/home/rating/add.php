<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rating</title>
    <!-- CSS untuk styling form -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS untuk jQuery Raty -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Berikan Rating</h5>
                        <!-- Form untuk mengisi rating -->
                        <form action="<?php echo base_url('rating/add_rating'); ?>" method="post">
                            <div class="form-group">
                                <label for="star-rating">Rating :</label>
                                <div id="star-rating"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="komentar">Komentar:</label>
                                <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Raty -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#star-rating').raty({
                // Konfigurasi plugin Raty
                scoreName: 'nilai_rating', // Nama field yang akan dikirimkan ke server
                number: 5, // Jumlah bintang
                starType: 'i', // Jenis ikon bintang (font-awesome)
                hints: ['Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Sangat Bagus'], // Keterangan untuk setiap bintang
                click: function(score, evt) {
                    // Fungsi ini akan dijalankan ketika pengguna mengklik bintang
                    console.log('Anda memberi rating: ' + score);
                }
            });
        });
    </script>
</body>
</html>
