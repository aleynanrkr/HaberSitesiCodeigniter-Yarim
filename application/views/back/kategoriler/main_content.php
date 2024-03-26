<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kategoriler Listesi</h3>
                    <p>
                        <a href="<?php echo base_url('yonetim/kategoriekle') ?>" class="btn btn-primary pull-right">
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
                                <th>Kategori Başlığı</th>
                                <th>Kategori sef</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sayi = 1; foreach ($bilgi as $row) { ?>
                                <tr>
                                    <td><?php echo $sayi++; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['sef']; ?></td>
                                    <td>
                                    <a href="#" onclick="return confirmDelete(<?php echo $row['id']; ?>);" class="btn btn-danger"> Sil </a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete(id) {
        var confirmDelete = confirm("Bu öğeyi silmek istediğinizden emin misiniz Hocam?");
        if (confirmDelete) {
            window.location.href = "<?php echo base_url('yonetim/kategorisil/'); ?>" + id + "/id/kategoriler";
        } else {
            return false;
        }
    }
</script>

</section>
