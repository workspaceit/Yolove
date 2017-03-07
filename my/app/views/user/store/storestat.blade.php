<div class="modal-dialog full">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Store Statistics</h4>
            </div>
            <div class="modal-body clearfix">

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Item Like </div>
                            <input type="text" class="" placeholder="" value="{{$item}}" id="item">
                        </div>
                    </div>
                </div>

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Collection Like </div>
                            <input type="text" class="" placeholder="" value="{{$collection}}" id="collection">
                        </div>
                    </div>
                </div>

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Total Order </div>
                            <input type="text" class="" placeholder="" value="{{$order}}" id="order">
                        </div>
                    </div>
                </div>


                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Gross Profit </div>
                            <input type="text" class="" placeholder="" value="RM{{$profit}}" id="profit">
                        </div>
                    </div>
                </div>

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> This Week Profit </div>
                            <input type="text" class="" placeholder="" value="RM{{$profit1}}" id="comparison">
                        </div>
                    </div>
                </div>

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Last Week Profit </div>
                            <input type="text" class="" placeholder="" value="RM{{$profit2}}" id="comparison">
                        </div>
                    </div>
                </div>

                <div class="item-description title-add" style="min-height: 60px !important;height: 70px !important;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> Comparison </div>
                            <input type="text" class="" placeholder="" value="RM{{$comparison}}" id="comparison">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>