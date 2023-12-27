<div class="page-heading">
  <h1>ТК тест</h1>
  <div class="options"> </div>
</div>
<div class="container-fluid" data-lasttask="">
  
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">

			<form id="zaprs" >

              <div class="row mb20">

                  <div class="col-lg-4">
                      <label class="control-label" style="font-size:11px;">
                          <strong>* Заказчик перевозки: </strong>
                      </label>
                      <select  class="form-control" name="requester">
                        <? include("counteragents.tpl") ?>
                      </select>
                  </div>

              </div>

            <div class="row mb20">

                <div class="col-lg-4">

                    <label class="control-label" style="font-size:11px;">
                        <strong>* Терминал получения: </strong>
                    </label>
                    <select name="terminal" style="width:100% !important; overflow: hidden;height: 31px;" class="js-select2">
                        <? include("terminals.tpl") ?>
                    </select>

                </div>

            </div>

            <div class="row mb20">

                <div class="col-lg-3">
                    <label class="control-label" style="font-size:11px;">
                        <strong>* Наименование получателя: </strong>
                    </label>
                    <input class="form-control" name="receiver_name" type="text" placeholder="Наименование">
                </div>

                <div class="col-lg-3">
                    <label class="control-label" style="font-size:11px;">
                        <strong>* ИНН получателя: </strong>
                    </label>
                    <input class="form-control js-inn" name="receiver_inn" type="text" placeholder="ИНН">
                </div>

                <div class="col-lg-3">
                    <label class="control-label" style="font-size:11px;">
                        <strong>* Организационно-правовая форма: </strong>
                    </label>
                    <select name="receiver_opf" style="width:100% !important; overflow: hidden;height: 31px;" class="js-select2">
                        <? include("opf.tpl") ?>
                    </select>
                </div>

            </div>

                <div class="row mb50">
                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>* Контактное лицо: </strong>
                        </label>
                        <input class="form-control" name="contact_person" type="text" placeholder="Контактное лицо">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>* Номер телефона: </strong>
                        </label>
                        <input class="form-control" name="contact_phone" type="text" placeholder="Номер телефона">
                    </div>
                </div>


                <div class="row mb20">

                    <div class="col-lg-4">

                        <label class="control-label" style="font-size:11px;">
                            <strong>Длина грузового места, м:</strong>
                        </label>
                        <input class="form-control" name="length" type="text" placeholder="Введите длину">
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>Ширина грузового места, м:</strong>
                        </label>
                        <input class="form-control" name="width" type="text" placeholder="Введите ширину">
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>Высота грузового места, м:</strong>
                        </label>
                        <input class="form-control" name="height" type="text" placeholder="Введите высоту">
                    </div>

                </div>

                <div class="row mb50">

                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>Количество грузовых мест, шт.:</strong>
                        </label>
                        <input class="form-control" name="quantity" type="text" placeholder="Количество грузовых мест">
                    </div>

                    <div class="col-lg-4">

                        <label class="control-label" style="font-size:11px;">
                            <strong>Общий объём груза, м3:</strong>
                        </label>
                        <input class="form-control" name="total-volume" type="text" placeholder="Общий объём груза">
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" style="font-size:11px;">
                            <strong>Общий вес груза, кг:</strong>
                        </label>
                        <input class="form-control" name="total-weight" type="text" placeholder="Общий вес груза">
                    </div>

                </div>

                <div class="row mb50">
                    <div class="col-lg-6">
                        <label class="control-label" style="font-size:11px;">
                            <strong>Описание груза:</strong>
                        </label>
                        <input class="form-control" name="freight" type="text" placeholder="Описание груза">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-success">Отправить заявку</button>
                    </div>
                </div>

            </form>

            <div id="o_content"></div>

        </div>
        <!-- /.panel-body --> 
      </div>
      <!-- /.panel -->
  
    </div>
    <!-- /.col-lg-12 --> 
  </div>
</div>
