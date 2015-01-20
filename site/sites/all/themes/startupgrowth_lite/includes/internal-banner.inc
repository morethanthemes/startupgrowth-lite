<?php 
if (arg(0) == "node" && is_numeric(arg(1))) {
    
    $nid = arg(1);
    $node = node_load($nid);
    $lang= "und";
    $banner_class = "";

    if (empty($node->field_teaser_image) || (!isset($node->field_internal_banner) || $node->field_internal_banner[$lang][0]["value"] == "0")) { 
    $banner_class = "no-internal-banner-image ";
    } else {
    $banner_class = "with-internal-banner-image ";
    }
?>
    <?php if ( ($breadcrumb && theme_get_setting("breadcrumb_display")) || (!empty($node->field_teaser_image) && (isset($node->field_internal_banner) && $node->field_internal_banner[$lang][0]["value"] == "1"))):?>
    <!-- #page-intro -->
    <div id="page-intro" class="clearfix">

        <?php if (!empty($node->field_teaser_image) && (isset($node->field_internal_banner) && $node->field_internal_banner[$lang][0]["value"] == "1")):
        $image = image_style_url("slideshow", $node->field_teaser_image[$lang][0]["uri"]); ?>

        <div class="internal-banner-image">
        <img src="<?php print $image; ?>" alt="<?php print $node->field_teaser_image[$lang][0]["alt"]; ?>" 
        title="<?php print $node->field_teaser_image[$lang][0]["title"]; ?>"/>
        </div>

        <?php endif; ?>
        <?php if ($breadcrumb && theme_get_setting("breadcrumb_display")):?> 
        <div id="page-intro-inside" class="clearfix internal-banner <?php print $banner_class; ?>"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Breadcrumb -->
                        <div id="breadcrumb" class="clearfix">
                            <div id="breadcrumb-inside" class="clearfix">
                                <?php print $breadcrumb; ?>
                            </div>
                        </div>
                        <!-- EOF:Breadcrumb -->

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <!-- EOF: #page-intro -->            
    <?php endif; ?>

<?php } else { ?>

    <?php if ($breadcrumb && theme_get_setting("breadcrumb_display")):?> 
        <!-- #page-intro -->
        <div id="page-intro" class="clearfix">
            <div id="page-intro-inside" class="clearfix internal-banner no-internal-banner-image">            
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Breadcrumb -->
                            <div id="breadcrumb" class="clearfix">
                                <div id="breadcrumb-inside" class="clearfix">
                                <?php print $breadcrumb; ?>
                                </div>
                            </div>
                            <!-- EOF:Breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EOF: #page-intro -->    
    <?php endif; ?>
    
<?php } ?>