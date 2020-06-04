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
                <th>Ket. Ujian</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Ket. Ujian</th>
                <th>Jurusan</th>
            </tr>
        </tfoot> -->
        <tbody>

            <?php
                include "conf/koneksi.php";

                /* versi PDO */
                $lulus = 'Lulus';
                
                $sql = $conn->prepare("SELECT * FROM psb, ujian_masuk, kompetensi
                                        WHERE psb.no_reg = ujian_masuk.no_reg
                                        AND psb.id_kompetensi = kompetensi.id_kompetensi
                                        -- AND ujian_masuk.ket_ujian = :ket
                                        ORDER BY ujian_masuk.no_ujian DESC");
                // $sql->bindParam(":ket", $lulus);
                $sql->execute();
                $no = 1;
                while ($r = $sql->fetch()){
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['nisn']; ?></td>
                <td><?php echo $r['nm_siswa']; ?></td>
                <td><?php echo $r['asal_sekolah']; ?></td>
                <td><?php echo $r['ket_ujian']; ?></td>
                <td><?php echo $r['bid_kompetensi']; ?></td>
            </tr>

            <?php $no++; } ?>
           
        </tbody>
    </table>
  </div>