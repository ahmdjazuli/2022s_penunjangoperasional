<?php require('head.php'); hel('Laporan'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rsiswa','Siswa') ?>
    <div class="card-body" style="padding-bottom: 107px;">
        <div class="form-group"><label>Status</label>
            <select name="status" class="form-control">
                <option value="">Semua</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rkelas','Kelas') ?>
    <div class="card-body" style="padding-bottom: 107px;">
        <div class="form-group"><label>Jurusan</label>
            <select name="jurusan" class="form-control">
                <option value="">Semua</option><?php
                $query = mysqli_query($kon, "SELECT * FROM kelas GROUP BY jurusan ORDER BY jurusan ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['jurusan'] ?>"><?= $j['jurusan'] ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rkegiatan','Kegiatan') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM kegiatan GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM kegiatan ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rartikel','Artikel') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM artikel GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM artikel ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rs_panggilan','Surat Pemanggilan Orang Tua') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT waktu FROM surat_panggilan GROUP BY MONTH(waktu) ORDER BY waktu ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['waktu']) ?>"><?= bulan($j['waktu']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(waktu) as tahun FROM surat_panggilan ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rs_pindah','Surat Pindah Sekolah') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tgl FROM surat_pindah GROUP BY MONTH(tgl) ORDER BY tgl ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tgl']) ?>"><?= bulan($j['tgl']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM surat_pindah ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('rs_thadir','Surat Izin Tidak Hadir (Guru)') ?>
    <div class="card-body">
        <div class="form-group"><label>Bulan</label>
            <select name="bulan" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT tgl FROM surat_thadir GROUP BY MONTH(tgl) ORDER BY tgl ASC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= b($j['tgl']) ?>"><?= bulan($j['tgl']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"><label>Tahun</label>
            <select name="tahun" class="form-control" required>
                <option value="">Pilih</option><?php
                $query = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM surat_thadir ORDER BY tahun DESC");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['tahun'] ?>"><?= tahun($j['tahun']) ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
<div class="col-lg-4 col-md-4 col-sm-12"><?php gaho('ralumni','Detail Alumnus') ?>
    <div class="card-body">
        <div class="form-group"><label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="">Semua</option><?php
                $query = mysqli_query($kon, "SELECT * FROM alumnus_detail GROUP BY kategori ORDER BY kategori ASC ");
                while ($j = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $j['kategori'] ?>"><?= $j['kategori']; ?></option>
                <?php } ?>
            </select>
        </div>
</div><?php apink(); ?></div>
</form></div>
            </div>
        </div>
    </section>
</div>
<?php require('foot.php') ?>