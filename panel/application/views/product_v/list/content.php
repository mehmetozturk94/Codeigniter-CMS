<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <a href="<?php echo base_url("products/add"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i
                    class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)){ ?>
            <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="#">tıklayınız</a></p>
            </div>
            <?php  }else{ ?>
            <table class="table table-hover table-striped">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>url</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("products/rankSetter"); ?>">
                    <?php foreach($items as $item) { ?>
                    <tr id="ord-<?php echo $item->id ?>">
                        <td><i class="fa fa-reorder"></i></td>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->url ?></td>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->description ?></td>
                        <td>
                            <input data-url="<?php echo base_url("products/isActiveSetter/$item->id"); ?>"
                                class="isActive" id="switch-2-2" type="checkbox" data-switchery data-color="#10c469"
                                <?php echo ($item->isActive) ? "checked" : "" ?> />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("products/delete/$item->id") ?>"
                                href="<?php echo base_url("products/delete/$item->id") ?>"
                                class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil</button>
                            <a href="<?php echo base_url("products/update/$item->id") ?>"
                                class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i>
                                Düzenle</a>
                            <a href="<?php echo base_url("products/image_form/$item->id") ?>"
                                class="btn btn-sm btn-dark btn-outline"><i class="fa fa-image"></i>
                                Resimler</a>
                        </td>
                    </tr>
                    <?php } ?>



                </tbody>

            </table>
            <?php } ?>




        </div><!-- .widget -->
    </div><!-- END column -->
</div>