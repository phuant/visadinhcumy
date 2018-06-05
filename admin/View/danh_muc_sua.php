<?php echo $this->thongbao?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">SỬA DANH MỤC !</h4>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Input Types</h4>
            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form method='post' class="form-horizontal" role="form">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên danh mục</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name='Ten' id='Ten' value="<?php echo @$this->data->Ten?>"  onchange="stralias('Ten','Alias')" >
                                </div>
                                <div class='col-3'>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"  name='TrangThai' <?php if($this->data->TrangThai==1) echo 'checked'?>>
                                        <label class="custom-control-label" for="customCheck1">Hiện/Ẩn</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Chọn danh mục</label>
                                <div class="col-7">
                                <select class=" custom-select mt-3" name='IdCha'>
                                        
                                        <?php  
                                            function dequy($data,$ma, $parent=0, $text=''){
                                                foreach ($data as $key => $value) {
                                                    if($value->IdCha==$parent){
                                                        $val= $value->Ma==$ma? "selected": '';
                                                        echo "<option value='".$value->Ma."' ".$val." >".$text.$value->Ten."</option>";
                                                        $id = $value->Ma;
                                                        unset($data[$key]);
                                                        dequy($data,$ma,$id,$text.'-----| ');
                                                    }
                                                }
                                            }
                                            $maa= @$this->data->IdCha;
                                            dequy($this->model->get_danhmuc(),$maa);
                                        ?>
                                    </select>
                                </div>

                                <div class='col-3'>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"  name='a'>
                                        <label class="custom-control-label" for="customCheck2">Danh sách</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Đường dẫn</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name='DuongDan' value="<?php echo @$this->data->DuongDan?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Ngày tạo</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" placeholder="mm/dd/yyyy" name='NgayTao' value="<?php echo @$this->data->NgayTao?>" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="ion-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- input-group -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">KeyWord</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name='Keyword' value="<?php echo @$this->data->Keyword?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Descrtion</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name='Descr' value="<?php echo @$this->data->Descr?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alias</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name='Alias' id='Alias' value="<?php echo @$this->data->Alias?>">
                                </div>
                            </div>
                      
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <a href="?parameter=c_danhmuc&func=ds_danhmuc" class="btn btn-primary btn-custom waves-effect w-md m-b-5">Danh sách</a>
                                    <button type="submit" class="btn btn-primary btn-custom waves-effect w-md m-b-5" name="sua" value="sua">Sửa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var alias = $('#Alias').val();
        var a ='tin-tuc-';
        var b = alias.substr(0,8);
        
        if(a==b){
            $("#customCheck2").prop('checked', true);
        }


           $('input[type="checkbox"]#customCheck2').click(function(){
            if($(this).prop("checked") == true){
                var alias = $('#Alias').val();
                var asli = 'tin-tuc-' + alias;
                $('#Alias').val(asli);
            }else if($(this).prop("checked") == false){
                var alias = $('#Alias').val();
                var asli = alias.substr(8);
                $('#Alias').val(asli);
            }
        });
        
    });
</script>