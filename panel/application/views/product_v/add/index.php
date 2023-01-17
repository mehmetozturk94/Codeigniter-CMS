<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view('includes/head'); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <?php $this->load->view("includes/navbar") ?>
    <!--========== END app navbar -->

    <!-- APP Sidebar ==========-->
    <?php $this->load->view('includes/sidebar'); ?>
    <!--========== END app sidebar -->

    <!-- navbar search -->
    <?php $this->load->view('includes/search'); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$addFolder}/{$addSubFolder}/content"); ?>
            </section>
            <!-- #dash-content -->
        </div><!-- .wrap -->
        <!-- APP FOOTER -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php $this->load->view('includes/include_script'); ?>
</body>

</html>