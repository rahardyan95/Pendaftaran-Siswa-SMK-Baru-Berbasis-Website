<!-- <style>
tfoot {
     display: table-header-group;
}
tfoot th input{
    width: 100px;
}
</style> -->

<div class="table-responsive">
  <table id="daftarSiswa" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Verifikasi Dok.</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Verifikasi Dok.</th>
            </tr>
        </tfoot>
        <tbody>

            <?php
                include "conf/koneksi.php";

                /* versi PDO */
                $done = 'Sudah';
                
                $sql = $conn->prepare("SELECT * FROM psb 
                            WHERE status_verifikasi = :status_ver
                            ORDER BY no_reg DESC");
                $sql->bindParam(":status_ver", $done);
                $sql->execute();
                $no = 1;
                while ($r = $sql->fetch()){
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['nisn']; ?></td>
                <td><?php echo $r['nm_siswa']; ?></td>
                <td><?php echo $r['asal_sekolah']; ?></td>
                <td><?php echo $r['status_verifikasi']; ?></td>
            </tr>

            <?php $no++; } ?>
           
        </tbody>
    </table>
  </div>