<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Haber Düzenleme Formu</h3>
        </div>
        <form action="<?php echo base_url('yonetim/haberduzenleme') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Başlık</label>
                    <div class="col-sm-6">
                    <input type="hidden" name="id" value="<?php echo $bilgi['id']; ?>">
                    <input type="hidden" name="durum" value="<?php echo $bilgi['durum']; ?>">
                   
                    <input type="text" value="<?php echo $bilgi['title']; ?>" name="title" class="form-control" placeholder="Haber Başlık">
                    </div>
                </div>                           
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Kategori</label>
                    <div class="col-sm-3">
                    <select name="katID" class="katID">
                        <?php $bilgim= kategoriliste(); foreach ($bilgim as $bilgim) { if($bilgim['id']== $bilgi['katID']){ ?>
                            <option selected value="<?php echo $bilgim['id'];?>"> <?php echo $bilgim['title']; ?></option>
                            <?php  } else{  ?>  
                            <option value="<?php echo $bilgim['id'];?>"> <?php echo $bilgim['title']; ?></option> 
                            <?php  }}?>
                       </select> 
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Resim</label>
                    <div class="col-sm-3">
                        <input type="file" name="resim" class="form-control">
                    </div>
                 
                    
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Tarih</label>
                    <div class="col-sm-3">
                        <input type="date"  value="<?php echo $bilgi['tarih']; ?>" name="tarih" class="form-control">
                    </div>
                </div>                       
                </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Metni</label>
                    <div class="col-sm-9">
                        <textarea name="icerik" id="editor1" cols="80" rows="6">value="<?php echo $bilgi['icerik']; ?>"</textarea>
                    </div>
                </div>                           
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Yorum İzin</label>
                    <div class="col-sm-3">
                        <select name="yorum" class="form-control">
<?php 
if ($bilgi['yorum']==1) {
?>

                            <option selected value="1">Yorum Yapılsın</option>
                            <option value="0">Yorum Yapılmasın</option>
                            <?php 
}else{
?>
  <option  value="1">Yorum Yapılsın</option>
                            <option selected value="0">Yorum Yapılmasın</option>
    <?php 
}
?>

                        </select>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Haber Manşet İzin</label>
                    <div class="col-sm-3">
                        <select name="sondakika" class="form-control">
                        <?php 
if ($bilgi['sondakika']==1) {
?>

                            <option selected value="1">Normal Haber</option>
                            <option value="0">Son Dakika</option>
                            <?php 
}else{
?>
  <option  value="1">Normal Haber</option>
                            <option selected value="0">Son Dakika</option>
    <?php 
}
?> </select>
                    </div>
                </div>  
            </div>
            <div class="box-footer">
                <a href="<?php echo base_url('yonetim/haberler');?>" class="btn btn-default">Geri Dön</a>
                <button type="submit" class="btn btn-primary pull-right">Güncelle</button>
            </div>
        </form>
    </div>
</section>
