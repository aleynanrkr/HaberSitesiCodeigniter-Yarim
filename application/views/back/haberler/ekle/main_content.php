<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Haber Ekleme Formu</h3>
        </div>
        <form action="<?php echo base_url('yonetim/haberekleme') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Başlık</label>
                    <div class="col-sm-6">
                        <input type="text" value="" name="title" class="form-control" placeholder="Haber Başlık">
                    </div>
                </div>                           
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Kategori</label>
                    <div class="col-sm-3">
                    <select name="katID" class="katID">
                        <?php $bilgi = kategoriliste(); foreach ($bilgi as $bilgi) {    ?>
                            <option value="<?php echo $bilgi ['id'];?>"> <?php echo $bilgi['title']; ?></option>
                       <?php  }?>
                       </select> 
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Resim</label>
                    <div class="col-sm-3">
                        <input type="file" name="resim" class="form-control">
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Mevcut Resim</label>
                    <div class="col-sm-3">
                        <img src="" class="profile-user-image">
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Tarih</label>
                    <div class="col-sm-3">
                        <input type="date" name="tarih" class="form-control">
                    </div>
                </div>                       
                </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Metni</label>
                    <div class="col-sm-9">
                        <textarea name="icerik" id="editor1" cols="80" rows="6"></textarea>
                    </div>
                </div>                           
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Yorum İzin</label>
                    <div class="col-sm-3">
                        <select name="yorum" class="form-control">
                            <option value="1">Yorum Yapılsın</option>
                            <option value="0">Yorum Yapılmasın</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Manşet İzin</label>
                    <div class="col-sm-3">
                        <select name="sondakika" class="form-control">
                            <option value="1">Normal Haber</option>
                            <option value="0">Manşet Haber</option>
                        </select>
                    </div>
                </div>  
            </div>
            <div class="box-footer">
                <a href="<?php echo base_url('yonetim/haberler');?>" class="btn btn-default">Geri Dön</a>
                <button type="submit" class="btn btn-primary pull-right">Ekle</button>
            </div>
        </form>
    </div>
</section>
