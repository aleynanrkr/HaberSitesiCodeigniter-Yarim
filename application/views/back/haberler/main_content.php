<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Haber Listesi</h3>
                    <p>
                        <a href="<?php echo base_url('yonetim/haberekle') ?>" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i> Ekle
                        </a>
                    </p>
                </div>
                <?php echo $this->session->flashdata('durum'); ?>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sıra No</th>
                                <th>Haber Başlığı</th>
                                <th>Haber Kategori</th>
                                <th>Manşet Durum</th>
                                <th>Yorum Durumu</th>
                                <th>Haberin Durumu</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sayi = 1; 
                            foreach ($bilgi as $row) { 
                            ?>
                            <tr>
                                <td><?php echo $sayi++; ?></td>
                                <td><?php echo word_limiter($row['title'], 5); ?></td>
                                <td><?php echo $row['kategori']; ?></td>
                                <td>    <?php if ($row['sondakika'] == 1) { ?>
        <button type="button" class="btn btn-primary">Normal Haber</button>
    <?php } else { ?>
        <button type="button" class="btn btn-warning">Son Dakika</button>
    <?php } ?></td>
                                <td>
    <?php if ($row['yorum'] == 1) { ?>
        <button type="button" class="btn btn-primary">Yorum Açık</button>
    <?php } else { ?>
        <button type="button" class="btn btn-warning">Yorum Kapalı</button>
    <?php } ?>
</td>

                                <td>
                                    <input class="toggle_check" data-on="Aktif" data-onstyle="success" data-off="Pasif" data-offstyle="danger" type="checkbox" dataID="<?php echo $row['id'];?>" dataURL="<?php echo base_url('yonetim/haberset/');?>" <?php echo ($row['durum'] == 1) ? "checked" : ""; ?>>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('yonetim/haberduzenle/'.$row['id'].'')?>"><button type="button" class="btn btn-info">Düzenle</button></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('yonetim/habersil/'.$row['id'].'/id/haberler')?>" onclick="return confirm('Silmek istediğinizden emin misiniz hocam?')">
                                        <button type="button" class="btn btn-danger">Sil</button>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
