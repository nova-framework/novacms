<section class="content-header">
    <h1>Manage Menu Links</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= site_url('admin/menus'); ?>'><i class="fa fa-book"></i> Menus</a></li>
        <li>Manage Menu: <?php echo $menu->title; ?></li>
    </ol>
</section>

<section class='content'>


<div class="box box-primary">
    <div class="box-body">

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Menu:</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav menubar"></ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

		<?=Session::getMessages();?>

        <div class='row'>

            <div class='col-md-4'>

                <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-link"></i> Add Link</div>
                    <div class="panel-body">

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                  Add Page
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">

                                <form id='addpages' method='post'>

                                <div class="multiselect">
                                <input type="checkbox" id="selectpages"/> Select All<br>
                                <?php
                                    foreach($pages as $page){
                                        echo "<label><input type='checkbox' name='page[]' value='".Config::get('app.path').$page->slug."' data-title='$page->pageTitle' data-id='$page->id' class='checkbox1' /> $page->pageTitle</label><br>";
                                    }
                                ?>
                                </div>

                                <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Add to Menu</button>

                                </form>

                              </div>
                            </div>
                            </div>

                            <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                   Add Custom Link
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body">

                                <form id='addrow' method='post'>

                                    <div class="control-group">
                                        <label class="control-label" for='title'>Title</label>
                                        <input class="form-control" required id='title' type="text" name="title" value="" />
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for='slug'>Url</label>
                                        <input class="form-control" required id='slug' type="text" name="slug" value="" />
                                    </div>

                                    <p><br>
                                    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Add to Menu</button>
                                    </p>

                                </form>

                              </div>
                            </div>
                            </div>

                        </div>



                    </div>
                </div>

            </div>

            <div class='col-md-8'>

                <div id="nestable-menu">
                    <button type="button" class="btn btn-default" data-action="expand-all"><i class="fa fa-plus"></i> Expand</button>
                    <button type="button" class="btn btn-default" data-action="collapse-all"><i class="fa fa-minus"></i> Collapse</button>
                    <button type="button" class="btn btn-danger" data-action="delete"><i class="fa fa-times"></i> Clear</button>
                </div>

                <div class="dd" id="nestable">
                    <ol class="dd-list outer"></ol>
                </div>

            </div>

        </div>

    </div>
</div>

</section>
