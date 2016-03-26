
            <div class="row" style = "margin-left: -60px; margin-right: -60px; margin-top: -90px;">

                <div class="col s7">

                    <div class="box-body">
                        asdasd
                     </div>


                </div>
               <div class="col s5">
                    <div class = "row clearfix">
                      <div class="card white">
                        <div id='calendar'></div>
                        </div>
                     </div>
    
                </div>






                    <div class="modal fade">
                       
                            <div class="modal-content">
                                <div class="modal-header">
                                    <?php if($_SESSION['userLevel'] == 1) { ?>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <?php } ?>
                                    <h4 class="modal-title"></h4>
                                  
                                </div>
                              
                                    <div class="error"></div>
                                    <form class="form-horizontal" id="crud-form">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="title">Title</label>
                                            <div class="col-md-4">
                                                <input id="title" name="title" type="text" class="form-control input-md" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="time">Time</label>
                                            <div class="col-md-4 input-append bootstrap-timepicker">
                                                <input id="time" name="time" type="text" class="form-control input-md" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="description">Description</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                        <?php if($_SESSION['userLevel'] == 1) { ?>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="color">Color</label>
                                            <div class="col-md-4">
                                                <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                                <span class="help-block">Click to pick a color</span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                             
                                <div class="modal-footer">
                                     <?php if($_SESSION['userLevel'] == 1) { ?>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                     <?php }else{ ?>
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                     <?php } ?>

                                </div>
                            </div>
                
                    </div>
            </div>
            <!-- /.row -->
        